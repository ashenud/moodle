<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/Database.php';

class FileInfo
{
    /** @var string */
    private $id;

    /** @var int */
    private $ownerId;

    /** @var string */
    private $fileName;

    /** @var string */
    private $fileType;

    /** @var string */
    private $mimeType;

    /** @var string */
    private $is_star;

    /** @var int */
    private $fileSize;

    /** @var DateTime */
    private $uploadedDate;

    public function __construct(string $id, int $ownerId, string $fileName, string $fileType, string $mimeType, int $fileSize, DateTime $uploadedDate, $is_star='')
    {
        $this->id = $id;
        $this->ownerId = $ownerId;
        $this->fileName = $fileName;
        $this->fileType = $fileType;
        $this->mimeType = $mimeType;
        $this->fileSize = $fileSize;
        $this->is_star = $is_star;
        $this->uploadedDate = $uploadedDate;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @return string
     */
    public function getFileType(): string
    {
        return $this->fileType;
    }

    /**
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }
    /**
     * @return string
     */
    public function is_star(): string
    {
        return $this->is_star;
    }

    /**
     * @return int
     */
    public function getFileSize(): int
    {
        return $this->fileSize;
    }

    /**
     * @return DateTime
     */
    public function getUploadedDate(): DateTime
    {
        return $this->uploadedDate;
    }
}

class FileRepository extends DB
{
    private const USER_FILE_TABLE = 'user_files';

    public function createFileEntry(FileInfo $fileInfo): void
    {
        $q = sprintf(
            "INSERT INTO %s(id, owner_id, file_name, file_type, mime_type, file_size, uploaded_date) " .
                "VALUES (?, ?, ?, ?, ?, ?, ?)",
            self::USER_FILE_TABLE
        );

        $stmt = $this->connection->prepare($q);
        $id = $fileInfo->getId();
        $ownerId = $fileInfo->getOwnerId();
        $fileName = $fileInfo->getFileName();
        $fileType = $fileInfo->getFileType();
        $mimeType = $fileInfo->getMimeType();
        $is_star = $fileInfo->is_star();
        $fileSize = $fileInfo->getFileSize();
        $uploadedDate = $fileInfo->getUploadedDate()->format('Y-m-d H:i:s');

        $stmt->bind_param("sisssis", $id, $ownerId, $fileName, $fileType, $mimeType, $fileSize, $uploadedDate);
        $stmt->execute();

        $stmt->close();
    }

    /**
     * @param int $ownerId
     * @return FileInfo[]
     */
    public function fetchOwnerFiles(int $ownerId): array
    {
        $q = sprintf("SELECT * FROM %s WHERE owner_id = ?", self::USER_FILE_TABLE);
        $stmt = $this->connection->prepare($q);
        $stmt->bind_param("i", $ownerId);
        $stmt->execute();

        $res = $stmt->get_result();
        $files = [];
        while ($row = $res->fetch_assoc()) {
            $files[] = new FileInfo(
                $row['id'],
                $row['owner_id'],
                $row['file_name'],
                $row['file_type'],
                $row['mime_type'],
                $row['file_size'],
                DateTime::createFromFormat('Y-m-d H:i:s', $row['uploaded_date']),
                $row['starred']
            );
        }

        return $files;
    }

    public function fetchFile(string $fileId): ?FileInfo
    {
        $q = sprintf("SELECT * FROM %s WHERE id = ?", self::USER_FILE_TABLE);
        $stmt = $this->connection->prepare($q);
        $stmt->bind_param("s", $fileId);
        $stmt->execute();

        $res = $stmt->get_result();
        if ($row = $res->fetch_assoc()) {
            return new FileInfo(
                $row['id'],
                $row['owner_id'],
                $row['file_name'],
                $row['file_type'],
                $row['mime_type'],
                $row['file_size'],
                DateTime::createFromFormat('Y-m-d H:i:s', $row['uploaded_date']),
                $row['starred']
            );
        }

        return null;
    }
}

$repository = new FileRepository();

function getFileSystem(): \League\Flysystem\Filesystem
{
    $adapter = new \League\Flysystem\Local\LocalFilesystemAdapter(__DIR__ . '/../../../data/');
    return new \League\Flysystem\Filesystem($adapter);
}

/**
 * @param int $ownerId
 * @return FileInfo[]
 */
function getFileList(int $ownerId): array
{
    $fileRepository = new FileRepository();
    return $fileRepository->fetchOwnerFiles($ownerId);
}

function getFileInfo(string $fileId): ?FileInfo
{
    $fileRepository = new FileRepository();
    return $fileRepository->fetchFile($fileId);
}

function getFileStream(string $fileId)
{
    $filePath = resolveFilePath($fileId);
    $fileSystem = getFileSystem();
    return $fileSystem->readStream($filePath);
}

function postFile(int $ownerId, $resource, string $fileName, string $fileType, string $mimeType, int $fileSize): FileInfo
{
    $fileSystem = getFileSystem();
    $fileRepository = new FileRepository();

    $id = \Ramsey\Uuid\Uuid::uuid4()->toString();
    $fileInfo = new FileInfo($id, $ownerId, $fileName, $fileType, $mimeType, $fileSize, new DateTime());

    // Write file to directory
    $filePath = resolveFilePath($id);
    $fileSystem->writeStream($filePath, $resource);

    // Create a record in the repository
    $fileRepository->createFileEntry($fileInfo);
    return $fileInfo;
}

function resolveFilePath(string $fileId): string
{
    // Resolve file path (2 hex/2 hex/ID)
    return substr($fileId, 0, 2) . '/' .
        substr($fileId, 2, 2) . '/' .
        $fileId;
}

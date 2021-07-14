function createFileManager(containerId) {
    containerId = containerId.replace('#', '');
    const DIR_LECTURE_NOTES = 'lecture_notes';
          DIR_DOCUMENTATION = 'documentation';

    const directoryMap = {
        [DIR_LECTURE_NOTES]: "Lecturer Notes",
        [DIR_DOCUMENTATION]: 'Documentation',
    };

    const FILE_REG = 'file',
          FILE_DOC = 'word',
          FILE_PPT = 'ppt',
          FILE_XLS = 'xls',
          FILE_PDF = 'pdf',
          FILE_VIDEO = 'video',
          FILE_IMG = 'img',
          FILE_AUD = 'aud',
          FILE_ZIP = 'zip';

    const FILE_TYPE_MAP = {
        'audio/aac': FILE_AUD,
        'video/x-msvideo': FILE_VIDEO,
        'image/bmp': FILE_IMG,
        'application/x-bzip': FILE_ZIP,
        'application/x-bzip2': FILE_ZIP,
        'application/msword': FILE_DOC,
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document': FILE_DOC,
        'application/gzip': FILE_ZIP,
        'image/gif': FILE_IMG,
        'image/jpeg': FILE_IMG,
        'audio/mpeg': FILE_AUD,
        'video/mp4': FILE_VIDEO,
        'video/mpeg': FILE_VIDEO,
        'application/vnd.oasis.opendocument.presentation': FILE_PPT,
        'application/vnd.oasis.opendocument.spreadsheet': FILE_XLS,
        'application/vnd.oasis.opendocument.text': FILE_DOC,
        'image/png': FILE_IMG,
        'application/pdf': FILE_PDF,
        'application/vnd.ms-powerpoint': FILE_PPT,
        'application/vnd.openxmlformats-officedocument.presentationml.presentation': FILE_PPT,
        'application/vnd.rar': FILE_ZIP,
        'image/svg+xml': FILE_IMG,
        'audio/wav': FILE_AUD,
        'audio/webm': FILE_AUD,
        'video/webm': FILE_VIDEO,
        'application/vnd.ms-excel': FILE_XLS,
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet': FILE_XLS,
        'application/zip': FILE_ZIP,
        'application/x-7z-compressed': FILE_ZIP
    };

    const container = $(`#${containerId}`);
    const menuBar = $(`<div class="menu-bar">`);
    const header = $(`<div class="header fm-row">`);
    const fileList = $(`<div class="file-list">`);

    // Elements
    let currentSelectedEl = null;
    let uploadButton = null;
    let downloadButton = null;

    // State
    let currentDirectory = null;

    var files = [];
    init();

    function init() {
        container.addClass('file-manager');
        container.append(menuBar);
        container.append(header);
        container.append(fileList);

        initMenuBar();
        initHeader();
        showTopLevelView();
    }

    function initMenuBar() {
        menuBar.append(`
            <div class="current-path">
                <div class="top-level-path">My Folders</div>
            </div>
        `);
        menuBar.append(`
            <div class="controls">
              <input type="text" class="form-control profile-input border-green" style="width: 170px;" placeholder="Search in files" id="search_input" >
              
                <button class="btn-download"><i class="fas fa-download"></i></button>
                <div class="upload-container">
              
                    <button id="${containerId}-btn-upload" class="btn background-green ripple-surface btn-upload"><i class="fa fa-upload"></i>Upload</button>
                    <input type="file" id="${containerId}-file-input" class="file-input"/>
                </div>            
            </div>
        `);

        menuBar.find('.top-level-path').on('click', function() {
            showTopLevelView();
        });
        const fileInput = menuBar.find(`#${containerId}-file-input`);
        fileInput.on('change', function() {
            const file = fileInput[0].files[0];
            $.ajax({
                type: 'POST',
                url: `/resources/files.php?fn=${file.name}&ft=${currentDirectory}`,
                data: file,
                contentType: file.type,
                processData: false,
                success: function(data) {
                    $('body').find('.modal').modal('hide');
                    files.push(data.file);
                    showDirectoryView(currentDirectory);
                    menuBar.find(`#${containerId}-file-input`).val('');
                },
                error: function (data) {
                    console.log(data);
                    if(data.responseJSON.error=='file_exist'){

                        $('body').find('.modal').modal('hide');

                        $('#modal-file-rename').find('#file_id').val(data.responseJSON.file_id);
                        $('#modal-file-rename').find('#new_name').val(data.responseJSON.file_name);
                        $('#modal-file-rename').find('#file_type').val(data.responseJSON.file_type);
                        $('#modal-file-overwrite').modal('show');
                        menuBar.find(`#${containerId}-file-input`).val('');
                    }
                }
            });
        });

        const filerename = $('body').find('#modal-file-rename').find('#rename_submit');
        filerename.on('click', function () {
            $id = $('#modal-file-rename').find('#file_id').val();
            $name = $('#modal-file-rename').find('#new_name').val();
            $type = $('#modal-file-rename').find('#file_type').val();

            $.ajax({
                url: `/resources/files.php?action=rename&nn=${$name}&id=${$id}&ft=${$type}`,
                success: function(data) {
                    $('body').find('.modal').modal('hide');

                    files = data.files
                    showDirectoryView(currentDirectory);
                },
                error: function (data) {
                    $('body').find('.modal').modal('hide');
                    if(data.responseJSON.error=='file_exist'){
                        $('#modal-file-rename').find('#file_id').val(data.responseJSON.file_id);
                        $('#modal-file-rename').find('#new_name').val(data.responseJSON.file_name);
                        $('#modal-file-rename').find('#file_type').val(data.responseJSON.file_type);
                        $('#modal-file-overwrite').modal('show');

                    }
                }
            });
        })

        const filereplace = $('body').find('#replace_submit');
        filereplace.on('click', function () {
            $id = $('#modal-file-rename').find('#file_id').val();
            $name = $('#modal-file-rename').find('#new_name').val();
            $type = $('#modal-file-rename').find('#file_type').val();

            $.ajax({
                url: `/resources/files.php?action=replace&nn=${$name}&id=${$id}&ft=${$type}`,
                success: function(data) {
                    $('body').find('.modal').modal('hide');

                    files = data.files
                    showDirectoryView(currentDirectory);
                },
                error: function (data) {
                    $('body').find('.modal').modal('hide');
                }
            });
        })

        const filedelete = $('body').find('#delete_submit');
        filedelete.on('click', function () {
            $id = $('#file_delete_modal').find('#file_id').val();

            $.ajax({
                url: `/resources/files.php?action=delete&id=${$id}`,
                success: function(data) {
                    $('body').find('.modal').modal('hide');

                    files = files.filter((item)=>(item.id!=$id) )
                    showDirectoryView(currentDirectory);
                },
                error: function (data) {
                    $('body').find('.modal').modal('hide');
                }
            });
        })

        const fileremove = $('body').find('#file_move_submit');
        fileremove.on('click', function () {
            $id = $('#modal-file-move').find('#file_id').val();
            $name = $('#modal-file-move').find('#new_name').val();
            $type = $('#modal-file-move').find('#new_directory').val();

            $.ajax({
                url: `/resources/files.php?action=move&nn=${$name}&id=${$id}&ft=${$type}`,
                success: function(data) {
                    $('body').find('.modal').modal('hide');

                    files = data.files
                    showDirectoryView(currentDirectory);
                },
                error: function (data) {
                    $('body').find('.modal').modal('hide');
                    if(data.responseJSON.error=='file_exist'){
                        $('#modal-file-rename').find('#file_id').val(data.responseJSON.file_id);
                        $('#modal-file-rename').find('#new_name').val(data.responseJSON.file_name);
                        $('#modal-file-rename').find('#file_type').val(data.responseJSON.file_type);
                        $('#modal-file-overwrite').modal('show');

                    }
                }
            });
        })

        const filecopy = $('body').find('#file_copy_submit');
        filecopy.on('click', function () {
            $id = $('#modal-file-copy').find('#file_id').val();
            $name = $('#modal-file-copy').find('#new_name').val();
            $type = $('#modal-file-copy').find('#new_directory_copy').val();

            $.ajax({
                url: `/resources/files.php?action=copy&nn=${$name}&id=${$id}&ft=${$type}`,
                success: function(data) {
                    $('body').find('.modal').modal('hide');

                    files = data.files
                    showDirectoryView(currentDirectory);
                },
                error: function (data) {
                    $('body').find('.modal').modal('hide');
                    if(data.responseJSON.error=='file_exist'){
                        $('#modal-file-rename').find('#file_id').val(data.responseJSON.file_id);
                        $('#modal-file-rename').find('#new_name').val(data.responseJSON.file_name);
                        $('#modal-file-rename').find('#file_type').val(data.responseJSON.file_type);
                        $('#modal-file-overwrite').modal('show');

                    }
                }
            });
        })
        const filestar = $('body').find('#add_to_star');
        filestar.on('click', function () {
            $id = $(rightClick_file).find('.list-item-name').attr('data-file_id');

            if($id.length>0) {
                $.ajax({
                    url: `/resources/files.php?action=star_file&id=${$id}`,
                    success: function (data) {
console.log(data);
                        $.each(files, function (i, v) {
                            if($(v).attr('id')==$id){
                                if(files[i]['starred']=='1'){
                                    files[i]['starred']='0';
                                }else{
                                    files[i]['starred']='1';
                                }
                            }
                        })

                        showDirectoryView(currentDirectory);
                    },
                    error: function (data) {
             $('body').find('.modal').modal('hide');
                    if(data.responseJSON.error=='file_exist'){
                        $('#modal-file-rename').find('#file_id').val(data.responseJSON.file_id);
                        $('#modal-file-rename').find('#new_name').val(data.responseJSON.file_name);
                        $('#modal-file-rename').find('#file_type').val(data.responseJSON.file_type);
                        $('#modal-file-overwrite').modal('show');

                    }
                    }
                });
            }
        })

        $('body').on('keyup change', '#search_input', function () {
           $filename=$(this).val().toLowerCase();
           if($filename=='') {
               showTopLevelView();
           }else{
               fileList.empty();
               searchfiles = files.filter((item) => (item.file_name.toLowerCase().includes($filename)))
               console.log(searchfiles);
               searchfiles.forEach(f => {
                   fileList.append(createFileListItem(f));
               });
           }
        })

        var rightClick_file=0;

        $('body').on('contextmenu', '.action_item', function() {

            rightClick_file=$(this);
            if($(this).hasClass('list-item-img')){
                $('body').find('#fileaction_menu').find('#file_preview_btn').show();
            }else{
                $('body').find('#fileaction_menu').find('#file_preview_btn').hide();
            }
            if($(this).find('.fa-star').length){
                $('body').find('#fileaction_menu').find('#add_to_star').html('Remove Star');
            }else{
                $('body').find('#fileaction_menu').find('#add_to_star').html('Add to starred');
            }

            //alert("contextmenu"+event);
            $(this).css('background-color', '#f6f6f6');
            document.getElementById("fileaction_menu").className = "show";
            document.getElementById("fileaction_menu").style.top = mouseY(event) + 'px';
            document.getElementById("fileaction_menu").style.left = mouseX(event) + 'px';

            window.event.returnValue = false;


        });
        $('body').on('click', '.show_options', function() {

            $this=$(this).parents('.action_item');
            rightClick_file=$($this);
            if($($this).hasClass('list-item-img')){
                $('body').find('#fileaction_menu').find('#file_preview_btn').show();
            }else{
                $('body').find('#fileaction_menu').find('#file_preview_btn').hide();
            }
            if($($this).find('.fa-star').length){
                $('body').find('#fileaction_menu').find('#add_to_star').html('Remove Star');
            }else{
                $('body').find('#fileaction_menu').find('#add_to_star').html('Add to starred');
            }

            //alert("contextmenu"+event);
            $($this).css('background-color', '#f6f6f6');
            document.getElementById("fileaction_menu").className = "show";
            document.getElementById("fileaction_menu").style.top = mouseY(event) + 'px';
            document.getElementById("fileaction_menu").style.left = mouseX(event) + 'px';

            window.event.returnValue = false;


        });



        $('body').on('click', function(e) {
            if($(e.target).hasClass("show_options") || $(e.target).parents('.show_options').length){

            }else {
                rightClick_file = 0;
                $('body').find('.action_item').css('background-color', '#fff');
                //alert("contextmenu"+event);
                document.getElementById("fileaction_menu").className = "";
            }

        });

        $('body').on('click', '#file_preview_btn', function() {
            if(rightClick_file!=0){
                $url=$(rightClick_file).find('a').attr('href');
                $('body').find('#image_preview_modal').find('#prev_image').attr('src', $url);
                $('body').find('#image_preview_modal').modal('show');
                rightClick_file=0;
            }
        });
        $('body').on('click', '#delete_file', function() {
            if(rightClick_file!=0){
                $('body').find('#file_delete_modal').find('#file_id').val($(rightClick_file).find('.list-item-name').attr('data-file_id'));
                $('body').find('#file_delete_modal').modal('show');
                rightClick_file=0;
            }
        });

        $('body').on('click', '#file_rename_btn', function() {
            if(rightClick_file!=0){
                $('body').find('#modal-file-rename').find('#file_id').val($(rightClick_file).find('.list-item-name').attr('data-file_id'));
                $('body').find('#modal-file-rename').find('#file_type').val(currentDirectory);
                $('body').find('#modal-file-rename').find('#new_name').val($(rightClick_file).find('.list-item-name').text().trim());
                $('body').find('#modal-file-rename').modal('show');
                rightClick_file=0;
            }
        });

        $('body').on('click', '#move_to_folder', function() {
            if(rightClick_file!=0){

                var diroptions='';
                var selectedDirectory=currentDirectory;
                if(currentDirectory=='starred'){
                    selectedDirectory='misc';
                }
                $.each(directoryMap, function (i, v) {
                    if(i=='starred'){

                    }else{
                        diroptions+='<option value="'+i+'">'+v+'</option>';
                    }
                })

                $('#new_directory').html(diroptions);

                $('body').find('#modal-file-move').find('#file_id').val($(rightClick_file).find('.list-item-name').attr('data-file_id'));
                $('body').find('#modal-file-move').find('#file_type').val(currentDirectory);
                $('body').find('#modal-file-move').find('#new_name').val($(rightClick_file).find('.list-item-name').text().trim());
                $('body').find('#modal-file-move').find('#new_directory').val(selectedDirectory);
                $('body').find('#modal-file-move').modal('show');
                rightClick_file=0;
            }
        });
        $('body').on('click', '#make_copy', function() {
            if(rightClick_file!=0){

                var diroptions='';
                var selectedDirectory=currentDirectory;
                if(currentDirectory=='starred'){
                    selectedDirectory='misc';
                }
                $.each(directoryMap, function (i, v) {
                    if(i=='starred'){

                    }else{
                        diroptions+='<option value="'+i+'">'+v+'</option>';
                    }
                })

                $('#new_directory_copy').html(diroptions);
                $('body').find('#modal-file-copy').find('#file_id').val($(rightClick_file).find('.list-item-name').attr('data-file_id'));
                $('body').find('#modal-file-copy').find('#file_type').val(currentDirectory);
                $('body').find('#modal-file-copy').find('#new_name').val('copy_'+$(rightClick_file).find('.list-item-name').text().trim());
                $('body').find('#modal-file-copy').find('#new_directory_copy').val(selectedDirectory);
                $('body').find('#modal-file-copy').modal('show');
                rightClick_file=0;
            }
        });


        downloadButton = menuBar.find('.btn-download');
        downloadButton.on('click', function() {
            if (currentSelectedEl) {
                currentSelectedEl.trigger('dblclick');
            }
        })

        uploadButton = menuBar.find(`#${containerId}-btn-upload`);
        uploadButton.on('click', function() {
            fileInput.trigger('click');
        });
    }


    function mouseX(evt) {
        if (evt.pageX) {
            return evt.pageX;
        } else if (evt.clientX) {
            return evt.clientX + (document.documentElement.scrollLeft ?
                document.documentElement.scrollLeft :
                document.body.scrollLeft);
        } else {
            return null;
        }
    }

    function mouseY(evt) {
        if (evt.pageY) {
            return evt.pageY;
        } else if (evt.clientY) {
            return evt.clientY + (document.documentElement.scrollTop ?
                document.documentElement.scrollTop :
                document.body.scrollTop);
        } else {
            return null;
        }
    }

    function initHeader() {
        // Initialize header
        header.append(`<div class="header-name">Name</div>`);
        header.append(`<div class="header-owner">Owner</div>`);
        header.append(`<div class="header-upload-date">Upload Date</div>`);
        header.append(`<div class="header-file-size">File size</div>`);
        header.append(`<div class="header-file-size">Action</div>`);
    }



    function showTopLevelView() {
        // Remove current directory in header
        menuBar.find(".current-dir").remove();
        currentDirectory = null;
        currentSelectedEl = null;

        // Populate directories
        fileList.empty();

        Object.keys(directoryMap).forEach(d => {
            fileList.append(createDirectoryListItem(d));
        });
        uploadButton.prop("disabled", true);
        downloadButton.addClass("hidden");
    }

    function showDirectoryView(dirType) {
        // Remove current directory in header
        menuBar.find(".current-dir").remove();
        fileList.empty();
        menuBar.find(".current-path").append(`<div class="current-dir">${directoryMap[dirType]}</div>`);
        currentDirectory = dirType;
        console.log(currentDirectory);
        currentSelectedEl = null;


        $.each(files, function (i, v) {
            if(typeof v.file_type === "undefined"){
                files.splice(i, 1);
            }
        })
        // Populate files
        // const dirFiles = files.filter(f => (typeof f['file_type']!=="undefined")??(f['file_type'] === dirType));
        var dirFiles = files.filter((item)=>(item.file_type==dirType) )
        $(uploadButton).show();
        if(dirType=='starred'){
            $(uploadButton).hide();
             dirFiles = files.filter((item)=>(item.starred=="1") )
        }

        console.log(dirFiles);
        dirFiles.forEach(f => {
            fileList.append(createFileListItem(f));
        });

        uploadButton.prop("disabled", false);
        downloadButton.addClass("hidden");
    }

    function createFileListItem(file) {
        let className = `list-item-${FILE_REG}`;
        if (FILE_TYPE_MAP.hasOwnProperty(file['mime_type'])) {
            className = `list-item-${FILE_TYPE_MAP[file['mime_type']]}`;
        }

        $star='';
        $star2='';
        if(file['starred']=='1'){
            $star='<i style="width: auto; position: absolute; left: 20px;" class="fa fa-star"></i>';
            $star2='star_class';
        }

        const el = $(`
            <div class="list-item ${className} fm-row action_item ${$star2}">
                <div class="list-item-name" data-file_id="${file['id']}">${$star} ${file['file_name']}</div>
                <div class="list-item-owner">me</div>
                <div class="list-item-upload-date">${file['uploaded_date_hmn']}</div>
                <div class="list-item-file-size">${formatBytes(file['file_size'])}</div>
                <div class="list-item-file-action"><button onclick="javascript:" class="show_options" style=" display: block; color: #8c8c8c; border: none; display: inline-block; padding: 6px 10px; border-radius: 6px; background-color: #88b77b; line-height: 12px; color: white; "><i class="fa fa-bars"></i></button></div>
                <a class="file_url" href="/resources/download.php?id=${file.id}" download></a>
            </div>
        `);

        el.on('click', function () {
            if (currentSelectedEl) {
                currentSelectedEl.removeClass('selected');
            }

            el.addClass('selected');
            downloadButton.removeClass("hidden");
            currentSelectedEl = el;
        });

        const link = el.find('a');
        el.on('dblclick', function() {
            link[0].click();
        });

        return el;
    }

    function createDirectoryListItem(dirType) {
        const el = $(`
            <div class="list-item list-item-directory fm-row">
                <div class="list-item-name">${directoryMap[dirType]}</div>
                <div class="list-item-owner">me</div>
                <div class="list-item-upload-date">&ndash;</div>
                <div class="list-item-file-size">&ndash;</div>
                <div class="list-item-file-action">&ndash;</div>
            </div>
        `);

        el.on('click', function () {
            if (currentSelectedEl) {
                currentSelectedEl.removeClass('selected');
            }

            el.addClass('selected');
            currentSelectedEl = el;
        });

        el.on('dblclick', function() {
            showDirectoryView(dirType);
        });

        return el;
    }


    function loadFiles(fileArray) {
        fileArray.forEach(f => {
            files.push(f);
        });
    }

    return {
        loadFiles
    };
}

function formatBytes(bytes, decimals) {
    if (bytes == 0) return '0 Bytes';
    const k = 1024,
          dm = decimals || 2,
          sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
          i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}

$(document).ready(function () {
    $.ajax(`/resources/files.php`, {
        success: function(data) {
            const fileManager = createFileManager('#file-manager');
            fileManager.loadFiles(data.files);
        }
    });
});
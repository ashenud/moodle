<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php 
    //favicons
    include('../../inc/dashboard/include-fav.php');
    //css
    include('../../inc/dashboard/include-css.php');
    ?>

    <link rel="stylesheet" href="/pages/lecturer/css/documents.css">

    <style>
        #fileaction_menu a{
            display: block;
            color: black;
            padding-left: 15px;
            padding-top: 3px;
            padding-bottom: 3px;
            border-bottom: 1px solid silver;
        }
        #fileaction_menu a:hover {
            background-color: #00c298;
            border-radius: 3px;
            color: white;
            border: none;
        }
        #fileaction_menu {
            display: none
        }
        #fileaction_menu.show {
            z-index: 1000;
            position: absolute;
            background-color: #C0C0C0;
            border: 1px solid blue;
            padding: 2px;
            display: block;
            margin: 0;
            list-style-type: none;
            list-style: none;
        }
    </style>

    <title>LERNING MANAGEMENT SYSTEM</title>

</head>
<body>

    <div id="fileaction_menu" style="width: 200px; background-color: white; border: 1px solid silver; border-radius: 5px;">
        <a href="#" id="file_preview_btn">Preview</a>
        <a href="#" id="file_rename_btn">Rename</a>
        <a href="#" id="move_to_folder">Move to folder</a>
        <a href="#" id="add_to_star">Add to starred</a>
        <a href="#" id="make_copy">Make a copy</a>
        <a href="#" id="delete_file">Delete File</a>
    </div>

    <div class="modal fade" id="image_preview_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                <img id="prev_image" src="" style="width: 100%; max-height: 500px; object-fit: cover">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$(this).parents('.modal').modal('hide');">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="file_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Are you sure you want to permanently delete the file. This action cannot be undone.</p>
                    <input type="hidden" id="file_id">
                </div>
                <div class="modal-footer">
                    <button type="button" id="delete_submit" class="btn btn-warning">Yes, delete it</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$(this).parents('.modal').modal('hide');">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="modal-file-overwrite">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">File already exist</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    The selected file already exists. Please rename the file or replace with existing.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="$(this).parents('.modal').modal('hide'); $('#modal-file-rename').modal('show')">Rename</button>
                    <button type="button" id="replace_submit" class="btn btn-warning">Replace</button>
                    <button type="button" onclick="$(this).parents('.modal').modal('hide');" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="modal-file-rename">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Rename your file</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new_name" class="col-sm-12 control-label">Enter New Name</label>
                        <div class="col-sm-12">
                            <input type="hidden" id="file_id">
                            <input type="hidden" id="file_type">
                            <input type="text" class="form-control" id="new_name" placeholder="File Name">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="rename_submit" class="btn btn-primary">Rename</button>
                    <button type="button" onclick="$(this).parents('.modal').modal('hide');" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="modal-file-move">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Move your file</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new_name" class="col-sm-12 control-label">Select the directory where you want to move it</label>
                        <div class="col-sm-12">
                            <input type="hidden" id="file_id">
                            <input type="hidden" id="file_type">
                            <select class="form-control" id="new_directory">
                            </select>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 15px; margin-bottom: 30px;">
                        <label for="new_name" class="col-sm-12 control-label">File Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="new_name" placeholder="File Name">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="file_move_submit" class="btn btn-primary">Move</button>
                    <button type="button" onclick="$(this).parents('.modal').modal('hide');" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="modal-file-copy">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Copy your file</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new_name" class="col-sm-12 control-label">Select the directory where you want to move it</label>
                        <div class="col-sm-12">
                            <input type="hidden" id="file_id">
                            <input type="hidden" id="file_type">
                            <select class="form-control" id="new_directory_copy">
                            </select>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 15px; margin-bottom: 30px;">
                        <label for="new_name" class="col-sm-12 control-label">File Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="new_name" placeholder="File Name">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="file_copy_submit" class="btn btn-primary">Copy</button>
                    <button type="button" onclick="$(this).parents('.modal').modal('hide');" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="wrapper">
        
        <!--top navbar-->
        <?php include '../../layouts/navbars/lecturer.php';?>
        <!--end of top navbar-->

        <!-- main body (sidebar and content) -->
        <div class="main-body open-sidebar" id="main-body">

            <!-- content -->
            <div class="row mb-5">
                <div class="col">
                    <div id="file-manager"></div>
                </div>
            </div>   
            <!-- end of content -->

        </div>
        <!-- end of main body (sidebar and content) -->

        <!--top footer-->
        <?php include '../../layouts/footer.php';?>
        <!--end of footer-->

    </div>

    <!--sidebar-->
    <?php include '../../layouts/sidebars/lecturer.php';?>
    <!--end of sidebar-->

    <?php 
    //js
    include('../../inc/dashboard/include-js.php');
    ?>

    <script src="/pages/lecturer/js/documents.js" defer></script>

    <script>
        $(function() {
            $('.side-link.li-files').addClass('active');
        });

        function search_files($this) {
            var value = $($this).val().toLowerCase();
            $($this).parents("#file-manager").find('.file-list .list-item').filter(function () {
                $(this).toggle($(this).children('.list-item-name').text().trim().toLocaleLowerCase().indexOf(value) > -1)
            });
        }
    </script>

</body>
</html>

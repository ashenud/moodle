<?php
    session_start();
?>
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
    <link rel="stylesheet" href="/pages/student/css/note-book-style.css">

    <title>LERNING MANAGEMENT SYSTEM</title>

    <style>
        .form-group {
            height: 85px;
        }
        .form-group .question_label {
            font-size: 12px;
        }
        .btn-submit {
            min-width: 100px;
            background: #8cc168;
            border-radius: 0.2275rem;
            min-height: 38px;
            float: right;
            font-size: 12px;
            font-weight: bold;
        }
    </style>

</head>
<body>
    <div class="wrapper">
        
        <!--top navbar-->
        <?php include '../../layouts/navbars/student.php';?>
        <!--end of top navbar-->

        <!-- main body (sidebar and content) -->
        <div class="main-body open-sidebar" id="main-body">

            <!-- content -->
            <div class="container">
                <div class="row">
                    <!-- reminder table section -->
                    <div class="col-12-6 mb-2">
                        <div class="card card-custom">
                            <div class="card-header mt-2 mb-3">
                                <h5 class="font-weight-bold">Summarization</h5>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="question_1" class="question_label">Choose a file</label>
                                                <input type="file" id="file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" style="text-align: right;">
                                                <button id="btn-submit" class="btn btn-sm btn-submit" onclick="submit_data()">SUBMIT</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
    <?php include '../../layouts/sidebars/student.php';?>
    <!--end of sidebar-->

    <?php 
    //js
    include('../../inc/dashboard/include-js.php');
    ?>

    <!-- pusher alerts -->
    <?php include '../../inc/include-pusher.php';?>
    <!--end of pusher-->

    <script>

        $( document ).ready(function() {
            $('.side-link.li-sum').addClass('active');
        });

        function submit_data() {
            swal({
                title: 'Are you sure?',
                html: "Do you want to upload this file",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) {
                    swal("Good Job !", 'Successfully uploaded', 'success');
                }
            });
        }

    </script>      

</body>
</html>

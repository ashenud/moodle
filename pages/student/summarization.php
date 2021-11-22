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
                    
                    <div class="col-12 mb-2">
                        <div class="card card-custom">
                            <div class="card-header mt-2 mb-3">
                                <h5 class="font-weight-bold">Summarization</h5>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" id="summarization">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">                                                
                                                <div class="form-group">
                                                    <label for="ratio" class="question_label">Current Grade Point</label>
                                                    <input type="number" id="ratio" name="ratio" class="form-control" value="<?php echo $_SESSION['grade_point'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="file" class="question_label">Choose a file</label>
                                                    <input type="file" id="file" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group" style="text-align: right; padding-top: 25px;">
                                                    <button type="button" id="btn-submit" class="btn btn-sm btn-submit" onclick="submit_data()">SUBMIT</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 mb-2" style="display: none" id="summarized_div">
                        <div class="card card-custom">
                            <div class="card-header mt-2">
                                <h5 class="font-weight-normal">Summarized Data</h5>
                            </div>
                            <div class="card-body" style="padding-top: 0;">
                                <div class="summarized-data" id="summarized_data">
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
                    var file_data = $('#file').prop('files')[0];   
                    var form_data = new FormData();                  
                    form_data.append('file', file_data);
                    form_data.append('ratio', $('#ratio').val());
                    $.ajax({
                        type: 'POST',
                        url: 'http://192.168.20.34:5001/summerize',
                        data: form_data,
                        dataType: 'json',
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function(response) {
                            $('#summarized_data').append(response.result[0]);
                            $('#summarized_div').show();
                            download_summerized_file('summerized_data', response.result[0], 'text/plain')
                        },
                        error: function(error){
                            window.location.reload();
                        }
                    });
                }
            });
        }

        function download_summerized_file(filename, text, type) {
            // Create an invisible A element
            const a = document.createElement("a");
            a.style.display = "none";
            document.body.appendChild(a);

            // Set the HREF to a Blob representation of the data to be downloaded
            a.href = window.URL.createObjectURL(
                new Blob([text], { type })
            );
            // Use download attribute to set set desired file name
            a.setAttribute("download", filename);
            // Trigger the download by simulating click
            a.click();
            // Cleanup
            window.URL.revokeObjectURL(a.href);
            document.body.removeChild(a);
        }

    </script>      

</body>
</html>

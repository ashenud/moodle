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
                                <h5 class="font-weight-bold">Study Plan Prediction</h5>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" id="question-series">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="grade_point" class="question_label">Current Grade Point</label>
                                                    <input type="number" id="grade_point" name="grade_point" class="form-control" value="<?php echo $_SESSION['grade_point'];?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_1" class="question_label">Gender</label>
                                                    <select class="form-control question" id="question_1" name="question_1">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_2" class="question_label">Age</label>
                                                    <select class="form-control question" id="question_2" name="question_2">
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_3" class="question_label">What time do you wake up in the morning?</label>
                                                    <select class="form-control question" id="question_3" name="question_3">
                                                        <option value="01:00">01:00</option>
                                                        <option value="02:00">02:00</option>
                                                        <option value="03:00">03:00</option>
                                                        <option value="04:00">04:00</option>
                                                        <option value="05:00">05:00</option>
                                                        <option value="06:00">06:00</option>
                                                        <option value="07:00">07:00</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="12:00">12:00</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_4" class="question_label">What time do you have breakfast?</label>
                                                    <select class="form-control question" id="question_4" name="question_4">
                                                        <option value="01:00">01:00</option>
                                                        <option value="02:00">02:00</option>
                                                        <option value="03:00">03:00</option>
                                                        <option value="04:00">04:00</option>
                                                        <option value="05:00">05:00</option>
                                                        <option value="06:00">06:00</option>
                                                        <option value="07:00">07:00</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="12:00">12:00</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_5" class="question_label">Are you doing a job?</label>
                                                    <select class="form-control question" id="question_5" name="question_5">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_6" class="question_label">If you have a job, how much time do you spend on it?</label>
                                                    <select class="form-control question" id="question_6" name="question_6">
                                                        <option value="2 hours">2 hours</option>
                                                        <option value="3 hours">3 hours</option>
                                                        <option value="4 hours">4 hours</option>
                                                        <option value="5 hours">5 hours</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_7" class="question_label">How much time do you spend on education? </label>
                                                    <select class="form-control question" id="question_7" name="question_7">
                                                        <option value="2 hours">2 hours</option>
                                                        <option value="3 hours">3 hours</option>
                                                        <option value="4 hours">4 hours</option>
                                                        <option value="5 hours">5 hours</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_8" class="question_label">What time do you have lunch?</label>
                                                    <select class="form-control question" id="question_8" name="question_8">
                                                        <option value="01:00">01:00</option>
                                                        <option value="02:00">02:00</option>
                                                        <option value="03:00">03:00</option>
                                                        <option value="04:00">04:00</option>
                                                        <option value="05:00">05:00</option>
                                                        <option value="06:00">06:00</option>
                                                        <option value="07:00">07:00</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="12:00">12:00</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_9" class="question_label">What is your hobby?</label>
                                                    <select class="form-control question" id="question_9" name="question_9">
                                                        <option value="Watching Movie">Watching Movie</option>
                                                        <option value="Playing">Playing</option>
                                                        <option value="Reading">Reading</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_10" class="question_label">How much time does it take?</label>
                                                    <select class="form-control question" id="question_10" name="question_10">
                                                        <option value="2 hours">2 hours</option>
                                                        <option value="3 hours">3 hours</option>
                                                        <option value="4 hours">4 hours</option>
                                                        <option value="5 hours">5 hours</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_11" class="question_label">What time do you have dinner?</label>
                                                    <select class="form-control question" id="question_11" name="question_11">
                                                        <option value="01:00">01:00</option>
                                                        <option value="02:00">02:00</option>
                                                        <option value="03:00">03:00</option>
                                                        <option value="04:00">04:00</option>
                                                        <option value="05:00">05:00</option>
                                                        <option value="06:00">06:00</option>
                                                        <option value="07:00">07:00</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="12:00">12:00</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_12" class="question_label">What Is Your University?</label>
                                                    <select class="form-control question" id="question_12" name="question_12">
                                                        <option value="NSBM Green University">NSBM Green University</option>
                                                        <option value="CINEC Campus Sri Lanka">CINEC Campus Sri Lanka</option>
                                                        <option value="Horizon University">Horizon University</option>
                                                        <option value="Sri Lanka Institute of Information Technology (SLIIT)">Sri Lanka Institute of Information Technology (SLIIT)</option>
                                                        <option value="CINEC Campus Sri Lanka">CINEC Campus Sri Lanka</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_13" class="question_label">What is your Faculty?</label>
                                                    <select class="form-control question" id="question_13" name="question_13">
                                                        <option value="School of Computing">School of Computing</option>
                                                        <option value="School of Law">School of Law</option>
                                                        <option value="School of Engineering">School of Engineering</option>
                                                        <option value="School of Media Studies">School of Media Studies</option>
                                                        <option value="School of Hospitality">School of Hospitality</option>
                                                        <option value="School of Business">School of Business</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_14" class="question_label">What is your academic year?</label>
                                                    <select class="form-control question" id="question_14" name="question_14">
                                                        <option value="Year 01">Year 01</option>
                                                        <option value="Year 02">Year 02</option>
                                                        <option value="Year 03">Year 03</option>
                                                        <option value="Year 04">Year 04</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_15" class="question_label">What has been your GPA in the last years?</label>
                                                    <select class="form-control question" id="question_15" name="question_15">
                                                        <option value="1.7">1.7</option>
                                                        <option value="2.0">2.0</option>
                                                        <option value="2.3">2.3</option>
                                                        <option value="2.7">2.7</option>
                                                        <option value="3.0">3.0</option>
                                                        <option value="3.3">3.3</option>
                                                        <option value="3.7">3.7</option>
                                                        <option value="4.0">4.0</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_16" class="question_label">How many repeats did you have Last year? </label>
                                                    <select class="form-control question" id="question_16" name="question_16">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_17" class="question_label">What time do you go to bed at night?</label>
                                                    <select class="form-control question" id="question_17" name="question_17">
                                                        <option value="01:00">01:00</option>
                                                        <option value="02:00">02:00</option>
                                                        <option value="03:00">03:00</option>
                                                        <option value="04:00">04:00</option>
                                                        <option value="05:00">05:00</option>
                                                        <option value="06:00">06:00</option>
                                                        <option value="07:00">07:00</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="12:00">12:00</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_18" class="question_label">How long does it take for a university outdoor activity ?</label>
                                                    <select class="form-control question" id="question_18" name="question_18">
                                                        <option value="2 hours">2 hours</option>
                                                        <option value="3 hours">3 hours</option>
                                                        <option value="4 hours">4 hours</option>
                                                        <option value="5 hours">5 hours</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="question_19" class="question_label">How much time do you take for Lab Sessions and practical's?</label>
                                                    <select class="form-control question" id="question_19" name="question_19">
                                                        <option value="2 hours">2 hours</option>
                                                        <option value="3 hours">3 hours</option>
                                                        <option value="4 hours">4 hours</option>
                                                        <option value="5 hours">5 hours</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group" style="text-align: right;">
                                                    <button type="button" id="btn-submit" class="btn btn-sm btn-submit" onclick="submit_data()">SUBMIT</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
            $('.side-link.li-stypl').addClass('active');
        });

        function submit_data() {
            swal({
                title: 'Are you sure?',
                html: "Do you want to submit this records",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) {


                    submitForm();
                    
                    swal("Good Job !", 'Successfully uploaded', 'success');
                }
            });
        }

        function submitForm() {
            var formData = $("form").serializeArray();
            let json_data = {};
            $.each( formData, function( key, question ) {
                json_data[question.name] = question.value;
            });
            console.log(JSON.stringify(json_data));
        }

        function submitOld() {
            var formData = $("form").serializeArray();
            let csv = "data:text/csv;charset=utf-8,"; // accept data as CSV

            formData.forEach(function(item) {
              csv += item.value + ";"; // concat form value on csv var and add ; to create columns (you can change to , if want)
            });

            var encodedUri = encodeURI(csv);

            console.log(encodedUri);

            // if you want to download
            var downloadLink = document.createElement("a");
            downloadLink.setAttribute("download", "FILENAME.csv");
            downloadLink.setAttribute("href", encodedUri);
            document.body.appendChild(downloadLink); // Required for FF
            downloadLink.click();
            downloadLink.remove();
        }

        function findRandom() {
            var random = Math.floor(Math.random() * 5) //Finds number between 0 - max
            return random;
        }

    </script>      

</body>
</html>

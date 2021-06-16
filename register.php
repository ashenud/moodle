<?php 
    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
    session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>

    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">

    <!--fonts and icons-->
    <link rel="stylesheet" href="/assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!--css files-->
    <link rel="stylesheet" href="/assets/css/mdb.min.css">
    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <link rel="stylesheet" href="/assets/datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="/assets/css/index-style.css">
    <link rel="stylesheet" href="/assets/css/common-style.css">

    <title>LERNING MANAGEMENT SYSTEM</title>
    
</head>

<body>

    <div class="form-section rgba-stylish-strong h-100 d-flex justify-content-center align-items-center" style="height: 100% !important;">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 mx-auto mb-5">

                    <!--Form with header-->
                    <div class="card wow fadeIn" data-wow-delay="0.3s">
                        <div class="card-body">
                            <!-- Tabs navs -->
                            <ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="student-tab" data-mdb-toggle="tab" href="#ex2-student-tab" role="tab" aria-controls="ex2-student-tab" aria-selected="true">STUDENT</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="lecturer-tab" data-mdb-toggle="tab" href="#ex2-lecturer-tab" role="tab" aria-controls="ex2-lecturer-tab" aria-selected="false">LECTURER</a>
                                </li>
                            </ul>
                            <!-- Tabs navs -->

                            <!-- Tabs content -->
                            <div class="tab-content" id="ex2-content">
                                <div class="tab-pane fade show active" id="ex2-student-tab" role="tabpanel" aria-labelledby="student-tab">
                                    <form action="/php/user-register.php" id="std_form" name="std_form" method="POST">
                                        <div class="container">
                                            <div class="row">
                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_fname">First name</label>
                                                    <input type="text" id="std_fname" name="std_fname" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a valid first name.</div>
                                                </div>
                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_lname">Last name</label>
                                                    <input type="text" id="std_lname" name="std_lname" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a valid last name.</div>
                                                </div>

                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_dob">Date of birth</label>
                                                    <input type="text" id="std_dob" name="std_dob" autocomplete="off" class="form-control datepicker-common-class" />
                                                    <div class="invalid-feedback">Please provide a valid date of birth.</div>
                                                </div>
                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_gender">Gender</label>
                                                    <div class="mt-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="std_gender" id="std_gender_1" value="1" />
                                                            <label class="form-check-label" for="std_gender_1">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline"> 
                                                            <input class="form-check-input" type="radio" name="std_gender" id="std_gender_2" value="2" />
                                                            <label class="form-check-label" for="std_gender_2">Female</label>
                                                        </div>
                                                    </div>
                                                    <div class="invalid-feedback" id="std_gender_invalid_fbk">Please provide a valid gender.</div>
                                                </div>

                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_mobile">Mobile</label>
                                                    <input type="text" id="std_mobile" name="std_mobile" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a valid mobile number.</div>
                                                </div>
                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_email">Email</label>
                                                    <input type="email" id="std_email" name="std_email" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a valid email.</div>
                                                </div>

                                                <div class="form-group col-12 form-white mb-4">
                                                    <label class="form-label" for="std_address">Address</label>
                                                    <input type="text" id="std_address" name="std_address" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a valid address.</div>
                                                </div>

                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_username">User name</label>
                                                    <input type="text" id="std_username" name="std_username" autocomplete="off" class="form-control" onkeyup="check_username_validity(event)" />
                                                    <div class="invalid-feedback" id="std_uname_invalid_fbk">Please provide a valid username.</div>
                                                    <input type="hidden" id="std_uname_chk" value="0"/>
                                                </div>
                                                <div class="form-group col-md-6 form-white mb-4"></div>

                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_password">Password</label>
                                                    <input type="password" id="std_password" name="std_password" autocomplete="off" class="form-control" onkeyup="check_password_validity(event)" />
                                                    <span class="focus-input" data-placeholder="&#xf191;"></span>
                                                    <span toggle="#std_password" class="far fa-fw fa-eye password-icon"></span>
                                                </div>
                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_confirm_password">Confirm Password</label>
                                                    <input type="password" id="std_confirm_password" name="std_confirm_password" autocomplete="off" class="form-control" onkeyup="check_password_validity(event)" />
                                                    <span class="focus-input" data-placeholder="&#xf191;"></span>
                                                    <span toggle="#std_confirm_password" class="far fa-fw fa-eye password-icon"></span>
                                                    <div class="invalid-feedback">passwords dose not match.</div>
                                                    <input type="hidden" id="std_password_chk" value="0"/>
                                                </div>
                                                
                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_al_stream">AL stream</label>
                                                    <div class="mt-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="std_al_stream" id="std_al_stream_1" value="1" />
                                                            <label class="form-check-label" for="std_al_stream_1">Sinhala</label>
                                                        </div>
                                                        <div class="form-check form-check-inline"> 
                                                            <input class="form-check-input" type="radio" name="std_al_stream" id="std_al_stream_2" value="2" />
                                                            <label class="form-check-label" for="std_al_stream_2">English</label>
                                                        </div>
                                                    </div>
                                                    <div class="invalid-feedback" id="std_al_stream_invalid_fbk">Please provide a valid al stream.</div>
                                                </div>
                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_uni_stream">University stream</label>
                                                    <div class="mt-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="std_uni_stream" id="std_uni_stream_1" value="1" />
                                                            <label class="form-check-label" for="std_uni_stream_1">Sinhala</label>
                                                        </div>
                                                        <div class="form-check form-check-inline"> 
                                                            <input class="form-check-input" type="radio" name="std_uni_stream" id="std_uni_stream_2" value="2" />
                                                            <label class="form-check-label" for="std_uni_stream_2">English</label>
                                                        </div>
                                                    </div>
                                                    <div class="invalid-feedback" id="std_uni_stream_invalid_fbk">Please provide a valid university stream.</div>
                                                </div>

                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_ol_eng_result">OL english result</label>
                                                    <select name="std_ol_eng_result" id="std_ol_eng_result" class="form-control select2-common-class">
                                                        <option value="0">SELECT RESULT</option>
                                                        <option value="1">A Pass</option>
                                                        <option value="2">B Pass</option>
                                                        <option value="3">C Pass</option>
                                                        <option value="4">S Pass</option>
                                                        <option value="5">F Pass</option>
                                                    </select>
                                                    <div class="invalid-feedback" id="std_ol_result_fbk">Please provide a valid result.</div>
                                                </div>
                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_al_eng_result">AL english result</label>                                                  
                                                    <select name="std_al_eng_result" id="std_al_eng_result" class="form-control select2-common-class">
                                                        <option value="0">SELECT RESULT</option>
                                                        <option value="1">A Pass</option>
                                                        <option value="2">B Pass</option>
                                                        <option value="3">C Pass</option>
                                                        <option value="4">S Pass</option>
                                                        <option value="5">F Pass</option>
                                                    </select>
                                                    <div class="invalid-feedback" id="std_al_result_fbk">Please provide a valid result.</div>
                                                </div>

                                                <div class="form-group form-white mb-4">
                                                    <input type="hidden" id="std_register_type" name="register_type" value="std" />
                                                    <button id="std_submit_data" class="btn btn-lg btn-success btn-block" onclick="submit_form_data(event,this.id,'std_form')">SAVE</button>
                                                </div>

                                                <div class="click-here-area">
                                                    <a href="/index.php" class="click-here">If you are already registerd click here to sign in</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="ex2-lecturer-tab" role="tabpanel" aria-labelledby="lecturer-tab">
                                    <form action="/php/user-register.php" id="ltr_form" name="ltr_form" method="POST">
                                        <div class="container">
                                            <div class="row">
                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="ltr_fname">First name</label>
                                                    <input type="text" id="ltr_fname" name="ltr_fname" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a valid first name.</div>
                                                </div>
                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="ltr_lname">Last name</label>
                                                    <input type="text" id="ltr_lname" name="ltr_lname" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a valid last name.</div>
                                                </div>

                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="ltr_dob">Date of birth</label>
                                                    <input type="text" id="ltr_dob" name="ltr_dob" autocomplete="off" class="form-control datepicker-common-class" />
                                                    <div class="invalid-feedback">Please provide a valid date of birth.</div>
                                                </div>
                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="ltr_gender">Gender</label>
                                                    <div class="mt-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="ltr_gender" id="ltr_gender_1" value="1" />
                                                            <label class="form-check-label" for="ltr_gender_1">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline"> 
                                                            <input class="form-check-input" type="radio" name="ltr_gender" id="ltr_gender_2" value="2" />
                                                            <label class="form-check-label" for="ltr_gender_2">Female</label>
                                                        </div>
                                                    </div>
                                                    <div class="invalid-feedback" id="ltr_gender_invalid_fbk">Please provide a valid gender.</div>
                                                </div>

                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="ltr_mobile">Mobile</label>
                                                    <input type="text" id="ltr_mobile" name="ltr_mobile" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a valid mobile number.</div>
                                                </div>
                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="ltr_email">Email</label>
                                                    <input type="email" id="ltr_email" name="ltr_email" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a valid email.</div>
                                                </div>

                                                <div class="form-group col-12 form-white mb-4">
                                                    <label class="form-label" for="ltr_address">Address</label>
                                                    <input type="text" id="ltr_address" name="ltr_address" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a valid address.</div>
                                                </div>

                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="ltr_username">User name</label>
                                                    <input type="text" id="ltr_username" name="ltr_username" autocomplete="off" class="form-control" onkeyup="check_username_validity(event)" />
                                                    <div class="invalid-feedback" id="ltr_uname_invalid_fbk">Please provide a valid username.</div>
                                                    <input type="hidden" id="ltr_uname_chk" value="0"/>
                                                </div>
                                                <div class="form-group col-md-6 form-white mb-4"></div>

                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="ltr_password">Password</label>
                                                    <input type="password" id="ltr_password" name="ltr_password" autocomplete="off" class="form-control" onkeyup="check_password_validity(event)" />
                                                    <span class="focus-input" data-placeholder="&#xf191;"></span>
                                                    <span toggle="#ltr_password" class="far fa-fw fa-eye password-icon"></span>
                                                </div>
                                                <div class="form-group col-md-6 form-white mb-4">
                                                    <label class="form-label" for="ltr_confirm_password">Confirm Password</label>
                                                    <input type="password" id="ltr_confirm_password" name="ltr_confirm_password" autocomplete="off" class="form-control" onkeyup="check_password_validity(event)" />
                                                    <span class="focus-input" data-placeholder="&#xf191;"></span>
                                                    <span toggle="#ltr_confirm_password" class="far fa-fw fa-eye password-icon"></span>
                                                    <div class="invalid-feedback">passwords dose not match.</div>
                                                    <input type="hidden" id="ltr_password_chk" value="0"/>
                                                </div>
                                                
                                                <div class="form-group col-12 form-white mb-4">
                                                    <label class="form-label" for="ltr_specialized">Specialized Field</label>
                                                    <input type="text" id="ltr_specialized" name="ltr_specialized" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a specialized field.</div>
                                                </div>
                                                
                                                <div class="form-group col-12 form-white mb-4">
                                                    <label class="form-label" for="ltr_university">University</label>
                                                    <input type="text" id="ltr_university" name="ltr_university" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a valid university.</div>
                                                </div>

                                                <div class="form-group form-white mb-4">
                                                    <input type="hidden" id="ltr_register_type" name="register_type" value="ltr" />
                                                    <button id="ltr_submit_data" class="btn btn-lg btn-success btn-block" onclick="submit_form_data(event,this.id,'ltr_form')">SAVE</button>
                                                </div>

                                                <div class="click-here-area">
                                                    <a href="/index.php" class="click-here">If you are already registerd click here to sign in</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Tabs content -->                          
                        </div>
                    </div>
                    <!--/Form with header-->

                </div>
            </div>
        </div>
    </div>

    <!-- optional JavaScript -->
    <script type="text/javascript" src="/assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="/assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="/assets/js/select2.min.js"></script>
    <script type="text/javascript" src="/assets/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="/assets/sweetalert/sweetalert2.all.js"></script>
   
    <!-- writed scripts -->     

    <!--top alerts-->
    <?php include './inc/include-alerts.php';?>
    <!--end of alerts-->

    <script>

        $('.select2-common-class').select2({
            minimumResultsForSearch: Infinity
        });
        $('.datepicker-common-class').datepicker({
            endDate: new Date(),
            format: 'yyyy-mm-dd',
        });
        $(".password-icon").click(function () {    
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

        function check_username_validity(event) {
            var id = event.target.id;
            var user = id.split("_");
            var user_type = user[0];
            var username = event.target.value;

            $.ajax({
                url: "php/user-username-ckeck.php",
                method: "POST",
                data: { username: username }
            })
            .done(function (data) {
                if(data == 1) {                    
                    $('#'+user_type+'_uname_invalid_fbk').html("user name you enterd is already exist");
                    $('#'+user_type+'_uname_invalid_fbk').show();
                    $('#'+user_type+'_uname_chk').val(0);
                    $('#'+user_type+'_username').addClass("is-invalid");
                }
                else {
                    $('#'+user_type+'_uname_invalid_fbk').html("Please provide a valid username.");
                    $('#'+user_type+'_uname_invalid_fbk').hide();
                    $('#'+user_type+'_uname_chk').val(1);
                    $('#'+user_type+'_username').removeClass("is-invalid");              
                }
            });
                    
        }

        function check_password_validity(event) {
            var id = event.target.id;
            var user = id.split("_");
            var user_type = user[0];
            var password = $('#'+user_type+'_password').val();
            var confirm_password = $('#'+user_type+'_confirm_password').val();

            if(confirm_password != "") {
                if(password != confirm_password) {
                    $('#'+user_type+'_password_chk').val(0);
                    $('#'+user_type+'_confirm_password').addClass("is-invalid");
                }
                else {
                    $('#'+user_type+'_password_chk').val(1);
                    $('#'+user_type+'_password').removeClass("is-invalid");
                    $('#'+user_type+'_confirm_password').removeClass("is-invalid");
                }
            }
                    
        }

        function std_form_validate() {

            var email_pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var mobile_pattern1 = /^[0-9]{10}$/;
            var mobile_pattern2 = /^[+]+[0-9]{11}$/;
            var date_pattern = /^\d{4}-\d{2}-\d{2}$/;
            var gender =document.getElementsByName('std_gender');
            var al_stream =document.getElementsByName('std_al_stream');
            var uni_stream =document.getElementsByName('std_uni_stream');

            valid = true;
            if ($('#std_fname').val() == "") {
                valid = false;
                $('#std_fname').addClass("is-invalid");
                $('#std_fname').focus();
            } else { $('#std_fname').removeClass("is-invalid"); }

            if ($('#std_lname').val() == "") {
                valid = false;
                $('#std_lname').addClass("is-invalid");
                $('#std_lname').focus();
            }  else { $('#std_lname').removeClass("is-invalid"); } 

            if ( $('#std_dob').val() == "" || !date_pattern.test($('#std_dob').val()) ) {
                valid = false;
                $('#std_dob').addClass("is-invalid");
                $('#std_dob').focus();
            } else { $('#std_dob').removeClass("is-invalid"); }
            
            if ((!(gender[0].checked || gender[1].checked))) {
                valid = false;
                $('#std_gender_invalid_fbk').addClass("show-feedback");
                $('#std_gender_1').focus();
            } else { $('#std_gender_invalid_fbk').removeClass("show-feedback");; }
            
            if ( $('#std_mobile').val() == "" || ( !mobile_pattern1.test($('#std_mobile').val()) && !mobile_pattern2.test($('#std_mobile').val()) ) ) {
                valid = false;
                $('#std_mobile').addClass("is-invalid");
                $('#std_mobile').focus();
            } else { $('#std_mobile').removeClass("is-invalid"); }
            
            if ( $('#std_email').val() == "" || !email_pattern.test($('#std_email').val()) ) {
                valid = false;
                $('#std_email').addClass("is-invalid");
                $('#std_email').focus();
            } else { $('#std_email').removeClass("is-invalid"); }

            if ($('#std_address').val() == "") {
                valid = false;
                $('#std_address').addClass("is-invalid");
                $('#std_address').focus();
            }  else { $('#std_address').removeClass("is-invalid"); } 

            if ($('#std_username').val() == "" || $('#std_uname_chk').val() == 0) {
                valid = false;
                $('#std_username').addClass("is-invalid");
                $('#std_uname_invalid_fbk').show();
                $('#std_username').focus();
            }  else { $('#std_username').removeClass("is-invalid"); } 

            if ( $('#std_password').val() == "" || $('#std_confirm_password').val() == "" || $('#std_password_chk').val() == 0 ) {
                valid = false;
                $('#std_confirm_password').addClass("is-invalid");
                $('#std_password').addClass("is-invalid");
                $('#std_confirm_password').focus();
            }  else { $('#std_confirm_password').removeClass("is-invalid"); $('#std_password').removeClass("is-invalid"); } 
            
            if ((!(al_stream[0].checked || al_stream[1].checked))) {
                valid = false;
                $('#std_al_stream_invalid_fbk').addClass("show-feedback");
                $('#std_al_stream_1').focus();
            } else { $('#std_al_stream_invalid_fbk').removeClass("show-feedback"); }
            
            if ((!(uni_stream[0].checked || uni_stream[1].checked))) {
                valid = false;
                $('#std_uni_stream_invalid_fbk').addClass("show-feedback");
                $('#std_uni_stream_1').focus();
            } else { $('#std_uni_stream_invalid_fbk').removeClass("show-feedback"); }

            if ($('#std_ol_eng_result').val() == 0) {
                valid = false;
                $('#std_ol_eng_result').next().find('.select2-selection').addClass("is-invalid");
                $('#std_ol_result_fbk').addClass("show-feedback");
                $('#std_ol_eng_result').focus();
            }  else { $('#std_ol_eng_result').next().find('.select2-selection').removeClass("is-invalid"); $('#std_ol_result_fbk').removeClass("show-feedback"); }

            if ($('#std_al_eng_result').val() == 0) {
                valid = false;
                $('#std_al_eng_result').next().find('.select2-selection').addClass("is-invalid");
                $('#std_al_result_fbk').addClass("show-feedback");
                $('#std_al_eng_result').focus();
            }  else { $('#std_al_eng_result').next().find('.select2-selection').removeClass("is-invalid"); $('#std_al_result_fbk').removeClass("show-feedback"); }

            return valid;
        }

        function ltr_form_validate() {

            var email_pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var mobile_pattern1 = /^[0-9]{10}$/;
            var mobile_pattern2 = /^[+]+[0-9]{11}$/;
            var date_pattern = /^\d{4}-\d{2}-\d{2}$/;
            var gender =document.getElementsByName('ltr_gender');

            valid = true;
            if ($('#ltr_fname').val() == "") {
                valid = false;
                $('#ltr_fname').addClass("is-invalid");
                $('#ltr_fname').focus();
            } else { $('#ltr_fname').removeClass("is-invalid"); }

            if ($('#ltr_lname').val() == "") {
                valid = false;
                $('#ltr_lname').addClass("is-invalid");
                $('#ltr_lname').focus();
            }  else { $('#ltr_lname').removeClass("is-invalid"); } 

            if ( $('#ltr_dob').val() == "" || !date_pattern.test($('#ltr_dob').val()) ) {
                valid = false;
                $('#ltr_dob').addClass("is-invalid");
                $('#ltr_dob').focus();
            } else { $('#ltr_dob').removeClass("is-invalid"); }
            
            if ((!(gender[0].checked || gender[1].checked))) {
                valid = false;
                $('#ltr_gender_invalid_fbk').addClass("show-feedback");
                $('#ltr_gender_1').focus();
            } else { $('#ltr_gender_invalid_fbk').removeClass("show-feedback");; }
            
            if ( $('#ltr_mobile').val() == "" || ( !mobile_pattern1.test($('#ltr_mobile').val()) && !mobile_pattern2.test($('#ltr_mobile').val()) ) ) {
                valid = false;
                $('#ltr_mobile').addClass("is-invalid");
                $('#ltr_mobile').focus();
            } else { $('#ltr_mobile').removeClass("is-invalid"); }
            
            if ( $('#ltr_email').val() == "" || !email_pattern.test($('#ltr_email').val()) ) {
                valid = false;
                $('#ltr_email').addClass("is-invalid");
                $('#ltr_email').focus();
            } else { $('#ltr_email').removeClass("is-invalid"); }

            if ($('#ltr_address').val() == "") {
                valid = false;
                $('#ltr_address').addClass("is-invalid");
                $('#ltr_address').focus();
            }  else { $('#ltr_address').removeClass("is-invalid"); } 

            if ($('#ltr_username').val() == "" || $('#ltr_uname_chk').val() == 0) {
                valid = false;
                $('#ltr_username').addClass("is-invalid");
                $('#ltr_uname_invalid_fbk').show();
                $('#ltr_username').focus();
            }  else { $('#ltr_username').removeClass("is-invalid"); } 

            if ( $('#ltr_password').val() == "" || $('#ltr_confirm_password').val() == "" || $('#ltr_password_chk').val() == 0 ) {
                valid = false;
                $('#ltr_confirm_password').addClass("is-invalid");
                $('#ltr_password').addClass("is-invalid");
                $('#ltr_confirm_password').focus();
            }  else { $('#ltr_confirm_password').removeClass("is-invalid"); $('#ltr_password').removeClass("is-invalid"); }

            if ($('#ltr_specialized').val() == "") {
                valid = false;
                $('#ltr_specialized').addClass("is-invalid");
                $('#ltr_specialized').focus();
            }  else { $('#ltr_specialized').removeClass("is-invalid"); }

            if ($('#ltr_university').val() == "") {
                valid = false;
                $('#ltr_university').addClass("is-invalid");
                $('#ltr_university').focus();
            }  else { $('#ltr_university').removeClass("is-invalid"); }

            return valid;
        }

        function submit_form_data(event,btn_id,form_id) {
            event.preventDefault();
            var id = btn_id;
            var user = id.split("_");
            var user_type = user[0];

            if( user_type == "std" ) {
                if(std_form_validate()) {
                    $('#'+btn_id).addClass("submit-disabled");
                    document.forms[form_id].submit();
                }
            }
            else {
                if(ltr_form_validate()) {
                    $('#'+btn_id).addClass("submit-disabled");
                    document.forms[form_id].submit();
                }
            }
        }

    </script>
    <!-- end of writed scripts -->



</body>

</html>
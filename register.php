<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">

    <!--fonts and icons-->
    <!--fonts and icons-->
    <link rel="stylesheet" href="/assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="/assets/css/english-fonts.css">
    <link rel="stylesheet" href="/assets/css/material-icons.css">
    <link rel="stylesheet" href="/assets/css/now-ui-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!--css files-->
    <link rel="stylesheet" href="/assets/css/mdb.min.css">
    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <link rel="stylesheet" href="/assets/datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="/assets/css/index-style.css">
    <link rel="stylesheet" href="/assets/css/common-style.css">

    <!--js files-->
    <script type="text/javascript" src="/assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="/assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="/assets/js/select2.min.js"></script>
    <script type="text/javascript" src="/assets/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="/assets/sweetalert/sweetalert2.all.js"></script>

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
                                    <form action="/php/register.php" id="std_form" name="std_form" method="POST">
                                        <div class="container">
                                            <div class="row">
                                                <div class="form-outline col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_fname">First name</label>
                                                    <input type="text" id="std_fname" name="std_fname" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a valid first name.</div>
                                                </div>
                                                <div class="form-outline col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_lname">Last name</label>
                                                    <input type="text" id="std_lname" name="std_lname" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a valid last name.</div>
                                                </div>

                                                <div class="form-outline col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_dob">Date of birth</label>
                                                    <input type="text" id="std_dob" name="std_dob" autocomplete="off" class="form-control datepicker-common-class" />
                                                    <div class="invalid-feedback">Please provide a valid date of birth.</div>
                                                </div>
                                                <div class="form-outline col-md-6 form-white mb-4">
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
                                                    <div class="invalid-feedback">Please provide a valid gender.</div>
                                                </div>

                                                <div class="form-outline col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_mobile">Mobile</label>
                                                    <input type="text" id="std_mobile" name="std_mobile" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a valid mobile number.</div>
                                                </div>
                                                <div class="form-outline col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_email">Email</label>
                                                    <input type="email" id="std_email" name="std_email" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a valid email.</div>
                                                </div>

                                                <div class="form-outline col-12 form-white mb-4">
                                                    <label class="form-label" for="std_address">Address</label>
                                                    <input type="text" id="std_address" name="std_address" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a valid address.</div>
                                                </div>

                                                <div class="form-outline col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_username">User name</label>
                                                    <input type="text" id="std_username" name="std_username" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a valid username.</div>
                                                    <input type="hidden" id="std_uname_chk" value="1"/>
                                                </div>
                                                <div class="form-outline col-md-6 form-white mb-4"></div>

                                                <div class="form-outline col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_password">Password</label>
                                                    <input type="password" id="std_password" name="std_password" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">Please provide a valid passord.</div>
                                                </div>
                                                <div class="form-outline col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_confirm_password">Confirm Password</label>
                                                    <input type="password" id="std_confirm_password" name="std_confirm_password" autocomplete="off" class="form-control" />
                                                    <div class="invalid-feedback">passwords dose not match.</div>
                                                </div>
                                                
                                                <div class="form-outline col-md-6 form-white mb-4">
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
                                                    <div class="invalid-feedback">Please provide a valid al stream.</div>
                                                </div>
                                                <div class="form-outline col-md-6 form-white mb-4">
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
                                                    <div class="invalid-feedback">Please provide a valid university stream.</div>
                                                </div>

                                                <div class="form-outline col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_ol_eng_result">OL english result</label>
                                                    <select name="std_ol_eng_result" id="std_ol_eng_result" class="form-control select2-common-class">
                                                        <option value="0">SELECT RESULT</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="S">S</option>
                                                        <option value="F">F</option>
                                                    </select>
                                                    <div class="invalid-feedback">Please provide a valid result.</div>
                                                </div>
                                                <div class="form-outline col-md-6 form-white mb-4">
                                                    <label class="form-label" for="std_al_eng_result">AL english result</label>                                                  
                                                    <select name="std_al_eng_result" id="std_al_eng_result" class="form-control select2-common-class">
                                                        <option value="0">SELECT RESULT</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="S">S</option>
                                                        <option value="F">F</option>
                                                    </select>
                                                    <div class="invalid-feedback">Please provide a valid result.</div>
                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <input type="hidden" id="std_register_type" name="register_type" value="2" />
                                                    <input type="button" id="std_submit_data" class="btn btn-lg btn-success btn-block" value="SAVE" onclick="submit_student_data(event,this.id,'std_form')"/>
                                                </div>

                                                <div class="click-here-area">
                                                    <a href="/index.php" class="click-here">If you are already registerd click here to sign in</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="ex2-lecturer-tab" role="tabpanel" aria-labelledby="lecturer-tab">
                                
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

        function validate_student_form() {

                var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                var mobPattern = /^[0-9]{10}$/;

                valid = true;
                if ($('#std_fname').val() == "") {
                    valid = false;
                    $('#std_fname').addClass("is-invalid");
                    $('#std_fname').focus();
                } 
                // else if (std_lname.value == "") {
                //     valid = false;
                //     std_fname.removeClass("is-invalid");
                //     std_lname.addClass("is-invalid");
                //     std_lname.focus();
                // } else if (nic.value == "") {
                //     valid = false;
                //     alert("Enter NIC Number");
                //     nic.focus();
                // } else if (address_line_2.value == "") {
                //     valid = false;
                //     alert("Enter Valid Street Name");
                //     address_line_2.focus();
                // } else if (address_line_3.value == "") {
                //     valid = false;
                //     alert("Enter Valid Town Name");
                //     address_line_3.focus();
                // } else if (address_line_4.value == "") {
                //     valid = false;
                //     alert("Enter Valid City Name");
                //     address_line_4.focus();
                // } else if (mob.value == "") {
                //     valid = false;
                //     alert("Enter Mobile Number");
                //     mob.focus();
                // } else if (!mobPattern.test(mob.value)) {
                //     valid = false;
                //     alert("Mobile number length must be 10 numbers");
                //     mob.focus();
                // } else if (tel.value != "" && !mobPattern.test(tel.value)) {
                //     valid = false;
                //     alert("Telephone number length must be 10 numbers");
                //     tel.focus();
                // } else if (!emailPattern.test(email.value)) {
                //     valid = false;
                //     alert("Enter Valid Email Address");
                //     email.focus();
                // } else if (gender.selectedIndex == 0) {
                //     valid = false;
                //     alert("Select Gender");
                //     gender.focus();
                // } else if (prefix.value != "" && prefix.value.length > 10) {
                //     valid = false;
                //     alert("Prefix length must be shorter than 10 characters");
                //     prefix.focus();
                // } else if (u_type.selectedIndex == 0) {
                //     valid = false;
                //     alert("Select User Type");
                //     u_type.focus();
                // } else if ((u_type.value == "7") && (region_tr_id.selectedIndex == 0)) {
                //     valid = false;
                //     alert("Select Region");
                //     region_tr_id.focus();
                // } else if ((u_type.value == "3") && (region_tr_id.selectedIndex == 0)) {
                //     valid = false;
                //     alert("Select Region");
                //     region_tr_id.focus();
                // } else if ((u_type.value == "2") && (region_tr_id.selectedIndex == 0)) {
                //     valid = false;
                //     alert("Select Region");
                //     region_tr_id.focus();
                // } else if (u_type.value == "8" && dr_tr_id_zone.selectedIndex == 0) {
                //     valid = false;
                //     alert("Select Zone");
                //     dr_tr_id_zone.focus();
                // } else if (u_type.value == "2" && area_tr_id.selectedIndex == 0) {
                //     valid = false;
                //     alert("Select Territory");
                //     area_tr_id.focus();
                // } else if (u_type.value == "3" && area_tr_id.selectedIndex == 0) {
                //     valid = false;
                //     alert("Select Territory");
                //     area_tr_id.focus();
                // } else if (u_type.value == "3" && dr_tr_id.selectedIndex == 0) {
                //     valid = false;
                //     alert("Select Distributer");
                //     dr_tr_id.focus();
                // } else if (u_type.value == "3" && ot_tr_id.selectedIndex == 0) {
                //     valid = false;
                //     alert("Select Rep Type");
                //     ot_tr_id.focus();
                // } else if (u_type.value == "2" && gp_id.selectedIndex == 0) {
                //     valid = false;
                //     alert("Select User Group");
                //     gp_id.focus();
                // } else if (u_type.value == "7" && gp_id.selectedIndex == 0) {
                //     valid = false;
                //     alert("Select User Group");
                //     gp_id.focus();
                // } else if (u_type.value == "8" && gp_id.selectedIndex == 0) {
                //     valid = false;
                //     alert("Select User Group");
                //     gp_id.focus();
                // } else if (u_type.value == "15" && gp_id.selectedIndex == 0) {
                //     valid = false;
                //     alert("Select User Group");
                //     gp_id.focus();
                // } else if (u_type.value == "manager" && u_distributor_id.selectedIndex == 0) {
                //     valid = false;
                //     alert("Select District Distributor");
                //     u_distributor_id.focus();
                // } else if (document.getElementById('buff_stock') && buff_stock.value != "" && !buff_stock.value.match(/^(\d+)$/)) {
                //     valid = false;
                //     alert("Enter Valid Number");
                //     buff_stock.focus();
                // } else if (document.getElementById('buff_stock') && buff_stock.value != "" && parseFloat(buff_stock.value) > 100) {
                //     valid = false;
                //     alert("Buffer Stock can't be greater than 100");
                //     buff_stock.focus();
                // } else if (uname.value == "") {
                //     valid = false;
                //     alert("Enter Username");
                //     uname.focus();
                // } else if (psw.value == "") {
                //     valid = false;
                //     alert("Enter Password");
                //     psw.focus();
                // } else {
                //     for (var i = 1; i <= parseFloat($('#ar_count').val()); i++) {
                //         if (document.getElementById('dis_id_' + i) && $('#dis_id_' + i).val() == "") {
                //             valid = false;
                //             alert("Select Territory");
                //             $('#dis_id_' + i).focus();
                //         }
                //     }
                // }
                return valid;
        }

        function submit_student_data(event,btn_id,form_id) {
            event.preventDefault();
            console.log(form_id);

            if(validate_student_form()) {
                console.log('ela');
            }
        }


    </script>

</body>
</html>

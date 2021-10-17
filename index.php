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

<body class="index-body">
   
    <div class="form-section rgba-stylish-strong h-100 d-flex justify-content-center align-items-center" style="height: 100% !important;">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto">

                    <!--Form with header-->
                    <div class="card wow fadeIn" data-wow-delay="0.3s">
                        <div class="card-body">
                            <form action="/php/login.php" method="POST">
                                <div class="form-group form-white mb-4">
                                    <label class="form-label" for="username">User name</label>
                                    <input type="text" id="username" name="username" autocomplete="off" class="form-control form-control-lg" />
                                </div>

                                <div class="form-group form-white mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" name="password" autocomplete="off" class="form-control form-control-lg" />
                                </div>

                                <input type="submit" name="login" id="submit-user" class="btn btn-lg btn-success btn-block" value="Sign in" />
                                <div class="click-here-area">
                                    <a href="/register.php" class="click-here">click here to register</a>
                                </div>
                            </form>                            
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
    <!-- end of writed scripts -->



</body>

</html>
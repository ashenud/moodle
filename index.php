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
    <link rel="stylesheet" href="/assets/css/index-style.css">
    <link rel="stylesheet" href="/assets/css/common-style.css">

    <!--js files-->
    <script type="text/javascript" src="/assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="/assets/js/select2.min.js"></script>
    <script type="text/javascript" src="/assets/sweetalert/sweetalert2.all.js"></script>

    <title>LERNING MANAGEMENT SYSTEM</title>

</head>
<body>
   
    <div class="form-section rgba-stylish-strong h-100 d-flex justify-content-center align-items-center" style="height: 100% !important;">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto">

                    <!--Form with header-->
                    <div class="card wow fadeIn" data-wow-delay="0.3s">
                        <div class="card-body">
                            <form action="/php/login.php" method="POST">
                                <div class="form-outline form-white mb-4">
                                    <label class="form-label" for="username">User name</label>
                                    <input type="text" id="username" name="username" autocomplete="off" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" name="password" autocomplete="off" class="form-control form-control-lg" />
                                </div>

                                <input type="submit" name="login" id="submit-user" class="btn btn-lg btn-success btn-block" value="Sign in" />
                            </form>                            
                        </div>
                    </div>
                    <!--/Form with header-->

                </div>
            </div>
        </div>
    </div>

    <!--top footer-->
    <?php include './inc/include-alerts.php';?>
    <!--end of footer-->

</body>
</html>

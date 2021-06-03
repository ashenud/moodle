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
    //js
    include('../../inc/dashboard/include-js.php');
    ?>

    <title>LERNING MANAGEMENT SYSTEM</title>

</head>
<body>
    <div class="wrapper">
        
        <!--top navbar-->
        <?php include '../../layouts/navbars/lecturer.php';?>
        <!--end of top navbar-->

        <!-- main body (sidebar and content) -->
        <div class="main-body open-sidebar" id="main-body">

            <!-- content -->
            <?php
            session_start();
            echo '<pre>';
            print_r($_SESSION);
            echo '<pre>';            
            ?>
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

    <script>
        $(function() {
            $('.side-link.li-dash').addClass('active');
        }); 
    </script>

</body>
</html>

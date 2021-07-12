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
    <link rel="stylesheet" href="/pages/student/css/reminders-style.css">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <title>LERNING MANAGEMENT SYSTEM</title>

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
                        <div class="card view-reminders">
                            <div class="card-header mt-2 mb-3">
                                <h5 class="font-weight-bold">Reminders</h5>
                                <button data-mdb-toggle="modal" data-mdb-target="#reminderModal" class="btn btn-sm text-light">Add Reminder</button>
                            </div>
                            <div class="card-body"> 
                                <div id="table-container" class="table-container">
                                    <?php
                                        include_once('../../config/Reminder.php');
                                        $reminder = new Reminder();
                                        $reminder_list = $reminder->reminder_list($_SESSION['id']);
                                    ?>
                                    
                                        <div class="tbl-rem-area">
                                            <table class="table-reminder table-responsive-xl" id="table-reminder">
                                                <thead>
                                                    <tr>
                                                        <td style="text-align: center;">Reminder Description</td>
                                                        <td style="text-align: center;">Date</td>
                                                        <td style="text-align: center;">Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>  </tbody>
                                            </table>
                                        </div>    
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for add Reminders -->
                    <div id="reminderModal" class="modal fade">
                        <div class="modal-dialog modal-reminder">
                            <div class="modal-content card card-image">
                                <form id="reminder-form" method="POST">
                                    <div class="modal-header">
                                        <h4 class="modal-title text-uppercase">ADD NEW REMINDER</h4>
                                        <button type="button" class="close" data-mdb-dismiss="modal" aria-hidden="true">
                                            <i class="far fa-window-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="text-uppercase">Description</label>
                                            <input type="text" id="reminder" name="reminder" class="form-control" placeholder="Enter short description" required>
                                        </div>
                                        <div class="form-group">

                                            <div class="clearfix">
                                                <label class="text-uppercase">Date and Time</label>
                                                <input type="datetime-local" id="dateTime" min="" placeholder="Enter date and time" name="dateTime" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="submit-reminder" name="submitReminder" class="btn btn-submit pull-right">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- model end -->

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
    <script src="http://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        
        var tableReminder;
        get_reminder_lines();

        $(function() {
            $('.side-link.li-rem').addClass('active');
        });

        function get_reminder_lines() {
    
            tableReminder = $('#table-reminder').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/pages/student/php/reminder-list.php",
                    dataSrc: "data",                    
                    dataFilter: function(data){
                        var json = jQuery.parseJSON( data );
                        console.log(json);
                        json.recordsTotal = json.recordsTotal;
                        json.recordsFiltered = json.recordsFiltered;
                        json.data = json.data;            
                        return JSON.stringify( json ); // return JSON string
                    }
                },
                columns: [
                    { data:'reminder', name:'reminder'},
                    { data:'date', name:'date'},
                    { data:'action', name:'action', orderable: false, searchable: false},
                ]
            });

        }

        $("#submit-reminder").click(function(e) {
            e.preventDefault();
            
            if ( $("#reminder").val().length !== 0 && $("#dateTime").val().length !== 0 ){

                $('#reminderModal').modal('hide');
                var form_data = $('#reminder-form').serialize();
                $.ajax({
                    url: '/pages/student/php/reminder-insert.php',
                    type: 'POST',
                    data: form_data,
                    dataType: 'JSON',
                    success: function (data) {                     
                        // console.log(data);
                        tableReminder.ajax.reload();
                        if(data.result == true) {
                            // 
                        }
                        else {
                            //
                        }                      
                    }
                });
            }
            else {
                swal("Insert all data");
            }
            
        });

        function delete_reminder(reminder_id){

            swal({
                title: 'Are you sure?',
                html: "Do you want to delete this reminder",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        url: '/pages/student/php/reminder-delete.php',
                        type: 'POST',
                        data: {
                            reminder_id:reminder_id
                        },
                        dataType: 'JSON',
                        success: function (data) {                             
                            console.log(data);
                            if(data.result == true) {
                                //
                            }
                            else {
                                //
                            }                      
                        }
                    });

                }
            })

                    
        }
        

    </script>

        

</body>
</html>

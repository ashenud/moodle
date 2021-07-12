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
                                <button class="btn btn-sm text-light">Add Reminder</button>
                            </div>
                            <div class="card-body">
                                <button id='btnGiveCommand'>Give Command!</button>
                                <br><br>
                                <span id='message'></span>
                                <br><br>
                                
                                <input id='chkSteve' type="checkbox"> Steve Rogers
                                <br>
                                <input id='chkTony' type="checkbox"> Tony Stark
                                <br>
                                <input id='chkBruce' type="checkbox"> Bruce Banner
                                <br>
                                <input id='chkNick' type="checkbox"> Nick Fury
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

        $(function() {
            $('.side-link.li-rem').addClass('active');
        });

    </script>

<script>
        var message = document.querySelector('#message');

        var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
        var SpeechGrammarList = SpeechGrammarList || webkitSpeechGrammarList;

        var grammar = '#JSGF V1.0;'

        var recognition = new webkitSpeechRecognition();
        var speechRecognitionList = new SpeechGrammarList();
        speechRecognitionList.addFromString(grammar, 1);
        recognition.grammars = speechRecognitionList;
        recognition.lang = 'en-US';
        recognition.interimResults = false;

        recognition.onresult = function(event) {
            var last = event.results.length - 1;
            var command = event.results[last][0].transcript;
            message.textContent = 'Voice Input: ' + command + '.';

            if(command.toLowerCase() === 'select steve'){
                document.querySelector('#chkSteve').checked = true;
            }
            else if (command.toLowerCase() === 'select tony'){
                document.querySelector('#chkTony').checked = true;
            }
            else if (command.toLowerCase() === 'select bruce'){
                document.querySelector('#chkBruce').checked = true;
            }
            else if (command.toLowerCase() === 'select nick'){
                document.querySelector('#chkNick').checked = true;
            }   
        };

        recognition.onspeechend = function() {
            recognition.stop();
        };

        recognition.onerror = function(event) {
            message.textContent = 'Error occurred in recognition: ' + event.error;
        }        

        document.querySelector('#btnGiveCommand').addEventListener('click', function(){
            recognition.start();

        });


    </script>

        

</body>
</html>

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
                                <h5 class="font-weight-bold">Note Book</h5>
                                <button id="start-listning" class="btn btn-sm text-light">Start listening</button>
                            </div>
                            <header>
                                <h1>Browser speech recognition</h1>
                            </header>
                            <main class="result-div mb-4">
                                <div id="result"></div>
                                <p id="message" hidden aria-hidden="true">
                                    Your browser doesn't support Speech Recognition. Sorry.
                                </p>
                            </main>
                        </div>
                    </div>
                    <div class="col-12-6 mb-2">
                        <div class="card card-custom">
                            <div class="card-header mt-2 mb-3">
                                <h5 class="font-weight-bold">Note List</h5>
                            </div>
                            <div class="card-body">
                                <table class="table note-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><b>Lecture Type</b></th>
                                            <th class="text-center"><b>Note</b></th>
                                        </tr>
                                    </thead>
                                    <tbody id="note-tbody"> </tbody>
                                </table>
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
            $('.side-link.li-dict').addClass('active');
            get_note_list();
        });

        window.addEventListener("DOMContentLoaded", () => {
            const button = document.getElementById("start-listning");
            const result = document.getElementById("result");
            const main = document.getElementsByTagName("main")[0];
            var input = ""; 
            let listening = false;
            const SpeechRecognition =
                window.SpeechRecognition || window.webkitSpeechRecognition;
            if (typeof SpeechRecognition !== "undefined") {
                const recognition = new SpeechRecognition();

                const stop = () => {
                    main.classList.remove("speaking");
                    recognition.stop();
                    button.textContent = "Start listening";
                    if(input != "") {
                        get_lecture_type(input);
                    }
                };

                const start = () => {
                    input = ""; 
                    main.classList.add("speaking");
                    recognition.start();
                    button.textContent = "Stop listening";
                };

                const onResult = event => {
                    result.innerHTML = "";
                    input = ""; 
                    for (const res of event.results) {
                        const text = document.createTextNode(res[0].transcript);
                        const p = document.createElement("p");
                        if (res.isFinal) {
                            p.classList.add("final");
                            input += res[0].transcript;
                        }
                        p.appendChild(text);
                        result.appendChild(p);
                    }
                };
                recognition.continuous = true;
                recognition.interimResults = true;
                recognition.addEventListener("result", onResult);
                button.addEventListener("click", event => {
                    listening ? stop() : start();
                    listening = !listening;
                });
            } else {
                button.remove();
                const message = document.getElementById("message");
                message.removeAttribute("hidden");
                message.setAttribute("aria-hidden", "false");
            }
        });

        function get_lecture_type(input) {
            var data = {"input" : input }
            $.ajax({
                url: 'http://192.168.20.34:5000/subject',
                type: 'POST',
                dataType: 'JSON',
                contentType: 'application/json',
                crossDomain: true,
                data: JSON.stringify(data),
                success: function (response) {
                    if(response.result) {
                        store_note(input,response.result)
                    }                   
                }
            });
        }

        function store_note(note,lecture_type_desc) {
            var lecture_type = 0;
            if(lecture_type_desc == "Networking Related Lecture") {
                lecture_type = 1;
            }
            else if(lecture_type_desc == "Networking Related Lecture") {
                lecture_type = 2;
            }
            $.ajax({
                url: '/pages/student/php/note-insert.php',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    lecture_type : lecture_type,
                    lecture_type_desc : lecture_type_desc,
                    note : note
                },
                success: function (response) {
                    // console.log(response)
                    get_note_list()
                }
            });
        }

        function get_note_list() {
            $.ajax({
                url: '/pages/student/php/note-list.php',
                type: 'POST',
                dataType: 'JSON',
                success: function (response) {
                    console.log(response)
                    $('#note-tbody').empty();
                    var tboay = ""
                    $.each( response.data, function( key, value ) {
                        // console.log(value)
                        tboay +=    `<tr>
                                        <td>${value.lecture_type_desc}</td>
                                        <td>${value.note}</td>
                                    </tr>`
                    });
                    $('#note-tbody').append(tboay);
                }
            });
        }

    </script>      

</body>
</html>

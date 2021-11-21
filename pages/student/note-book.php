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
                            <main>
                                <div id="result"></div>
                                <p id="message" hidden aria-hidden="true">
                                    Your browser doesn't support Speech Recognition. Sorry.
                                </p>
                            </main>
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
            $('.side-link.li-dict').addClass('active');
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
                    console.log(input);
                };

                const start = () => {
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

        function get() 

    </script>      

</body>
</html>

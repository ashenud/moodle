<?php
session_start();

if(isset($_SESSION["flash_type"]) && isset($_SESSION["flash_message"])) {

    ?> 
    <script>
        $(document).ready(function() {
            var type = '<?php echo $_SESSION["flash_type"]?>';
            var message = '<?php echo $_SESSION["flash_message"]?>';
            swal("Opps!", message, type)
        });
    </script>
    <?php

    unset($_SESSION["flash_type"]);
    unset($_SESSION["flash_message"]);

}

?>
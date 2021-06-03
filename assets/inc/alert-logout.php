<?php
    if(isset($_GET['logout'])) {
        echo("<div class=\"alert alert-warning alert-dismissible fade show animated fadeIn delay-1s\" role=\"alert\">");
            echo("<strong>"); echo("පද්ධතියෙන් සාර්ථකව නික්මෙන ලදී !"); echo("</strong>");
            echo("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">");
                echo("<span aria-hidden=\"true\">"); echo("&times;"); echo("</span>");
            echo("</button>");
        echo("</div>");
    }
?>
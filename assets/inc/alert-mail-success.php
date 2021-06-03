<?php
    if(isset($_GET['mailSuccess'])) {
        echo("<div class=\"alert alert-success alert-dismissible fade show animated fadeIn\" role=\"alert\">");
            echo("<strong>"); echo("මුරපදය නැවත සැකසීමේ සබැඳිය(link) ඔබගේ ඊ මේල් ලිපිනයට යවන ලදී !"); echo("</strong>");
            echo("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">");
                echo("<span aria-hidden=\"true\">"); echo("&times;"); echo("</span>");
            echo("</button>");
        echo("</div>");
    }
?>
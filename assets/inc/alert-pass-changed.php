<?php
    if(isset($_GET['passChanged'])) {
        echo("<div class=\"alert alert-success alert-dismissible fade show animated fadeIn\" role=\"alert\">");
            echo("<strong>"); echo("මුරපදය සැකසීම සාර්ථකයි ! නැවත පිවිසෙන්න !"); echo("</strong>");
            echo("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">");
                echo("<span aria-hidden=\"true\">"); echo("&times;"); echo("</span>");
            echo("</button>");
        echo("</div>");
    }
?>
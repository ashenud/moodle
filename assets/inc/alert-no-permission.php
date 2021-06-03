<?php
    if(isset($_GET['noPermission'])) {
        echo("<div class=\"alert alert-danger alert-dismissible fade show animated fadeIn\" role=\"alert\">");
            echo("<strong>"); echo("ඔබට මෙහි පිවිසීමට අවසර නොමැත !"); echo("</strong>");
            echo("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">");
                echo("<span aria-hidden=\"true\">"); echo("&times;"); echo("</span>");
            echo("</button>");
        echo("</div>");
    }
?>
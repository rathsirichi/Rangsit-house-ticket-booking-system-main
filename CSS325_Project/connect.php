
<?php
    $mysqli = new mysqli('localhost','root','','css_325-project');
    if($mysqli -> connect_errno){
        echo $mysqli-> connect_errno.":".$mysqli->connect_error;

    }


?>
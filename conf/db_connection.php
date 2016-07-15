<?php
require_once "configuration.php";

$link = mysqli_connect($servername, $username, $password, $db_name);

if (!$link) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

?>
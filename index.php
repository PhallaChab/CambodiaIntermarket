
<?php
session_start();
require_once 'config/config.php';
// check if user login
//if ($_SESSION["userid"]==NULL) {
    header("location: ".URL."views/index.php");
//}
?>
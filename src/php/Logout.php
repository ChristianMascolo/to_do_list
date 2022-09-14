<?php

session_start();
setcookie("uname","",time() - 3600);
unset($_SESSION['logged']);

header("location: Home.php");

?>
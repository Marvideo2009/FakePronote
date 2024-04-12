<?php
session_start();
unset($_SESSION['id']);

#session_reset();
echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
?>
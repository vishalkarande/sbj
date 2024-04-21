<?php
session_start();
unset($_SESSION['user']);
echo "<script>window.location.href = 'index.php';</script>";
?>
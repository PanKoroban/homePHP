<?php session_start();
include('connect.php');

$query = "UPDATE basket SET basket_status=2 WHERE user_login='{$_SESSION['login']}' and basket_status = 1";
mysqli_query($link, $query);
header('Location:index.php');
?>

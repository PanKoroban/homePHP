<?php
include('../connect.php');
$query = "UPDATE basket SET basket_status = 3 WHERE id =".$_POST['id'];
mysqli_query($link, $query);
header('Location:admin.php?page=control');
<?php
include('connect.php');
//$query = "INSERT INTO comment(book_id, author_name, comment, likes) VALUES ($_POST['id'], $_POST['name'], $_POST['comment'], 0)";
$query = "INSERT INTO comment(book_id, author_name, comment, likes) VALUES (".$_POST['id'].", '".$_POST['name']."', '".$_POST['comment']."', 0)";
mysqli_query($link, $query);
header("Location:{$_SERVER['HTTP_REFERER']}");
?>
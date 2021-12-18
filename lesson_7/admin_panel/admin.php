<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Панель администратора</title>
</head>

<body>
    <a href="../index.php">В магазин</a>
<div class="container">
<div class="main">
<?php
include('../connect.php');
$query = "select * from catalog";
$result = mysqli_query($link, $query);
while($row = mysqli_fetch_assoc($result)):?>
<form action="server.php" method="POST">
    <div class="card">
        <img src="../short_img/<?= $row['url'];?>">
        <input type="text" name="author" value="<?= $row['author'];?>">
        <input type="text" name="name" value="<?= $row['name'];?>">   
        <input type="text" name="price" value="<?= $row['price'];?>"> 
        <textarea name="short_disc" cols="30" rows="3"><?= $row['short_disc'];?></textarea>
        <textarea name="disc" cols="40" rows="18"><?= $row['disc'];?></textarea>
        <input type="hidden" name="id" value="<?= $row['id'];?>">
        <p><input type="checkbox" name="del" value="1"> Удалить</p>
        <input type="submit">    
    </div>
</form>
<?php endwhile;?>
</div>

<form class="new" action="server.php" method="POST" enctype="multipart/form-data">
    <h3>Добавить товар:</h3>
    <p>Автор:</p>
    <input type="text" name="author">
    <p>Название:</p>
    <input type="text" name="name">
    <p>Цена:</p>
    <input type="text" name="price">
    <p>Короткое описание:</p>
    <textarea name="short_disc" cols="30" rows="3"></textarea>
    <p>Аннотация:</p>
    <textarea name="disc" cols="30" rows="3"></textarea>
    <p>Загрузить фото:</p>
    <input type="file" accept="image/*" name="new_img">
    <input type="hidden" name="new" value="1">
    <input type="submit">
</form>


</div>
</body>
</html>
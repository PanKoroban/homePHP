<?php
    include('connect.php');
    $query = "SELECT * FROM catalog WHERE id ={$_GET['id']}";  
    $res = mysqli_query($link, $query);
    $res = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title><?= 'Купить '.$res['name']?></title>
</head>






<body>
    <div class='container'>
        <header> Название и лого </header>
        <div class='cont'>
            <div class="image">
                <img class="full_image" src="full_img/<?= $res['url'] ?>">
                <p class="price">Стоимость: <?= $res['price'] ?> рублей</p> 
            </div>
            <div class='disc'>
                <h1 class='name'><?= $res['name'] ?></h1> 
                <p class='author'>Автор: <?= $res['author'] ?></p>
                <h3 class='h3_anno'>Аннотация:</h3>
                <p class='anno'><?= $res['disc'] ?></p>
                <a class='back' href="index.php">Назад</a>
            </div>
        </div>
        <div class='comment'>
            <div class='inner_comment'>
                <?php
                include('connect.php');
                $query = "SELECT * FROM comment WHERE book_id ={$_GET['id']} order by id desc limit 2";
                $res = mysqli_query($link, $query);
                while($row = mysqli_fetch_assoc($res)):
                ?>
                <div class='inner_comment_text'>
                <p class='comment_author'><?= $row['author_name'] ?> оставил отзыв:</p>
                <p class= 'comment_text'><?= $row['comment'] ?></p>
                </div>
                <?php endwhile ?> 
                <a href="all_comment.php?id=<?= $_GET['id']?>">Все отзывы</a>   
            </div>
            <form action="send.php" method='POST'>
                <p>Ваше имя:</p>
                <input type="text" name="name"><br>
                <p>Ваш отзыв:</p>
                <textarea name="comment"></textarea><br>
                <input type="submit">
                <input type="hidden" name='id' value='<?= $_GET['id'] ?>'>
            </form>
        </div>
        <footer></footer>
    </div>
</body>

</html>
<?php session_start();
include('func.php');
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
        <header>  
        <?php include('auth/switch_auth.php'); ?>
        </header>   
        <div class="basket">
            <p>Товаров в корзине:</p>
            <?php countBasket($resCount);?>
            <a href="basket.php">Перейти в корзину</a>
        </div> 
        <div class='cont'>
            <div class="image">
                <img class="full_image" src="full_img/<?= $res['url'] ?>">
                <p class="price">Стоимость: <?= $res['price'] ?> рублей</p>
                <?php if($_SESSION['auth'] == true):?>
                    <form action="buy.php" method='POST'>
                    <input class='buy_button' type="submit" value='Купить'>
                    <input type="hidden" name='goods_id' value='<?= $_GET['id']; ?>'>
                    </form>
                <?php endif; ?>
                <?php if($_SESSION['auth'] == false):?>
                    <p class='buy_text'>Авторизуйся для покупки</p>
                <?php endif; ?>
                

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
                createComment($resComment);
                ?> 
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
<?php session_start();
include('func.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Gallary</title>
</head>



<body>
    <div class="container">
        <header class='header'> 
            <a href="index.php">В магазин</a>
        </header>
        <div class="main">
            <h3>Оплаченные заказы:</h3>
           <?php
           OrderOk($link, 2);
            ?>
        </div> 
        <hr>
        <div>
        <h3>Полученные книги:</h3>
           <?php
           OrderOk($link, 3);
            ?>
        </div>  
        <hr>
        <h3>Товары в корзине:</h3>
        <div class="basket_main">
           <?php Order($link, 1);?>
           <form action="buy_accept.php">
               <input class="buy" type="submit" value='Купить'>
           </form>
           <a class='back' href="index.php">Продолжить выбор</a>
        </div> 
        <footer></footer>  
    </div> 
</body>

</html>
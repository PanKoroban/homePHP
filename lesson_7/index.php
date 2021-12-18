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
        <?php include('auth/switch_auth.php'); ?>
        </header>
        <div class="basket">
            <p>Товаров в корзине:</p>
            <?php countBasket($resCount);?>
            <a href="basket.php">Перейти в корзину</a>
        </div>   
        <div class="main">
            <?php 
            createGallary($result);
            ?>
        </div> 
        <footer></footer>  
    </div> 
</body>

</html>
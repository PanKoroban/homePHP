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
    <link rel="stylesheet" href="style/basket.css">
    <title>Корзина</title>
</head>



<body>
    <div class="container">
        <header>  
        <?php include('auth/switch_auth.php'); ?>
        </header>
          
        <div class="basket_main">
           <?php countBasketFull($resCount);?>
           <form action="buy_accept.php">
               <input class="buy" type="submit" value='Купить'>
           </form>
           <a class='back' href="index.php">Продолжить выбор</a>
        </div> 
        <footer></footer>  
    </div> 
</body>

</html>
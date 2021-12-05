<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Gallary</title>
</head>

<?php
include('connect.php');
$query = "select * from catalog";
$result = mysqli_query($link, $query);
?>

<body>
    <div class="container">
        <header> Название и лого </header>   
        <div class="main">
            <?php while($row = mysqli_fetch_assoc($result)):?>
                <div class="card">
                    <p><?= $row['name'];?></p>
                    <a href="full.php?id=<?= $row['id'];?>"> 
                    <img src="short_img/<?= $row['url'];?>">
                    </a>
                </div>
            <?php endwhile;?>
        </div> 
        <footer></footer>  
    </div> 
</body>

</html>
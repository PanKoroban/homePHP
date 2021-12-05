<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gallary</title>
</head>

<?php
$file = scandir('img');
?>

<body>
<div class="container">    
    <div class="main">
<?php for($i=2;$i<count($file);++$i): ?>
    <a href="full_img.php?name=<?= $file[$i];?>" > 
        <img src="img_short/<?=$file[$i];?>" class="main_img" alt="">
    </a> 
<?php endfor;?>
    </div>

    <form action="send.php" method="POST" enctype="multipart/form-data">
    <p>Загрузить фото:</p>
    <input type="file" accept="image/*" name="new_img">
    <button type="submit" name="send">Отправить</button>
    </form>
</div>    
</body>

</html> 
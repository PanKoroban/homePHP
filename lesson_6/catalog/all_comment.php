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
    <title><?= 'Отзывы '.$res['name']?></title>
</head>






<body>
    <div class='container'>
        <header> Название и лого </header>
        <h1>Отзывы на "<?= $res['name'] ?>"</h1>
        <div class='comment'>
            <div class='inner_comment'>
                <?php
                include('connect.php');
                $query = "SELECT * FROM comment WHERE book_id ={$_GET['id']} order by id";
                $res = mysqli_query($link, $query);
                while($row = mysqli_fetch_assoc($res)):
                ?>
                <div class='inner_comment_text'>
                <p class='comment_author'><?= $row['author_name'] ?> оставил отзыв:</p>
                <p class= 'comment_text'><?= $row['comment'] ?></p>
                </div>
                <?php endwhile ?>    
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
        <a class='back' href="<?= $_SERVER['HTTP_REFERER'] ?>">Назад</a>
        <footer></footer>
    </div>
</body>

</html>
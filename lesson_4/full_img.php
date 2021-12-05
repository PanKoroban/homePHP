<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?= $_GET['name'];?></title>
</head>

<body>
    <div><a href="<?= $_SERVER['HTTP_REFERER'] ;?>">Назад</a></div>
    <img src="img/<?= $_GET['name']; ?>">   
</body>

</html> 
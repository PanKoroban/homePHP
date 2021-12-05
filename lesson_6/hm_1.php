<?php
if (is_numeric($_POST['a']) and is_numeric($_POST['b'])) {
    switch ($_POST['oper']){
        case 'plus':
            $res = $_POST['a'] + $_POST['b'];
            break;
        case 'minus':
            $res = $_POST['a'] - $_POST['b'];
            break;
        case 'mult':
            $res = $_POST['a'] * $_POST['b'];
            break;
        case 'div':
            if ($_POST['b'] == 0){
                $res = 'Деление на ноль';
            } else {
                $res = round($_POST['a'] / $_POST['b'], 2);
            }
            break;   
    }
}
    else {
        $res="вводите числа";
    }
?>

<form action="#" method="POST">
    <input type="text" name="a" value="<?= $_POST['a']?>">
    <select name="oper">
        <option value="plus" <?php if ($_POST['oper']=='plus') echo "selected"; ?>>Плюс</option>
        <option value="minus" <?php if ($_POST['oper']=='minus') echo "selected"; ?> >Минус</option>
        <option value="mult" <?php if ($_POST['oper']=='mult') echo "selected"; ?>  >Умножить</option>
        <option value="div" <?php if ($_POST['oper']=='div') echo "selected"; ?> >Делить</option>
    </select>
    <input type="text" name="b" value="<?= $_POST['b']?>"> 
    <label>= 
        <?= $res  ?>
    </label>
    <br>
    <input type="submit">
</form>



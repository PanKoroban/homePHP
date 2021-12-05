<?php
if (is_numeric($_POST['a']) and is_numeric($_POST['b'])) {
    switch ($_POST['oper'][0]){
        case '+':
            $res = $_POST['a'] + $_POST['b'];
            break;
        case '-':
            $res = $_POST['a'] - $_POST['b'];
            break;
        case '*':
            $res = $_POST['a'] * $_POST['b'];
            break;
        case '/':
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

    header("Location: hm_2.php?res=$res");
?>
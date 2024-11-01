<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$n = rand(1, 8);
$count = 0;
$text = "";
$nameErr = "";

if (isset($_POST['Submit'])) {
    $n = $_POST['user_num'];
    echo $n . "\n";
    $count = $_POST['hidden'] + 1;
    echo "|" . $count . "\n";

    if (empty($_POST["my_number"])) {
        $nameErr = "Число обязательно нужно ввести!";
    } else {
        $my_number = trim($_POST["my_number"]);

        if (!preg_match("/^[1-8]$/", $my_number)) {
            $nameErr = "Разрешается только число от 1 до 8!";
        }
    }
    if ($nameErr === "") {
        if ($my_number > $n) {
            $text = "Слишком много!";
        } elseif ($my_number < $n) {
            $text = "Слишком мало!";
        } else {
            $text = "Точно! Угадано с $count попытки!<br/>";
        }
    }
}?>

<p>Угадай число от 1 до 8:</p>
<form action="<?=$_SERVER['PHP_SELF']?>" name="myform" method="POST">
  <input type="text" name="my_number" size="5"><?=$text?><?=$nameErr?><br/>
  <input type="hidden" name="hidden" size="50" value="<?=$count?>">
  <input type="hidden" name="user_num" size="50" value="<?=$n?>">
  <input name="Submit" type="submit" value="Отправить"><br/>
</form>
</body>
</html>
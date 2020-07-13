<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="ru">
    <head>
        <title>Подтверждение подписи</title>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Карелия, Выборг, Финляндия">
        <link href="favicon.png" rel="shortcut icon">
    </head>
    <body>
<?php

include "config.php";

$code = addslashes($_GET["c"]);

function isToken($c) {
    $len = strlen(md5("") . str_repeat("a", 20));
    if (strlen($c) != $len) return false;
    for ($i = 0; $i < $len; $i++) {
        if (strpos("0123456789abcdef", $c[$i]) === false) {
            return false;
        }
    }
    return true;
}

$db = mysqli_connect(
    $conf["server"], 
    $conf["user"], 
    $conf["password"],
    $conf["dbname"]
);
if ($db === false || !isToken($code)) {
	echo "Произошла ошибка.";
} else {
    $sql = "UPDATE people SET ok = 1 WHERE code = '$code'";
    $res = mysqli_query($db, $sql);
    if ($res === false)
        echo "Произошла ошибка.";
    else
    	echo "Подтверждено.";
}
?>
    <?php include "code/footer.php"; ?>
    </body>
</html>
<?php

include "config.php";

$code = addslashes($_GET["c"]);

$db = mysqli_connect(
    $conf["server"], 
    $conf["user"], 
    $conf["password"],
    $conf["dbname"]
);
if ($db === false) {
	echo "Произошла ошибка.";
} else {
    $sql = "UPDATE people SET ok = 1 WHERE code = '$code'";
    $res = mysqli_query($db, $sql);
    if ($res === false)
        echo "Произошла ошибка.";
    else
    	echo "Подтверждено.";
}

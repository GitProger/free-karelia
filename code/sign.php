<?php

include "config.php";

function request($db, $sql) {
    $res = mysqli_query($db, $sql);
    if ($res === false) {
        echo "Произошла ошибка.";
        return false;
    }
    return true;
}


$db = mysqli_connect(
    $conf["server"], 
    $conf["user"], 
    $conf["password"],
    $conf["dbname"]
);

if ($db === false) {
	echo "Произошла ошибка.";
} else {
    $new_tab = "CREATE TABLE IF NOT EXISTS people
        (
            age       INTEGER,
            name      VARCHAR(100),
            surname   VARCHAR(100),
            mail      VARCHAR(330),
            code      VARCHAR(64),
            ok        BOOLEAN
        ) CHARACTER SET=utf8";
    request($db, $new_tab);

    $name    = htmlentities(addslashes($_POST['name'   ]));
    $surname = htmlentities(addslashes($_POST['surname']));
    $age     = htmlentities(addslashes($_POST['age'    ]));
    $email   = htmlentities(addslashes($_POST['email'  ]));

    if ($name && $surname && $age && $email) {
        $exist_qr = mysqli_query($db, "SELECT EXISTS (SELECT * FROM people WHERE mail = '$email')");

        if ($exist_qr === false || mysqli_fetch_row($exist_qr)[0] == 1) {
            echo "Вы уже подписали петицию.";
        } else {
            $code = md5($email);
            mt_srand(time() + 228 * mt_rand() + 1337);
            for ($i = 0; $i < 20; $i++)
                $code .= dechex(mt_rand() % 16);

            $save_query = "INSERT INTO people VALUES ($age, '$name', '$surname', '$email', '$code', 0)";
            if (request($db, $save_query))
                echo "Спасибо за участие. Подтвердите, пожалуйста, подпись через электронную почту.";

            $link = "http://free-karelia/verify.php?c=$code";
            $msg = "$surname $name, перейдите по <a href=\"$link\">ссылке</a>, чтобы подтвердить подпись.";
            $msg = wordwrap($msg, 70, "\r\n");
            mail($_POST['email'], "Подтвердите подпись", $msg, "Content-Type: text/html\r\n");
        }
    }
}

?>

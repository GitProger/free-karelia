<?php
// one page = 100 humen

function getCorrectAgeWord($age) {
    $word = "лет";
    if ($age % 10 == 1)
        $word = "год";
    elseif (0 < $age % 10 && $age % 10 < 5)
        $word = "года";
    if (in_array($age, [11, 12, 13, 14]))
        $word = "лет";
    return $word;
}

$page = $_GET["page"];

include "config.php";
$db = mysqli_connect(
    $conf["server"], 
    $conf["user"], 
    $conf["password"],
    $conf["dbname"]
);

if ($db === false) {
    echo "";
} else {
    $beg = $page * 100;
    $sql = "SELECT * FROM people WHERE ok = 1 ORDER BY surname, name LIMIT $beg, 100";
    $res = mysqli_query($db, $sql);
    if ($res === false) {
        echo "";
    } else {
        $a = mysqli_fetch_all($res, MYSQLI_ASSOC);
        $res = "";
        foreach ($a as $k => $v) {
            $word = getCorrectAgeWord((int)$v['age']);
            $n = $beg + $k + 1;
            $res .= "<p>$n. ${v['surname']} ${v['name']}, ${v['age']} $word</p>\n";
        }
        echo $res;
    }
}
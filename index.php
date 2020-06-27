<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="ru">
    <head>
        <title>Свободная Карелия</title>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Карелия, Выборг, Финляндия">
        <link href="favicon.png" rel="shortcut icon">
        <link href="css/main.css" rel="stylesheet">
        <script src="js/jquery-3.5.0.min.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div>
            <?php include "html/description.html"; ?>
        </div>
        <div class="block">
            Поставить подпись <br>
            <form method="POST" action="sign.php" id="sign" style="width: 30em">
                <input class="frm-edit" name="name" placeholder="Имя..."> <br>
                <input class="frm-edit" name="surname" placeholder="Фамилия..."> <br>
                <input class="frm-edit" name="age" placeholder="Возраст..." id="age">
                  <span id="age-notif" hidden> Введите корректный возраст </span> <br>            
                <input class="frm-edit" name="email"
                    placeholder="Адрес эл. почты..." id="email">
                  <span id="email-notif" hidden>
                      Введите корректный адрес эл. почты
                  </span>
                  <br>
                <input class="send" type="submit" value="Подписать">
            </form>
        </div>
    </body>
</html>
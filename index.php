<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="ru">
    <head>
        <title>Свободная Карелия</title>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Карелия, Выборг, Финляндия">
        <link href="favicon.png" rel="shortcut icon">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/desc.css" rel="stylesheet">
        <script src="js/jquery-3.5.0.min.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="view" hidden>
            <button id="return"><b>&lt;</b></button>
            <img id="showImg">
        </div>
        <div id="content">
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v7.0" nonce="shz3mlrE"></script>

            <div id="description">
                <?php include "html/description.html"; ?>
            </div> <!-- description -->
            <hr>
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

            <br> <br>
            <div class="fb-like" data-href="http://free-karelia.ru/" data-width="" 
                data-layout="button_count" data-action="like" 
                data-size="large" data-share="false"></div>
            <!-- "button" instead of "button_count" -->
            <?php include "code/footer.php"; ?>
        </div> <!-- content -->
    </body>
</html>

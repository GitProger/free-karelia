$(document).ready(function () {
    $("#sign").submit(function (event) {
        var emailOk = $("#email").val().match(
            /(^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$)/i);
        var ageOk = Math.floor(Number($("#age").val())) >= 18;
        if (!emailOk)
            $("#email-notif").show(250);
        else
            $("#email-notif").hide(250);
        if (!ageOk) 
            $("#age-notif").show(250);
        else
            $("#age-notif").hide(250);
        if (emailOk && ageOk)
            return;
        event.preventDefault();
    });
});

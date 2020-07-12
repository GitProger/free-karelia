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

    var inView = false;
    function toggleContent() {
        $("#content").toggle(500);
        $("#view").toggle(500);
        inView = !inView;
    }
    $(".picture").click(function () {
        $("#showImg").attr("src", $(this).attr("src"));
        toggleContent();
    });

    $(document).keydown(function (e) {
        if ([10, 13, 27, 32].indexOf(e.which) !== -1 && inView) {
            toggleContent();
        }
    });
    $(document).dblclick(toggleContent);
    $("#return").click(toggleContent);
});

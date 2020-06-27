var page = 0;

$(document).ready(function () {
    $("#more").click(function () {
        $.get("get.php?page=" + String(page), function (data, status) {
            $("#list").append(data);
        });
        page++
    });
    $("#more").click();
});
$(document).ready(function () {
    $(".addUserbtn button").click(function () {
        $(".popup").addClass("active");
    });

    $(".popup .cancel-btn").click(function () {
        $(".popup").removeClass("active");
    });
});
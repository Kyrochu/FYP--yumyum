$(document).ready(function () {
    
    $(".vieworder").click(function () {
        $(".popup").addClass("active");
    });

    $(".popup .cancel-btn").click(function () {
        $(".popup").removeClass("active");
    });
});
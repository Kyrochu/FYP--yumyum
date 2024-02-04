$(document).ready(function () {
    // Show the popup when the "ADD NEW ADMIN" button is clicked
    $(".vieworder").click(function () {
        $(".popup").addClass("active");
    });

    // Hide the popup when the "CANCEL" button is clicked
    $(".popup .cancel-btn").click(function () {
        $(".popup").removeClass("active");
    });
});
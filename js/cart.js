

let carticon = document.querySelector(".carticon");
let body = document.querySelector(".cartfile");
let close = document.querySelector(".closex")


// show carttab start
carticon.addEventListener('click' , () =>
{
    body.classList.toggle('showcart')
})

close.addEventListener('click' , () =>
{
    body.classList.toggle('showcart')
})
// show cartab end


// add to cart 

$(document).ready(function () {
    // Show the popup when the "ADD NEW ADMIN" button is clicked
    $("button").click(function () {
        alert("HELLO WORLD");
    });

});

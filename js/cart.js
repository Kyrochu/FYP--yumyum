

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





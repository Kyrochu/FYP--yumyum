

let carticon = document.querySelector(".carticon");
let body = document.querySelector(".cartfile");
let close = document.querySelector(".closex")

const testArray = [1,2,3,4,5]
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



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .contian
{
    transform: 0.5s;

}

.carttab
{
    margin-top: 8%;
    border-radius: 20px;
    width: 490px;
    background-color: gray;
    color: white;
    position:fixed;
    inset: 0 -500px 0 auto;
    display: grid;
    grid-template-rows: 70px 1fr 70px;
    transition: 0.5s;
}

div.showcart .carttab
{

    inset: 0 0 0 auto;
}

div.showcart .container
{
    transform: translateX(-250px);
}

.carttab h1
{
    color: rgb(40, 44, 43);
    text-shadow: 5px 5px 5px wheat;
    margin-top: 15px;
    text-align: center;
    align-items: center;
}

.carttab .listcart .item img
{
    width: 100%;
    margin-left: 15px;
}

.carttab .listcart .item
{
    display: grid;
    grid-template-columns: 70px 150px 50px 1fr;
    gap: 10px;
    text-align: center;
    align-items: center;
}

.carttab button.closex
{
    width: 15px;
    height: 15px;
    position: absolute;
    top: 30px;
    left: 430px;
}

.listcart .qty span
{
    display: inline-block;
    width: 25px;
    height: 25px;
    background-color: #eee;
    color: #555;
    border-radius: 50%;
    cursor: pointer;
}

.listcart .qty span:nth-child(2)
{
    background-color: transparent;
    color: #eee;
}

.listcart .item:nth-child(even)
{
    background-color: #eee2;
}

.listcart
{
    display: flex;
    flex-direction: column;
    align-items: center; 
    
}

.listcart::-webkit-scrollbar
{
    width: 0;
}
  </style>
</head>
<body>



                    <div>
                        <h1 class="" >Shopping Cart</h1> 
                        <button class="closex btn-close " aria-label="Close" ></button>
                    </div>
                       
                        
                                
                                    <diV class="listcart">
                                        <div class="item">
                                            <img src="./img/menu-1.jpg" alt="">
                                            <div class="name">ddddd</div>
                                            <div class="price">RM 12 3</div>
                                            <div class="qty">
                                                <span class="minus">-</span>
                                                <span>2</span>
                                                <span class="plus">+</span>
                                            </div>
                                        </div>
                                    </diV>
                
                        

                    <div class="btn">
                        <a class="btn btn-primary" href="log_cart.php"  >check out</a>
                    </div>


   
   

</body>
</html>

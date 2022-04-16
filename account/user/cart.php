

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../Application/css/menu-bar.css"/>
    <link rel="stylesheet" href="../../Application/css/footer.css"/>
    <link rel="stylesheet" href="../../Application/css/product-landing.css"/>
    <title>STORE</title>
</head>
<body>
<?php
session_start();

// The code which acts as a cart for the user who is checking out an item
// or multiple items at once.
    
$username = $_SESSION['username'];
$db = mysqli_connect("localhost", "root", "321trewq", "amazin", "3306") or die ("fail");
$query = "SELECT id FROM customers where username = '$username'";
$result = mysqli_query($db,$query);
$row2 = $result->fetch_assoc();
$userId = $row2['id'];
$_SESSION['id'] = $userId;


$query2 = "select products.id, products.name,category,description,price,imgPath,sellerId ,carts.quantity
from products,carts
where carts.customerId = '$userId' and carts.productId = products.id ;";
$result2 = mysqli_query($db, $query2);
$query3 = "select quantity from carts carts.customerId = '$userId' and carts.productId = products.id; ";
$result3 = mysqli_query($db,$query3);
?>
<?php
include "../../navbar.php";
?>
<div class="container">
    <div class="header">
        <h1>Your Cart</h1>
    </div>
    <div class="content">
        <?php
        $total = 0;
        while ($row = mysqli_fetch_assoc($result2)) {
            $code = $row['id'];
            $name = $row['name'];
            $price = $row['price'];

            // Display the total price so the user can see how much they're paying
            $quantity = $row['quantity'];
            $_SESSION['quantity'] = $quantity;
            $total = $total + $price*$quantity;
            $description = $row['description'];
            $aisle = $row['category'];
            $asset = strtolower(str_replace(" ", "_", $name));


            $imgPath = "../../" . $row['imgPath'] . "/";
            $linkPath = "../../products/product-detail.php?code=" . $code;
            $img = "<img class=\"landing-item_img\"  src=\"" . $imgPath . "\"alt=\"" . $asset . "\" />";



            $item = "<a class=\"landing-item__link\" href=\"" . $linkPath . "\">
                               <div class=\"landing-item\">
                                   <div class=\"landing-item_img-wrapper\">
                                       " . $img . "
                                   </div>
                                   <div class=\"landing-item_content\">
                                       <div class=\"landing-item_content--header\">
                                           <div class=\"landing-item_content--header-name\">
                                               <p class=\"item--title\">
                                                   " . $name . "
                                               </p>

                                           </div>
                                           <div class=\"landing-item_content--header-price\">
                                               <p class=\"item--price\">
                                                   " . $price . "$<br> quantity: ". $row['quantity'] . "
                                                   
                                                   
                                               </p>
                                           </div>

                                       </div>
                                       <p class=\"item--desc\">
                                           " . $description . "
                                       </p>
                                       
                                       
                                   </div>
                                 
                                   
                               </div>
                          
                            </a>
                            <form style='position: relative;left: 1000px' action='removeFromCart.php' method='post'>
                        <label for='quantity'>Quantity</label>
                        <input id='quantity' name='quantity' type='text' value='1' />
                         <input name='code' type='hidden' value=  $code  />
                        <button type='submit' name='remove'>Remove</button>
                    </form>
                          
                           ";
            echo $item;

        }

        // Output total to see how much the user is paying before paying for the order
        if ($total > 0 ) {
            echo "<b>total is: " . $total . "<br></b>";
            echo "
<form method='post' action='placeOrder.php'>
<br><input  type='submit' value='Place Order' style='background: cornflowerblue; color: white' name='order'><br>
</form>";

        }?>
    </div>
</div>

<?php

?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Application/css/menu-bar.css"/>
    <link rel="stylesheet" href="../Application/css/footer.css"/>
    <link rel="stylesheet" href="../Application/css/product-landing.css"/>
    <title>STORE</title>
</head>
<body>
<?php
//provides the manu bar for the page
include "../navbar.php";
//connect to the database
$db = mysqli_connect("localhost", "root", "321trewq", "amazin", "3306") or die ("fail");
$aisle = isset($_GET['aisle']) ? $_GET['aisle'] : 'general';
$cleanAisle = strtoupper(substr($aisle, 0, 1)) . substr($aisle, 1);
//cehck for general products or a specific category
if($aisle != "general")
$query = "SELECT * FROM products,customers where category='$aisle' and customers.id = sellerId";
else $query = "SELECT * FROM products,customers where sellerID = customers.id ";
$result = mysqli_query($db, $query);

?>
<?php

?>
<div class="container">
    <div class="header">
        <h1><?php echo $cleanAisle; ?></h1>
    </div>
    <div class="content">
        <?php

        //will display evrery product from a category by fetching the information from the database
        while ($row = mysqli_fetch_assoc($result)) {
            $code = $row['id'];
            $name = $row['name'];
            $price = $row['price'];
            $description = $row['description'];
            $aisle = $row['category'];
            $asset = strtolower(str_replace(" ", "_", $name));


            $imgPath = "../" . $row['imgPath'] . "/";
            $linkPath = "product-detail.php?code=" . $code;
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
                                                   " . $price . "$
                                               </p>
                                                   <div class=\"landing-item_content--header-price\">
                <p style='float: right' class=\"item--price\">
                   seller: " . $row['username'] . "<br>
                   seller ID: " . $row['sellerID'] . "<br>
                   product id: ".$code."<br>
                   <B>only ".$row['quantity']." left in stock!</B>
                </p>
            </div>
                                           </div>

                                       </div>
                                       <p class=\"item--desc\">
                                           " . $description . "
                                       </p>
                                   
                                   </div>
                                   
                               </div>
                           </a>";
            echo $item;
        }
        ?>
    </div>
</div>

<?php
//provides the footer for the page
include "../footer.php";
?>
</body>
</html>

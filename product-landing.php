<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Application/css/menuBar.css" />
    <link rel="stylesheet" href="Application/css/footer.css" />
    <link rel="stylesheet" href="Application/css/product-landing.css" />
    <title>STORE</title>
</head>
<body>
  <?php
      $aisle = $_GET["aisle"];

      $cleanAisle = strtoupper(substr($aisle, 0, 1)) . substr($aisle, 1);

      $productsSource = fopen("files/products.csv", "r");

      $products = array();

      while ($row = fgetcsv($productsSource)) {
        if ($row[6] == $aisle) {
          array_push($products, $row);
        }
     }

     fclose($productsSource);

  ?>
  <?php
    include "./snippets/navbar.php";
  ?>
  <div class="container">
      <div class="header">
          <h1><?php echo $cleanAisle; ?></h1>
      </div>
      <div class="content">
        <?php
           foreach ($products as $product) {
             $code = $product[0];
             $name = $product[1];
             $price = $product[3];
             $description = $product[2];
             $aisle = $product[4];
             $asset = strtolower(str_replace(" ", "_", $name));


             $imgPath = "assets/" . $aisle . "/" . $asset . ".jpg";
             $linkPath = "product-detail.php?code=" . $code;
             $img = "<img class=\"landing-item_img\"  src=\"" . $imgPath . "\"alt=\"" . $asset . "\" />";

             $item =  "<a class=\"landing-item__link\" href=\"" . $linkPath . "\">
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
    include "./snippets/footer.php";
   ?>
 </body>
</html>

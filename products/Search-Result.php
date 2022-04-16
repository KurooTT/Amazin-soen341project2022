<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Application/css/footer.css" />
    <link rel="stylesheet" href="../Application/css/menu-bar.css" />
    <link rel="stylesheet" href="../Application/css/product-landing.css" />
    <title>search</title>
</head>

<body>
    <?php
    include "../navbar.php";

    //DATABASE CONNECTION
    $search = isset($_POST['search']) ? $_POST['search'] : '';
    $search = ucfirst($search);
    $db = mysqli_connect("localhost", "root", "321trewq", "amazin", "3306") or die("fail");
    $query = "SELECT products.id, name, price, username , description,imgPath, sellerID  FROM products,customers where (description LIKE '%$search%' OR name LIKE '%$search%'
OR category LIKE '%$search%') AND products.sellerID = customers.id";
    $result = mysqli_query($db, $query);


    ?>
    <h1>Search Results</h1>
    <h6><?php echo mysqli_num_rows($result); ?> result(s) </h6>

    <?php
    //FETCH DATA AND DISPLAY ON PAGE
    while ($row = mysqli_fetch_assoc($result)) {
        $img = "<img class=\"landing-item_img\"  src=\"../" . $row['imgPath'] . "\"alt=\"" .  "\" />";
        $linkPath = "product-detail.php?code=" . $row['id'];
        $item = "<a class=\"landing-item__link\" href=\"" . $linkPath . "\">
<div class=\"landing-item\">
    <div class=\"landing-item_img-wrapper\">
        " . $img . "
    </div>
    <div class=\"landing-item_content\">
        <div class=\"landing-item_content--header\">
        
            <div class=\"landing-item_content--header-name\">
                <p class=\"item--title\">
                    " . $row['name'] . "
                </p>

            </div>
            <div class=\"landing-item_content--header-price\">
                <p class=\"item--price\">
                    " . $row['price'] . "$
                </p>
            </div>

        </div>
        <p class=\"item--desc\">
            " . $row['description'] . "
        </p>
        <div class=\"landing-item_content--header-price\">
                <p style='float: right' class=\"item--price\">
                   seller: " . $row['username'] . "<br>
                   seller ID: " . $row['sellerID'] . "<br>
                   product id: " . $row['id'] . "
                </p>
            </div>
        
        
    </div>
</div>
</a>";
        echo $item;
    }
    include('../footer.php');

    ?>
</body>
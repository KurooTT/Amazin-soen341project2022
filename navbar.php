<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['username'])){
    ?>
    <header>
        <div class="nav-wrapper">
            <nav>
                <div class="logo-wrapper">
                    <p id='logo'> <a href='../../../index.php'>AMAZIN</a></p>
                </div>
                <div class="menu-wrapper">
                    <ul class="menu">
                        <?php 
                        //navbar item that links to landing page
                        if(str_contains($_SERVER['REQUEST_URI'],"/products/")){
                            echo' <li class="menu-item"><a href="product-landing.php"> Shop</a>';
                        }else if(str_contains($_SERVER['REQUEST_URI'],"index")){
                            echo ' <li class="menu-item"><a href="products/product-landing.php"> Shop</a>';
                        }else{
                            echo ' <li class="menu-item"><a href="../../products/product-landing.php"> Shop</a>';
                        }

                        ?>

                        <ul class="submenu">
                            <?php
                            //when the categories tab is clicked the following op[tions are shown
                            // jewelry, tools, electronics and clothes
                            $aisles = ["jewelry", "tools", "electronics", "clothes"];
                            foreach ($aisles as $aisle) {
                                $displayName = strtoupper(substr($aisle, 0, 1)) . substr($aisle, 1);
                                if (str_contains($_SERVER['REQUEST_URI'], "/products/")) {
                                    echo '<li class="submenu-item"><a href="product-landing.php?aisle=' . $aisle . '">' . $displayName . '</a></li>';
                                }else if(str_contains($_SERVER['REQUEST_URI'],"index")) {
                                    echo '<li class="submenu-item"><a href="products/product-landing.php?aisle=' . $aisle . '">' . $displayName . '</a></li>';
                                }else
                                    echo '<li class="submenu-item"><a href="../../products/product-landing.php?aisle=' . $aisle . '">' . $displayName . '</a></li>';
                            }

                            ?>
                        </ul>
                        </li>
                        <?php
                        if(str_contains($_SERVER['REQUEST_URI'],"/account/")){
                            echo "<li class='menu-item'><a href='myAccount.php'>Account</a></li>";
                        }else if(str_contains($_SERVER['REQUEST_URI'],"index")){
                            echo "<li class='menu-item'><a href='account/general/myAccount.php'>Account</a></li>";
                        }else{
                            echo "<li class='menu-item'><a href='../../account/general/myAccount.php'>Account</a></li>";
                        }?>

                        <?php if(isset($_SESSION['username'])){
                            //tab that links to the users cart
                            if(str_contains($_SERVER['REQUEST_URI'],"index")) {
                                echo " <li class='menu-item'><a href='account/user/cart.php'>Cart</a></li>";
                            }else if(str_contains($_SERVER['REQUEST_URI'],"account")){
                                echo " <li class='menu-item'><a href='cart.php'>Cart</a></li>";
                            }else{ echo " <li class='menu-item'><a href='../../account/user/cart.php'>Cart</a></li>";
                            }
                        }?>

                        <?php
                        if(isset($_SESSION["admin"])) {
                            //admin has a special submenu to go to different lists
                            echo "<li class='menu-item'><a href=''>Admin</a>";
                            echo  "<ul class='submenu'>";
                            echo "<li class='menu-item submenu-item'><a href='/backstore/product-list.php'>Products</a></li>";
                            echo "<li class='menu-item submenu-item'><a href='/backstore/user-list.php'>Users</a></li>";
                            echo "<li class='menu-item submenu-item'><a href='/backstore/order-list.php'>Orders</a></li>";
                            echo "</ul>";
                            echo "</li>";
                            echo "<li class='hello'></li>";
                        }
                        if(isset($_SESSION["username"])) {
                            if(!str_contains($_SERVER['REQUEST_URI'],"/account/")){
                                //user settings such as loggin out.
                                echo "<li  class='menu-item'><a href='account/general/myAccount.php'>Hello " . $_SESSION["username"] . "</a></li>";
                                echo "<li class='menu-item'><a href='account/general/logout.php'> log out</a></li>";
                            }else{
                                echo "<li  class='menu-item' ><a href='myAccount.php'> Hello " . $_SESSION["username"] . "</a></li>";
                                echo "<li class='menu-item'><a href='account/general/logout.php'> log out</a></li>";

                            }


                        }else if (str_contains($_SERVER['REQUEST_URI'],"/account/")) {
                            //Tab that links to Login page
                            echo "<li class='menu-item'><a href='logIn.php'  > Login </a></li>";

                        }else if(str_contains($_SERVER['REQUEST_URI'],"/account/"))  echo "<li class='menu-item'><a href='account/general/logIn.php'  > Login </a></li>";
                        else  echo "<li class='menu-item'><a href='../../account/general/logIn.php'  > Login </a></li>";?>

                        <li><?php if (str_contains($_SERVER['REQUEST_URI'], "/products/")) {
                                echo '<li class="menu-item"><form method="post" action="../../products/Search-Result.php"></li>';
                            }else echo '<li class="menu-item"><form method="post" action="../../products/Search-Result.php"></li>';?>

                        //Displays search result
                        <li class="menu-item"><form method="post" action="../../products/Search-Result.php"></li>
                        <?php $search = isset($_POST['search']) ? $_POST['search'] : ''; ?>

                        <input style="height: 30px;width: 300px;margin-left: 30px" type="text" name="search" placeholder="Search for a product" value=<?php echo $search;?>>

                        </form>


                        </li>


                    </ul>
                </div>
            </nav>
        </div>
    </header>

<!--*****************************************User*********************************************************-->
<?php }else if (isset($_SESSION['username'])){
    //Connect to the database
    $db = mysqli_connect("localhost", "root", "321trewq", "amazin", "3306") or die ("fail");
    $username = $_SESSION['username'];
    $query = "select type from customers where username ='$username'";
    $result = mysqli_query($db,$query);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        $type = $row['type'];
    }


    if($type == "user"){                      ?>
        <header>
            <div class="nav-wrapper">
                <nav>
                    <div class="logo-wrapper">
                        <p id='logo'> <a href='../../../index.php'>AMAZIN</a></p>
                    </div>
                    <div class="menu-wrapper">
                        <ul class="menu">
                            <?php if(str_contains($_SERVER['REQUEST_URI'],"/products/")){
                                //links to the product landing page
                                echo' <li class="menu-item"><a href="product-landing.php"> Shop</a>';
                            }else if(str_contains($_SERVER['REQUEST_URI'],"index")){
                                echo ' <li class="menu-item"><a href="products/product-landing.php"> Shop</a>';
                            }else{
                                echo ' <li class="menu-item"><a href="../../products/product-landing.php"> Shop</a>';
                            }
                            ?>

                            <ul class="submenu">
                                <?php
                                //submenu for category
                                $aisles = ["jewelry", "tools", "electronics", "clothes"];
                                foreach ($aisles as $aisle) {
                                    $displayName = strtoupper(substr($aisle, 0, 1)) . substr($aisle, 1);
                                    if (str_contains($_SERVER['REQUEST_URI'], "/products/")) {
                                        echo '<li class="submenu-item"><a href="product-landing.php?aisle=' . $aisle . '">' . $displayName . '</a></li>';
                                    }else if(str_contains($_SERVER['REQUEST_URI'],"index")) {
                                        echo '<li class="submenu-item"><a href="products/product-landing.php?aisle=' . $aisle . '">' . $displayName . '</a></li>';
                                    }else
                                        echo '<li class="submenu-item"><a href="../../products/product-landing.php?aisle=' . $aisle . '">' . $displayName . '</a></li>';
                                }
                                ?>
                            </ul>
                            </li>
                            <?php
                            if(str_contains($_SERVER['REQUEST_URI'],"/account/") and !str_contains($_SERVER['REQUEST_URI'],"/user/")){
                            echo "<li class='menu-item'><a href='myAccount.php'>Account</a></li>";
                        }else if(str_contains($_SERVER['REQUEST_URI'],"index")){
                            echo "<li class='menu-item'><a href='account/general/myAccount.php'>Account</a></li>";
                        }else{
                            echo "<li class='menu-item'><a href='../../account/general/myAccount.php'>Account</a></li>";
                         } ?>

                            <?php if(isset($_SESSION['username'])){
                                //link to cart for when the user is logged in
                                if(str_contains($_SERVER['REQUEST_URI'],"index")) {
                                    echo " <li class='menu-item'><a href='account/user/cart.php'>Cart</a></li>";
                                }else if(str_contains($_SERVER['REQUEST_URI'],"account") and !str_contains($_SERVER['REQUEST_URI'],"/general/")){
                                    echo " <li class='menu-item'><a href='cart.php'>Cart</a></li>";
                                }else{ echo " <li class='menu-item'><a href='../../account/user/cart.php'>Cart</a></li>";
                                }
                            }?>
                            <?php if(isset($_SESSION['username'])){
                                if(str_contains($_SERVER['REQUEST_URI'],"index")) {
                                    //link to all the users orders
                                    echo " <li class='menu-item'><a href='account/user/myOrders.php'>My Orders</a></li>";
                                }else if(str_contains($_SERVER['REQUEST_URI'],"account") and !str_contains($_SERVER['REQUEST_URI'],"/general/")){
                                    echo " <li class='menu-item'><a href='myOrders.php'>My Orders</a></li>";
                                }else{ echo " <li class='menu-item'><a href='../../account/user/myOrders.php'>My Orders</a></li>";
                                }
                            }?>


                            <?php
                            if(isset($_SESSION["admin"])) {
                                //if the Admin is logged in
                                echo "<li class='menu-item'><a href=''>Admin</a>";
                                echo  "<ul class='submenu'>";
                                echo "<li class='menu-item submenu-item'><a href='/backstore/product-list.php'>Products</a></li>";
                                echo "<li class='menu-item submenu-item'><a href='/backstore/user-list.php'>Users</a></li>";
                                echo "<li class='menu-item submenu-item'><a href='/backstore/order-list.php'>Orders</a></li>";
                                echo "</ul>";
                                echo "</li>";
                                echo "<li class='hello'></li>";
                            }
                            if(isset($_SESSION["username"])) {
                                if(str_contains($_SERVER['REQUEST_URI'],"/account/"  and str_contains($_SERVER['REQUEST_URI'],"/general/"))){
                                    echo "<li  class='menu-item'><a href='account/general/myAccount.php'>Hello " . $_SESSION["username"] . "</a></li>";
                                    echo " <li class='menu-item'><a href='../../account/general/logout.php'> log out</a></li>";
                                }else{
                                    echo "<li  class='menu-item'><a href='../../../account/general/myAccount.php'> Hello " . $_SESSION["username"] . "</a></li>";
                                    echo "<li class='menu-item'><a href='../../../account/general/logout.php'> log out</a></li>";

                                }


                            }else if (str_contains($_SERVER['REQUEST_URI'],"/account/")) {
                                echo "<li class='menu-item'><a href='../account/logIn.php'  > Login </a></li>";

                            }else  echo "<li class='menu-item'><a href='../account/logIn.php'  > Login </a></li>";
                            ?>

                            <li><?php if (str_contains($_SERVER['REQUEST_URI'], "/products/")) {
                                    echo '<form method="post" action="Search-Result.php">';
                                }else echo '<li class="menu-item"><form method="post" action="Search-Result.php"></form></li>';?>


                            <li class="menu-item"><form method="post" action="Search-Result.php"></form></li>
                            <?php $search = isset($_POST['search']) ? $_POST['search'] : ''; ?>

                            <input style="height: 30px;width:
                                    300px;margin-left: 30px" type="text" name="search"
                                   placeholder="Search for a product" value=<?php echo $search;?>/>
                            </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <!--*****************************************Seller*********************************************************-->


    <?php }else if ($type == "seller"){?>

        <header>
            <div class="nav-wrapper">
                <nav>
                    <div class="logo-wrapper">
                        <p id='logo'> <a href='../../../../index.php'>AMAZIN</a></p>


                    </div>
                    <div class="menu-wrapper">
                        <ul class="menu">
                            <?php if(str_contains($_SERVER['REQUEST_URI'],"/products/")){
                                //links to a page with The products of the sellers
                                echo' <li class="menu-item"><a href="../../../account/seller/sellerMyProducts.php"> My Products</a>';
                            }else echo ' <li class="menu-item"><a href="../../../account/seller/sellerMyProducts.php"> My Products</a>'

                            ?>


                            </li>
                            <?php
                            if(!str_contains($_SERVER['REQUEST_URI'],"/account/")){
                                echo "<li class='menu-item'><a href='../../../account/general/myAccount.php'>Account</a></li>";
                            }else{ echo "<li class='menu-item'><a href='../../../account/general/myAccount.php'>Account</a></li>";}?>


                            <li class="menu-item"><a href="../../../account/seller/postItem.php">Post an item</a></li>
                            <?php
                            if(isset($_SESSION["admin"])) {
                                
                                echo "<li class='menu-item'><a href=''>Admin</a>";
                                echo  "<ul class='submenu'>";
                                echo "<li class='menu-item submenu-item'><a href='/backstore/product-list.php'>Products</a></li>";
                                echo "<li class='menu-item submenu-item'><a href='/backstore/user-list.php'>Users</a></li>";
                                echo "<li class='menu-item submenu-item'><a href='/backstore/order-list.php'>Orders</a></li>";
                                echo "</ul>";
                                echo "</li>";
                                echo "<li class='hello'></li>";
                            }
                            if(isset($_SESSION["username"])) {
                                if(!str_contains($_SERVER['REQUEST_URI'],"/account/")){
                                    echo "<li  class='menu-item'><a href='../../account/general/myAccount.php'>Hello " . $_SESSION["username"] . "</a></li>";
                                    echo " <li class='menu-item'><a href='../../account/general/logout.php'> log out</a></li>";
                                }else{
                                    echo "<li   class='menu-item'><a href='../../account/general/myAccount.php'> Hello " . $_SESSION["username"] . "</a></li>";
                                    echo " <li class='menu-item'><a href='../../account/general/logout.php'> log out</a></li>";

                                }


                            }else if (str_contains($_SERVER['REQUEST_URI'],"/account/")) {
                                echo "<li class='menu-item'><a href='../../../account/general/logIn.php'  > Login </a></li>";

                            }else  echo "<li class='menu-item'><a href='../../../account/general/logIn.php'  > Login </a></li>";
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--*****************************************Admin*********************************************************-->

    <?php }else {?>
        <header>
            <div class="nav-wrapper">
                <nav>
                    <div class="logo-wrapper">
                        <p id='logo'> <a href='../../../index.php'>AMAZIN</a></p>
                    </div>
                    <div class="menu-wrapper">
                        <ul class="menu">
                            <?php
                            if(!str_contains($_SERVER['REQUEST_URI'],"/account/")){
                                echo "<li class='menu-item'><a href='../../account/general/myAccount.php'>Account</a></li>";
                            }else{ echo "<li class='menu-item'><a href='../../account/general/myAccount.php'>Account</a></li>";}?>
                            <?php if(str_contains($_SERVER['REQUEST_URI'],"/products/")){

                                echo' <li class="menu-item"><a href="../../account/admin/adminUsers.php"> Users</a>';
                            }else echo ' <li class="menu-item"><a href="../../account/admin/adminUsers.php"> Users</a>'

                            ?>


                            <?php if(isset($_SESSION['username'])){
                                echo " <li class='menu-item'><a href='../../account/admin/adminSellers.php'>Sellers</a></li>";
                            }


                            ?>

                            <li class="menu-item"><a href="../../account/admin/adminProducts.php">Products</a></li>
                            <?php
                            if(isset($_SESSION["admin"])) {
                                echo "<li class='menu-item'><a href=''>Admin</a>";
                                echo  "<ul class='submenu'>";
                                echo "<li class='menu-item submenu-item'><a href='/backstore/product-list.php'>Products</a></li>";
                                echo "<li class='menu-item submenu-item'><a href='/backstore/user-list.php'>Users</a></li>";
                                echo "<li class='menu-item submenu-item'><a href='/backstore/order-list.php'>Orders</a></li>";
                                echo "</ul>";
                                echo "</li>";
                                echo "<li class='hello'></li>";
                            }
                            if(isset($_SESSION["username"])) {
                                if(!str_contains($_SERVER['REQUEST_URI'],"/account/")){
                                    echo "<li  class='menu-item'><a href='../../account/general/myAccount.php'>Hello " . $_SESSION["username"] . "</a></li>";
                                    echo " <li class='menu-item'><a href='../../account/general/logout.php'> log out</a></li>";
                                }else{
                                    echo "<li   class='menu-item'><a href='../../account/general/myAccount.php'> Hello " . $_SESSION["username"] . "</a></li>";
                                    echo " <li class='menu-item'><a href='../../account/general/logout.php'> log out</a></li>";

                                }


                            }else if (str_contains($_SERVER['REQUEST_URI'],"/account/")) {
                                echo "<li class='menu-item'><a href='../../account/general/logIn.php'  > Login </a></li>";

                            }else  echo "<li class='menu-item'><a href='../account/general/logIn.php'  > Login </a></li>";
                            ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

    <?php }
}
?>




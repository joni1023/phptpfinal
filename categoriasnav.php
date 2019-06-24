<?php
require 'database.php';
$result=mysqli_query($conexion,"SELECT DISTINCT categoria FROM item");
$resultdetails=mysqli_query($conexion,"SELECT DISTINCT categoria FROM item");
$counter = 1;
$counter2=1;
echo"
<div class='col-md-12'>
                <div class='section-title'>
                    <h3 class='title'>Nuevos productos</h3>
                    <div class='section-nav'>
                        <ul class='section-tab-nav tab-nav'>";
while ($row = mysqli_fetch_array($result)) {
    if($counter == 1) {
        echo"<li class='active'><a data-toggle='tab' href='#". $row['categoria'] ."'>". $row['categoria'] . "</a></li>";
    }
    else
    {
        echo"<li><a data-toggle='tab' href='#". $row['categoria'] ."'>". $row['categoria'] ."</a></li>";
    }
    ++$counter;
}
echo"</ul></div></div></div>";
echo"            <div class='col-md-12'>
                <div class='row'>
                    <div class='products-tabs'>";

while ($rowdetail = mysqli_fetch_array($resultdetails)) {
    if($counter2 == 1) {
        echo"<div id='". $rowdetail['categoria'] ."' class='tab-pane active'> <div class='products-slick' data-nav='#slick-nav-".$counter2."'>";
        $products=mysqli_query($conexion,"SELECT * FROM item WHERE categoria='". $rowdetail['categoria'] ."'");
        while ($row = mysqli_fetch_array($products)) {
            echo "
        <div class='product'>
                                    <div class='product-img'>
                                        <img src='./img/product01.png' alt=''>
                                        <div class='product-label'>
                                            <span class='sale'>-30%</span>
                                            <span class='new'>NEW</span>
                                        </div>
                                    </div>
                                    <div class='product-body'>
                                        <p class='product-category'>Category</p>
                                        <h3 class='product-name'><a href='#'>product name goes here</a></h3>
                                        <h4 class='product-price'>$980.00 <del class='product-old-price'>$990.00</del></h4>
                                        <div class='product-rating'>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>
                                        </div>
                                        <div class='product-btns'>
                                            <button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
                                            <button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
                                            <button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
                                        </div>
                                    </div>
                                    <div class='add-to-cart'>
                                        <button class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> add to cart</button>
                                    </div>
                                </div>
        ";
        }
        echo"</div><div id='slick-nav-".$counter2."' class='products-slick-nav'></div></div>";
    }
    else
    {
        echo"<div id='". $rowdetail['categoria'] ."' class='tab-pane'> <div class='products-slick' data-nav='#slick-nav-".$counter2."'>";
        /*$products=mysqli_query($conexion,"SELECT * FROM item WHERE categoria='". $rowdetail['categoria'] ."'");
        while ($row = mysqli_fetch_array($products)) {
            echo "
        <div class='product'>
                                    <div class='product-img'>
                                        <img src='./img/product01.png' alt=''>
                                        <div class='product-label'>
                                            <span class='sale'>-30%</span>
                                            <span class='new'>NEW</span>
                                        </div>
                                    </div>
                                    <div class='product-body'>
                                        <p class='product-category'>Category</p>
                                        <h3 class='product-name'><a href='#'>product name goes here</a></h3>
                                        <h4 class='product-price'>$980.00 <del class='product-old-price'>$990.00</del></h4>
                                        <div class='product-rating'>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>
                                        </div>
                                        <div class='product-btns'>
                                            <button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
                                            <button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
                                            <button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
                                        </div>
                                    </div>
                                    <div class='add-to-cart'>
                                        <button class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> add to cart</button>
                                    </div>
                                </div>
        ";
        }
        echo"</div><div id='slick-nav-".$counter2."' class='products-slick-nav'></div></div>";*/
    }
    ++$counter2;
}
echo"</div></div></div>";
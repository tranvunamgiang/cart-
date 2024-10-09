<?php 
    session_start();
    $cart = isset($_SESSION["cart"])?$_SESSION["cart"]:[];
    require_once("./functions/dbp.php");
    $categories = select("select * from categories");
?>
<head>
    <meta charset="utf-8">
    <title>Bronx Luggage</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/home.css" rel="stylesheet">
</head>

<!-- Header -->

<header class="header trans_300">


<!-- Main Navigation -->

<div class="main_nav_container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-right">
                <div class="logo_container">
                    <a href="index.php">Bronx<span>Luggage</span></a>
                </div>
                <nav class="navbar">
                    <ul class="navbar_menu">
                        <li><a href="#">shop</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">blog</a></li>
                        <li><a href="contact.html">contact</a></li>
                        <?php foreach($categories as $item):?>
                        <li class="nav-item">
                        <a class="nav-link" href="/category.php?id=<?php echo $item["id"];?>"><?php echo $item["NAME"];?></a>
                        </li>
                         <?php endforeach;?>
                    </ul>
                    <ul class="navbar_user">
                        <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                        <li class="checkout">
                            <a href="cartpro.php">
                                <span><i class="fa fa-shopping-cart" aria-hidden="true"><?php echo count($cart);?></i></span>
                                <span id="checkout_items" class="checkout_items">2</span>
                            </a>
                        </li>
                    </ul>
                    
                </nav>
            </div>
        </div>
    </div>
</div>

</header>



    <!-- Navbar End -->
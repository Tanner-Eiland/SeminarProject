<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <section id="header">
        <!-- <a href=".?action=home_page"><img src="img/new/image10.jpg" class="logo" alt=""></a> -->
        <h2> <?php $loggedin ?></h2>
        <form method="." method="post" id="message_form" class="message_form" >

            <input type="hidden" name="action" value="search_shop">
            <label for="search"><b></b></label>

            <input type="text" placeholder="Search" name="search">
            <button class="normal">Search</button>
        </form>
        <div>
            <ul id="navbar">
                <li><a <?php if (($action == 'home_page')){ ?>class="active" <?php } ?> href=".?action=home_page">Home</a></li>
                <li><a <?php if (($action == 'shop_page')){ ?>class="active" <?php } ?> href=".?action=shop_page">Shop</a></li>
                <!--
                <li><a <?php if (($action == 'blog_page')){ ?>class="active" <?php } ?> href=".?action=blog_page">Blog</a></li>
                -->
                <li><a <?php if (($action == 'about_page')){ ?>class="active" <?php } ?> href=".?action=about_page">About</a></li>
                <li><a <?php if (($action == 'contact_page')){ ?>class="active" <?php } ?> href=".?action=contact_page">Contact</a></li>
                <li><?php if((!$_SESSION['uname'])) { ?>
                        <a <?php if (($action == 'login_page')){ ?>class="active" <?php } ?> href=".?action=login_page">Login/Signup</a>
                    <?php } else { ?> <a <?php if (($action == 'profile_page')){ ?>class="active" <?php } ?> href=".?action=logout_home_page">Hello, <?= $loggedin[0]['fname'] ?></a> <?php } ?>  </li>
                <li id="lg-bag"><a <?php if (($action == 'cart_page')){ ?>class="active" <?php } ?> href=".?action=cart_page"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>
                <a href="#" id="close"><i class="fa fa-times" aria-hidden="true"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href=".?action=cart_page"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
            <i id="bar" class="fas fa-outdent"></i></a>
        </div>
    </section>

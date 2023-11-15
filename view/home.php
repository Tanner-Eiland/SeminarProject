<?php include("view/header.php") ?>

    <section id="hero">
        <h4>Trade-in-offer</h4>
        <h2>Super value deal</h2>
        <h1>On all products</h1>
        <p>Save more with coupons & up to 70% off!</p>
        <button onclick="location.href = '.?action=shop_page';">Shop Now</button>
    </section>
<!--
    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="img/features/f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f2.png" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f4.png" alt="">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f5.png" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f6.png" alt="">
            <h6>24/7 Support</h6>
        </div>
    </section>
-->

<section id="product1" class="section-p1">
        <h2>New Arivals</h2>
        <p>Summer Collection New Modern Design</p>
        <div class="pro-container">
        <?php if($newinv) { ?>
            <?php foreach ($newinv as $inv) : ?>
                
                <div class="pro">
                <a href=".?action=sproduct_page&sproduct_id=<?=$inv['ID']?>">
                    <div class="list__row">
                        <div class="list__item">
                                <img src="<?= $inv['image'] ?>" alt="<?= $inv['name'] ?>">
                                <div class="des">
                                    <span><?= $inv['producer'] ?></span>
                                    <h5><?= $inv['name'] ?></h5>
                                    <div class="star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4>$<?= $inv['price'] ?></h4>
                                </div>
                            </div>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        <?php } else { ?>
            <br>
            <?php if (!$inventory) { ?>
                <h4> There are no items that meet these specifications. </h4>
            <?php } else { ?>
                <h4> No items exist yet. </h4>
            <?php } } ?>
            
        </div>
        </div>
    </section>




    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Modern Design</p>

        <div class="pro-container">
        <?php if($inventory) { ?>
            <?php foreach ($inventory as $inv) : ?>
                
                <div class="pro">
                <a href=".?action=sproduct_page&sproduct_id=<?=$inv['ID']?>">
                    <div class="list__row">
                        <div class="list__item">
                                <img src="<?= $inv['image'] ?>" alt="<?= $inv['name'] ?>">
                                <div class="des">
                                    <span><?= $inv['producer'] ?></span>
                                    <h5><?= $inv['name'] ?></h5>
                                    <div class="star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4>$<?= $inv['price'] ?></h4>
                                </div>
                            </div>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        <?php } else { ?>
            <br>
            <?php if (!$inventory) { ?>
                <h4> There are no items that meet these specifications. </h4>
            <?php } else { ?>
                <h4> No items exist yet. </h4>
            <?php } } ?>
            
        </div>
    </section>
<!--
    <section id="banner" class="section-m1">
        <h4>Repair Service</h4>
        <h2>Up to <span>70% off</span> -- All t-Shirts & Accessories</h2>
        <button class="normal"> Explore More</button>

    </section>
            -->
    
<!--
    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>crazy deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>The best classic dress is on sale at cara</span>
            <button class="white">Learn More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>spring/summer</h4>
            <h2>upcomming season</h2>
            <span>The best classic dress is on sale at cara</span>
            <button class="white">Collection</button>
        </div>
    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>SEASONAL SALE</h2>
            <h3>WINTER COLLECTION -50% OFF</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>NEW FOOTWEAR COLLECTION</h2>
            <h3>Spring / Summer 2023</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>T-SHIRTS</h2>
            <h3>New Trendy Prints</h3>
        </div>
    </section>

    <section id="newsletter" class="section-p1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest show and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>
            -->
    <?php include("view/footer.php") ?>
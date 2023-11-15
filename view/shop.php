<?php include("view/header.php") ?>


    <section id="page-header">
        
        <h2>#stayhome</h2>
        
        <p>Save more with coupons & up to 70% off!</p>
        
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
        </div>
    </section>
<!--
    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
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
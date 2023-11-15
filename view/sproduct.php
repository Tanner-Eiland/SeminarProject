<?php include("view/header.php") ?>


    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="<?= $item[0]['image'] ?>"  width="100%" id="MainImg" alt="">
            
            <div class="small-img-group">
            <!--
                <div class="small-img-col">
                    <img src="img/products/f1.jpg" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="img/products/f2.jpg" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="img/products/f3.jpg" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="img/products/f4.jpg" width="100%" class="small-img" alt="">
                </div>
            -->
            </div>
            
        </div>

        <div class="single-pro-details">
            <h6><?= $item[0]['producer'] ?></h6>
            <h4><?= $item[0]['name'] ?></h4>
            <form action ="." method="get" id= "list_header_select" class="list__header__select">
                <input type="hidden" name ="action" value="sproduct_add_to_cart">
                <input type="hidden" name ="sproduct_id" value="<?= $item[0]["ID"] ?>">
                
                <select name='size'>
                    <title> Select Quality </title>
                    <?php foreach ($quans as $quan) :?>
                        <option <?php if($quan['quantity'] == 0) {?> style="color:red;" <?php } ?> value="<?=$quan['size']?>">
                        <?=$quan['size']?> <?php if($quan['quantity'] == 0) {?>- Out of Stock <?php }else{ ?> 
                         - $<?=$quan['price']?> - <?=$quan['quantity']?> Left in Stock <?php } ?>
                        </option>
                    <?php endforeach; ?>
                
                </select>
                <input name="quantity" type="number" value="1">
                <button class="normal" >Add To Cart</button>
            </form>
            <h4>Product Details</h4>
            <span>
                <?= $item[0]['description'] ?>
            </span>
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
        

    <?php include("view/footer.php") ?>
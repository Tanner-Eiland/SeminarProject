
<?php include("view/header.php") ?>




    <section id = "list" class = "list">
        <header>
            <h1> Vehicle List</h1>
            <form action ="." method="get" id= "list_header_select" class="list__header__select">
                <input type="hidden" name ="action" value="customer_page">
                <select name="make_id" required>
                <option value=NULL>View All Makes</option>
                <?php foreach ($makes as $make) : ?>
                    <?php if ($vehicle_make_id == $make['make_id']) { ?>
                        <option value="<?= $make['make_id'] ?>" selected>
                        <?php } else { ?>
                        <option value="<?= $make['make_id'] ?>">
                        <?php } ?>
                        <?= $make['make'] ?>
                        </option>
                <?php endforeach; ?>
                </select>

                <select name="type_id" required>
                <option value=NULL>View All Types</option>
                <?php foreach ($types as $type) : ?>
                    <?php if ($vehicle_type_id == $type['type_id']) { ?>
                        <option value="<?= $type['type_id'] ?>" selected>
                        <?php } else { ?>
                        <option value="<?= $type['type_id'] ?>">
                        <?php } ?>
                        <?= $type['type'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <select name="class_id" required>
                    <option value=NULL>View All Classes</option>
                <?php foreach ($classes as $class) : ?>
                    <?php if ($vehicle_class_id == $class['class_id']) { ?>
                        <option value="<?= $class['class_id'] ?>" selected>
                        <?php } else { ?>
                        <option value="<?= $class['class_id'] ?>">
                        <?php } ?>
                        <?= $class['class'] ?>
                        </option>
                <?php endforeach; ?>
                </select>
                <br>
                <br>
                <label>Sort by: </label>
                <select name="vehicleSortBy" required>
                <option value="vehicles.price">Price</option>
                <option value="vehicles.year">Year</option>
                </select>
                <button class="add-button bold">Go</button>
            </form>
        </header>
        <?php if($vehiclesBy) { ?>
            <?php foreach ($vehiclesBy as $vehicle ) : ?>
                <div class="list__row">
                    <div class="list__item">
                        <p> 
                            <?= $vehicle['year'] ?>, <?= $vehicle['model'] ?>, <?= $vehicle['price'] ?>, 
                            <?= $vehicle['make'] ?>, <?= $vehicle['type'] ?>, <?= $vehicle['class'] ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php } else { ?>
            <br>
            <?php if (!$vehiclesBy) { ?>
                <p> No vehiles exist with these specifications </p>
            <?php } else { ?>
                <p> No vehicles exist yet. </p>
            <?php } ?>
            <br>
            <?php } ?>
    </section>
    <?php include('view/customer_footer.php'); ?>
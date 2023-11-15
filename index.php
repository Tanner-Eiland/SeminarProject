<?php 
require('model/database.php');
require('model/vehicle_db.php');
require('model/class_db.php');
require('model/inventory_db.php');
require('model/type_db.php');
require('model/customer_db.php');
require('model/cart_db.php');

session_start();

$inventory_ID = filter_input(INPUT_POST, 'ID', FILTER_VALIDATE_INT);
$inventory_name = filter_input(INPUT_POST, 'name', FILTER_UNSAFE_RAW);
$inventory_price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$inventory_description = filter_input(INPUT_POST, 'description', FILTER_UNSAFE_RAW);
$inventory_image = filter_input(INPUT_POST, 'image', FILTER_UNSAFE_RAW);
$owner_id = filter_input(INPUT_POST, 'owner_id', FILTER_VALIDATE_INT);


$quantity = filter_input(INPUT_POST, 'quantity', FILTER_UNSAFE_RAW);
if(!$quantity) {
    $quantity = filter_input(INPUT_GET, 'quantity', FILTER_UNSAFE_RAW);
};

$size = filter_input(INPUT_POST, 'size', FILTER_UNSAFE_RAW);
if(!$size) {
    $size = filter_input(INPUT_GET, 'size', FILTER_UNSAFE_RAW);
};




$loggin_failed = filter_input(INPUT_POST, 'loggin_failed', FILTER_UNSAFE_RAW);
if (!$loggin_failed) {
    $loggin_failed = filter_input(INPUT_GET, 'loggin_failed', FILTER_UNSAFE_RAW);
};

$match_failed = filter_input(INPUT_POST, 'match_failed', FILTER_UNSAFE_RAW);
if (!$match_failed) {
    $match_failed = filter_input(INPUT_GET, 'match_failed', FILTER_UNSAFE_RAW);
};

$signup_failed = filter_input(INPUT_POST, 'signup_failed', FILTER_UNSAFE_RAW);
if (!$signup_failed) {
    $signup_failed = filter_input(INPUT_GET, 'signup_failed', FILTER_UNSAFE_RAW);
};

$check_failed = filter_input(INPUT_POST, 'check_failed', FILTER_UNSAFE_RAW);
if (!$check_failed) {
    $check_failed = filter_input(INPUT_GET, 'check_failed', FILTER_UNSAFE_RAW);
};




$names = filter_input(INPUT_GET, 'name', FILTER_UNSAFE_RAW);
if (!$names) {
    filter_input(INPUT_GET, 'name', FILTER_UNSAFE_RAW);
};

$subjects = filter_input(INPUT_GET, 'subject', FILTER_UNSAFE_RAW);
if (!$subjects) {
    filter_input(INPUT_GET, 'subject', FILTER_UNSAFE_RAW);
};

$messages = filter_input(INPUT_GET, 'message', FILTER_UNSAFE_RAW);
if (!$messages) {
    filter_input(INPUT_GET, 'message', FILTER_UNSAFE_RAW);
};

$message_email = filter_input(INPUT_GET, 'message_email', FILTER_UNSAFE_RAW);
if (!$message_email) {
    filter_input(INPUT_GET, 'message_email', FILTER_UNSAFE_RAW);
};






$uname = filter_input(INPUT_POST, 'uname', FILTER_UNSAFE_RAW);
if (!$uname) {
    filter_input(INPUT_GET, 'uname', FILTER_UNSAFE_RAW);
};

$fname = filter_input(INPUT_POST, 'fname', FILTER_UNSAFE_RAW);
if (!$fname) {
    filter_input(INPUT_GET, 'fname', FILTER_UNSAFE_RAW);
};

$lname = filter_input(INPUT_POST, 'lname', FILTER_UNSAFE_RAW);
if (!$lname) {
    filter_input(INPUT_GET, 'lname', FILTER_UNSAFE_RAW);
};

$email = filter_input(INPUT_POST, 'email', FILTER_UNSAFE_RAW);
if (!$email) {
    filter_input(INPUT_GET, 'email', FILTER_UNSAFE_RAW);
};

$phone = filter_input(INPUT_POST, 'phone', FILTER_UNSAFE_RAW);
if (!$phone) {
    filter_input(INPUT_GET, 'phone', FILTER_UNSAFE_RAW);
};

$password = filter_input(INPUT_POST, 'psd', FILTER_UNSAFE_RAW);
if (!$password) {
    filter_input(INPUT_GET, 'psd', FILTER_UNSAFE_RAW);
};

$rep_password = filter_input(INPUT_POST, 'psd-repeat', FILTER_UNSAFE_RAW);
if (!$rep_password) {
    filter_input(INPUT_GET, 'psd-repeat', FILTER_UNSAFE_RAW);
};

$hashed_password = password_hash($password, PASSWORD_DEFAULT);



$specific_product_id = filter_input(INPUT_POST, 'sproduct_id', FILTER_UNSAFE_RAW);
if(!$specific_product_id) {
    $specific_product_id = filter_input(INPUT_GET, 'sproduct_id', FILTER_UNSAFE_RAW);
};


$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = 'home_page';
    };
};

/* set up session data (isloggedin and temperary cart) */
if(!$_SESSION){
    $_SESSION['uname'] = '';
    $_SESSION['cart'] = array();
}


if(!$uname) {
    $customer;

} else { 
    $customer = one_customer($uname);
};

if (!$_SESSION['uname']) {
    $loggedin;
} else {
    $loggedin = one_customer($_SESSION['uname']);
};



switch ($action) {
    case "home_page":
        $inventory = get_featured_items();
        $newinv = get_newest_items();

        include('view/home.php');
        break;
    case "shop_page":
        $inventory = get_all_inventory();
        include('view/shop.php');
        break;
    case "blog_page":
        include('view/blog.php');
        break;
    case "about_page":
        include('view/about.php');
        break;
    case "contact_page":
        include('view/contact.php');
        break;
    
    case "loggedin_home_page":
            $loggin_failed = false;
            if(count($customer) == 1){
                if(password_verify($password, $customer[0]['password'])){
                    $_SESSION['uname'] = $uname;

                    /* add all items in temperary cart to profile cart */
                    /*
                    foreach ($_SESSION['cart'] as $item) {
                        if ($item = array(tuple('',''))){
                        }
                        else {
                            add_item_to_cart($_SESSION['uname'], $item[0], $item[1]);
                        }
                    }
                    */
                    /* continue login */
                    $loggedin = one_customer($_SESSION['uname']);
                    $inventory = get_featured_items();
                    $newinv = get_newest_items();
                    include('view/home.php');
                } else {
                    $loggin_failed = true;
                    include('view/login.php');
                };
            } else {
                $loggin_failed = true;
                include('view/login.php');
            };
            break;

    case "login_page":
        include('view/login.php');
        break;
    case "account_created_page":
        $signup_failed = false;
        $match_failed = false;
        if ($password !== $rep_password){
            $match_failed = true;
            session_unset();
            include('view/login.php');

        } else {

            try {
                new_customer($uname, $hashed_password, $email, $phone, $fname, $lname);
                $_SESSION['uname'] = $uname;
                $loggedin = one_customer($_SESSION['uname']);
                include('view/created.php');
            }
            catch (Exception $e) {
                $signup_failed = true;
                session_unset();
                include('view/login.php');
            
            };
        };
        break;

    case "logout_home_page":
        $inventory = get_featured_items();
        $newinv = get_newest_items();
        session_unset();
        $_SESSION['uname'] = '';
        include("view/home.php");
        break;

    case "message_home_page":
        $inventory = get_featured_items();
        $newinv = get_newest_items();
        insert_message($names, $message_email, $subjects, $messages);
        include("view/home.php");
        break;
    case "cart_page":
        $items = get_users_cart($_SESSION['uname']);
        $inventory = get_all_inventory();
        $check_failed = false;

        /* doublecheck inventory */
        foreach ($items as $item) :
                /* fix this to call the inventory_quantity ID, not the inventory ID and size later */
            $check = check_inventory($item['item_id'], $item['quantity'], $item['size']);
            if (!$check) {
                $check_failed = true;
                delete_cart_item($item['ID']);
            };
        endforeach;
        /* update items in case some got deleted while checking */
        $items = get_users_cart($_SESSION['uname']);

        include('view/cart.php');
        break;
    case "remove_from_cart":
        delete_cart_item($specific_product_id);
        $items = get_users_cart($_SESSION['uname']);
        $inventory = get_all_inventory();
        include('view/cart.php');
        break;

    case "sproduct_page":
        $item = get_one_item($specific_product_id);
        $quans = inv_quantity($specific_product_id);
        $inventory = get_shop_featured_items();
        include('view/sproduct.php');
        break;

    case "sproduct_add_to_cart":
        $item = get_one_item($specific_product_id);
        $quans = inv_quantity($specific_product_id);
        $inventory = get_shop_featured_items();
        add_item_size_to_cart($_SESSION['uname'], $specific_product_id, $size, $quantity);
        include('view/sproduct.php');
        break;
    
    case "checkout":
        $items = get_users_cart($_SESSION['uname']);
        $inventory = get_all_inventory();
        $newinv = get_newest_items();
        $check_failed = false;

        /* doublecheck inventory */
        foreach ($items as $item) :
                /* fix this to call the inventory_quantity ID, not the inventory ID and size later */
            $check = check_inventory($item['item_id'], $item['quantity'], $item['size']);
            if (!$check) {
                $check_failed = true;
                delete_cart_item($item['ID']);
            };
        endforeach;
        /* update items in case some got deleted while checking */
        $items = get_users_cart($_SESSION['uname']);

        include('view/checkout.php');
        break;
    case "ordered":
        $items = get_users_cart($_SESSION['uname']);
        $inventory = get_all_inventory();
        $newinv = get_newest_items();
        $check_failed = false;

        /* doublecheck inventory */
        foreach ($items as $item) :
                /* fix this to call the inventory_quantity ID, not the inventory ID and size later */
            $check = check_inventory($item['item_id'], $item['quantity'], $item['size']);
            if (!$check) {
                /* Goto checkout instead*/
                $items = get_users_cart($_SESSION['uname']);
                $inventory = get_featured_items();
                $newinv = get_newest_items();
                $check_failed = false;
        
                /* doublecheck inventory */
                foreach ($items as $item) :
                        /* fix this to call the inventory_quantity ID, not the inventory ID and size later */
                    $check = check_inventory($item['item_id'], $item['quantity'], $item['size']);
                    if (!$check) {
                        $check_failed = true;
                        delete_cart_item($item['ID']);
                    };
                endforeach;
                /* update items in case some got deleted while checking */
                $items = get_users_cart($_SESSION['uname']);
        
                include('view/checkout.php');
                break 2;
                
            };
        endforeach;
        
        /* make an order of the current cart, then update the inventory, then delete the cart, */
        new_order($_SESSION['uname']);
        $order = get_newest_order_by_uname($_SESSION['uname']);

        foreach ($items as $item):
            $inv_quan = get_inv_quan_of_item($item['item_id'], $item['size']);
            add_item_to_order($_SESSION['uname'], $item['item_id'], $order[0]['ID'], $item['size'], $item['quantity']);
            remove_items_from_inventory($item['item_id'], trim($item['size']), $item['quantity'], $inv_quan[0]['quantity']);
            delete_cart_item($item['ID']);
        endforeach;

        include('view/home.php');

        break;
    case "test":
        delete_type("test");
        break;
    default:
        $vehiclesBy = get_vehicles_by_make_type_class($vehicle_make_id, $vehicle_type_id, $vehicle_class_id, $vehicleSortBy);
        $makes = get_all_makes();
        $types = get_all_types();
        $classes = get_all_classes();
        include('view/customer_page.php');
}
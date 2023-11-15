<?php

function add_item_to_cart($user, $item, $quan){
    global $db;



    $query = 'INSERT (uname, item_id, quantity) INTO cart VALUES (:user, :item, :quantity)';
    $statement = $db->prepare($query);
    $statement->bindvalue(':user', $user);
    $statement->bindvalue(':item', $item);
    $statement->bindvalue(':quantity', $quan);
    $statement->execute();
    $statement->closeCursor();
};

function add_item_size_to_cart($user, $item, $size, $quan){
    global $db;

    $query = 'INSERT INTO cart (uname, item_id, size, quantity) VALUES (:user, :item, :size, :quantity)';
    $statement = $db->prepare($query);
    $statement->bindvalue(':user', $user);
    $statement->bindvalue(':item', $item);
    $statement->bindvalue(':size', $size);
    $statement->bindvalue(':quantity', $quan);
    $statement->execute();
    $statement->closeCursor();
};

function get_users_cart($uname){
    global $db;

    $query = 'SELECT * FROM cart WHERE uname = :uname';
    $statement = $db->prepare($query);
    $statement->bindvalue(':uname', $uname);
    $statement->execute();
    $cart = $statement->fetchAll();
    $statement->closeCursor();
    return $cart;
};

function delete_cart_item($item_id){
    global $db;

    $query = 'DELETE FROM cart WHERE ID = :id';
    $statement = $db->prepare($query);
    $statement->bindvalue(':id', $item_id);
    $statement->execute();
    $statement->closeCursor();
};



function add_item_to_order($uname, $item_id, $order_id, $size, $quantity){
    global $db;

    $query = 'INSERT INTO order_items (`ID`, `uname`, `order_id`, `item_id`, `size`, `quantity`) VALUES (NULL, :uname , :order_id , :item_id , :size , :quan)';
    $statement = $db->prepare($query);
    $statement->bindvalue(':uname', $uname);
    $statement->bindvalue(':order_id', $order_id);
    $statement->bindvalue(':item_id', $item_id);
    $statement->bindvalue(':size', $size);
    $statement->bindvalue(':quan', $quantity);
    $statement->execute();
    $statement->closeCursor();
};

function new_order($uname){
    global $db;
    $items = get_users_cart($uname);

    $query = 'INSERT INTO orders (ID, uname) VALUES (NULL, :uname)';
    $statement = $db->prepare($query);
    $statement->bindvalue(':uname', $uname);
    $statement->execute();
    $statement->closeCursor();
};

function get_newest_order_by_uname($uname){
    global $db;

    $query = 'SELECT * FROM orders WHERE uname = :uname ORDER BY ID DESC LIMIT 1';
    $statement = $db->prepare($query);
    $statement->bindvalue(':uname', $uname);
    $statement->execute();
    $cart = $statement->fetchAll();
    $statement->closeCursor();
    return $cart;
}

function remove_items_from_inventory($item_id, $size, $buy_quan, $inv_quan){
    global $db;

    $query = 'UPDATE inventory_quantity SET quantity = (:inv_quan - :buy_quan) WHERE inv_id = :item_id AND size = :size';

    $statement = $db->prepare($query);
    $statement->bindvalue(':item_id', $item_id);
    $statement->bindvalue(':size', $size);
    $statement->bindvalue(':buy_quan', $buy_quan);
    $statement->bindvalue(':inv_quan', $inv_quan);
    $statement->execute();
    $statement->closeCursor();

}
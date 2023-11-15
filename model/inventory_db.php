<?php

function get_all_inventory(){
    global $db;
    $query = 'SELECT * FROM inventory';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function get_newest_items(){
    global $db;
    $query = 'SELECT * FROM inventory ORDER BY ID DESC LIMIT 8';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function get_featured_items(){
    global $db;
    $query = 'SELECT * FROM inventory ORDER BY ID ASC LIMIT 8';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function get_shop_featured_items(){
    global $db;
    $query = 'SELECT * FROM inventory ORDER BY ID DESC LIMIT 4';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function get_one_item($ID){
    global $db;
    $query = 'SELECT * FROM inventory WHERE ID = :id';
    $statement = $db->prepare($query);
    $statement->bindvalue(':id', $ID);
    $statement->execute();
    $inventory = $statement->fetchAll();
    $statement->closeCursor();
    return $inventory;
}

function inv_quantity($ID){
    global $db;
    $query = 'SELECT * FROM inventory_quantity WHERE inv_id = :id';
    $statement = $db->prepare($query);
    $statement->bindvalue(':id', $ID);
    $statement->execute();
    $inventory = $statement->fetchAll();
    $statement->closeCursor();
    return $inventory;
}

function check_inventory($ID, $quantity, $size){
    global $db;
    $query = 'SELECT * FROM `inventory_quantity` WHERE `inv_id` = :id AND `size` = :size AND `quantity` >= :quan';
    $statement = $db->prepare($query);
    $statement->bindvalue(':id', $ID);
    $statement->bindvalue(':quan', $quantity);
    $statement->bindvalue(':size', $size);
    $statement->execute();
    $inventory = $statement->fetchAll();
    $statement->closeCursor();
    return $inventory;
}

function get_inv_quan_of_item($item_id, $size){
    global $db;
    $query = 'SELECT quantity FROM inventory_quantity WHERE inv_id = :item_id AND size = :size';
    $statement = $db->prepare($query);
    $statement->bindvalue(':item_id', $item_id);
    $statement->bindvalue(':size', $size);
    $statement->execute();
    $inventory = $statement->fetchAll();
    $statement->closeCursor();
    return $inventory;
}
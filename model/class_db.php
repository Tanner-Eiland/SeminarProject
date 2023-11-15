<?php

function get_all_classes(){
    global $db;
    $query = 'SELECT * FROM class ORDER BY class_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $class = $statement->fetchAll();
    $statement->closeCursor();
    return $class;
}

function add_class($vehicle_class){
    global $db;
    $query = 'INSERT INTO class (class) VALUES (:class)';
    $statement = $db->prepare($query);
    $statement->bindvalue(':class', $vehicle_class);
    $statement->execute();
    $statement->closeCursor();
}

function delete_class($vehicle_class){
    global $db;
    $query = 'DELETE FROM class WHERE class_id = :class';
    $statement = $db->prepare($query);
    $statement->bindvalue(':class', $vehicle_class);
    $statement->execute();
    $statement->closeCursor();
}

function class_id_used($vehicle_class_id){
    global $db;
    $query = 'SELECT * FROM vehicles WHERE class_id = :class_id';
    $statement = $db->prepare($query);
    $statement->bindvalue(':class_id', $vehicle_class_id);
    $statement->execute();
    $isUsed = $statement->fetchAll();
    $statement->closeCursor();
    return $isUsed;
}
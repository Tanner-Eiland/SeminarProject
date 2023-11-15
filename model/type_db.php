<?php
function get_all_types(){
    global $db;
    $query = 'SELECT * FROM type ORDER BY type_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
}

function add_type($vehicle_type){
    global $db;
    $query = 'INSERT INTO type (type) VALUES (:type)';
    $statement = $db->prepare($query);
    $statement->bindvalue(':type', $vehicle_type);
    $statement->execute();
    $statement->closeCursor();
}

function delete_type($vehicle_type){
    global $db;
    $query = 'DELETE FROM type WHERE type_id = :type';
    $statement = $db->prepare($query);
    $statement->bindvalue(':type', $vehicle_type);
    $statement->execute();
    $statement->closeCursor();
}

function type_id_used($vehicle_type_id){
    global $db;
    $query = 'SELECT * FROM vehicles WHERE type_id = :type_id';
    $statement = $db->prepare($query);
    $statement->bindvalue(':type_id', $vehicle_type_id);
    $statement->execute();
    $isUsed = $statement->fetchAll();
    $statement->closeCursor();
    return $isUsed;
}
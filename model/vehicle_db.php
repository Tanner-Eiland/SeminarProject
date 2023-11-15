<?php
function get_vehicles($sort_by){
    global $db;
    $query = 'SELECT *
                FROM vehicles ORDER BY :sortBy';
    $statement = $db->prepare($query);
    $statement->bindvalue(':sortBy', $sort_by);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}


Function get_vehicle_make($vehicle_id){
    global $db;
    $query = 'SELECT make.make FROM vehicles 
                INNER JOIN make ON vehicles.make_id = make.make_id
                WHERE vehicles.ID = :vehicleID';
    $statement = $db->prepare($query);
    $statement->bindvalue(':vehicleID', $vehicle_id);
    $statement->execute();
    $make = $statement->fetchAll();
    $statement->closeCursor();
    return $make;
}

function delete_vehicle_by_ID($vehicle_id){
    global $db;
    $query = 'DELETE FROM vehicles WHERE ID = :vehicleID';
    $statement = $db->prepare($query);
    $statement->bindvalue(':vehicleID', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_vehicle($year, $model, $price, $make, $type, $class ){
    global $db;
    $query = 'INSERT INTO vehicles( year, model, price, make_id, type_id, class_id) VALUES (:year, :model, :price, :make, :type, :class)';
    $statement = $db->prepare($query);
    $statement->bindvalue(':year', $year);
    $statement->bindvalue(':model', $model);
    $statement->bindvalue(':price', $price);
    $statement->bindvalue(':class', $class);
    $statement->bindvalue(':make', $make);
    $statement->bindvalue(':type', $type);
    $statement->execute();
    $statement->closeCursor();
}



function get_vehicles_by_make_type_class($vehicle_make_id, $vehicle_type_id, $vehicle_class_id, $vehicleSortBy) {
    global $db;
    if ($vehicleSortBy == "vehicles.price" || !$vehicleSortBy){
    if ($vehicle_make_id && $vehicle_type_id && $vehicle_class_id){
            $query = 'SELECT * 
                       FROM vehicles INNER JOIN type ON vehicles.type_id = type.type_id
                        INNER JOIN class ON vehicles.class_id = class.class_id
                        INNER JOIN make ON vehicles.make_id = make.make_id
                        WHERE vehicles.make_id = :vehicleMake AND vehicles.type_id = :vehicleType AND vehicles.class_id = :vehicleClass
                        ORDER BY vehicles.price' ;
        } else if ($vehicle_make_id && $vehicle_type_id && !$vehicle_class_id) {
            $query = 'SELECT * 
                        FROM vehicles INNER JOIN type ON vehicles.type_id = type.type_id
                        INNER JOIN class ON vehicles.class_id = class.class_id
                        INNER JOIN make ON vehicles.make_id = make.make_id
                       WHERE vehicles.make_id = :vehicleMake AND vehicles.type_id = :vehicleType
                        ORDER BY vehicles.price';
        } else if ($vehicle_make_id && !$vehicle_type_id && $vehicle_class_id) {
            $query = 'SELECT * 
                        FROM vehicles INNER JOIN type ON vehicles.type_id = type.type_id
                        INNER JOIN class ON vehicles.class_id = class.class_id
                        INNER JOIN make ON vehicles.make_id = make.make_id
                        WHERE vehicles.make_id = :vehicleMake AND vehicles.class_id = :vehicleClass
                        ORDER BY vehicles.price';
        } else if (!$vehicle_make_id && $vehicle_type_id && $vehicle_class_id) {
            $query = 'SELECT * 
                        FROM vehicles INNER JOIN type ON vehicles.type_id = type.type_id
                        INNER JOIN class ON vehicles.class_id = class.class_id
                        INNER JOIN make ON vehicles.make_id = make.make_id
                        WHERE vehicles.type_id = :vehicleType AND vehicles.class_id = :vehicleClass
                        ORDER BY vehicles.price';
        } else if ($vehicle_make_id && !$vehicle_type_id && !$vehicle_class_id) {
            $query = 'SELECT * 
                        FROM vehicles INNER JOIN type ON vehicles.type_id = type.type_id
                        INNER JOIN class ON vehicles.class_id = class.class_id
                        INNER JOIN make ON vehicles.make_id = make.make_id
                       WHERE vehicles.make_id = :vehicleMake
                        ORDER BY vehicles.price';
        } else if (!$vehicle_make_id && $vehicle_type_id && !$vehicle_class_id) {
            $query = 'SELECT * 
                        FROM vehicles INNER JOIN type ON vehicles.type_id = type.type_id
                        INNER JOIN class ON vehicles.class_id = class.class_id
                        INNER JOIN make ON vehicles.make_id = make.make_id
                        WHERE vehicles.type_id = :vehicleType
                        ORDER BY vehicles.price';
        } else if (!$vehicle_make_id && !$vehicle_type_id && $vehicle_class_id) {
            $query = 'SELECT * 
                        FROM vehicles INNER JOIN type ON vehicles.type_id = type.type_id
                        INNER JOIN class ON vehicles.class_id = class.class_id
                        INNER JOIN make ON vehicles.make_id = make.make_id
                        WHERE vehicles.class_id = :vehicleClass
                        ORDER BY vehicles.price';
        } else if (!$vehicle_make_id && !$vehicle_type_id && !$vehicle_class_id) {
            $query = 'SELECT * 
                        FROM vehicles INNER JOIN type ON vehicles.type_id = type.type_id
                        INNER JOIN class ON vehicles.class_id = class.class_id
                        INNER JOIN make ON vehicles.make_id = make.make_id
                        ORDER BY vehicles.price';
        }
    } else {
        if ($vehicle_make_id && $vehicle_type_id && $vehicle_class_id){
            $query = 'SELECT * 
                        FROM vehicles INNER JOIN type ON vehicles.type_id = type.type_id
                        INNER JOIN class ON vehicles.class_id = class.class_id
                        INNER JOIN make ON vehicles.make_id = make.make_id
                        WHERE vehicles.make_id = :vehicleMake AND vehicles.type_id = :vehicleType AND vehicles.class_id = :vehicleClass
                        ORDER BY vehicles.year' ;
        } else if ($vehicle_make_id && $vehicle_type_id && !$vehicle_class_id) {
            $query = 'SELECT * 
                        FROM vehicles INNER JOIN type ON vehicles.type_id = type.type_id
                        INNER JOIN class ON vehicles.class_id = class.class_id
                        INNER JOIN make ON vehicles.make_id = make.make_id
                        WHERE vehicles.make_id = :vehicleMake AND vehicles.type_id = :vehicleType
                        ORDER BY vehicles.year';
        } else if ($vehicle_make_id && !$vehicle_type_id && $vehicle_class_id) {
            $query = 'SELECT * 
                        FROM vehicles INNER JOIN type ON vehicles.type_id = type.type_id
                        INNER JOIN class ON vehicles.class_id = class.class_id
                        INNER JOIN make ON vehicles.make_id = make.make_id
                        WHERE vehicles.make_id = :vehicleMake AND vehicles.class_id = :vehicleClass
                        ORDER BY vehiicles.year';
        } else if (!$vehicle_make_id && $vehicle_type_id && $vehicle_class_id) {
            $query = 'SELECT * 
                        FROM vehicles INNER JOIN type ON vehicles.type_id = type.type_id
                        INNER JOIN class ON vehicles.class_id = class.class_id
                        INNER JOIN make ON vehicles.make_id = make.make_id
                        WHERE vehicles.type_id = :vehicleType AND vehicles.class_id = :vehicleClass
                        ORDER BY vehicles.year';
        } else if ($vehicle_make_id && !$vehicle_type_id && !$vehicle_class_id) {
            $query = 'SELECT * 
                        FROM vehicles INNER JOIN type ON vehicles.type_id = type.type_id
                        INNER JOIN class ON vehicles.class_id = class.class_id
                        INNER JOIN make ON vehicles.make_id = make.make_id
                        WHERE vehicles.make_id = :vehicleMake
                        ORDER BY vehicles.year';
        } else if (!$vehicle_make_id && $vehicle_type_id && !$vehicle_class_id) {
            $query = 'SELECT * 
                        FROM vehicles INNER JOIN type ON vehicles.type_id = type.type_id
                        INNER JOIN class ON vehicles.class_id = class.class_id
                        INNER JOIN make ON vehicles.make_id = make.make_id
                        WHERE vehicles.type_id = :vehicleType
                        ORDER BY vehicles.year';
        } else if (!$vehicle_make_id && !$vehicle_type_id && $vehicle_class_id) {
            $query = 'SELECT * 
                        FROM vehicles INNER JOIN type ON vehicles.type_id = type.type_id
                        INNER JOIN class ON vehicles.class_id = class.class_id
                        INNER JOIN make ON vehicles.make_id = make.make_id
                        WHERE vehicles.class_id = :vehicleClass
                        ORDER BY vehicles.year';
        } else if (!$vehicle_make_id && !$vehicle_type_id && !$vehicle_class_id) {
            $query = 'SELECT * 
                        FROM vehicles INNER JOIN type ON vehicles.type_id = type.type_id
                        INNER JOIN class ON vehicles.class_id = class.class_id
                        INNER JOIN make ON vehicles.make_id = make.make_id
                        ORDER BY vehicles.year';
            }
    }
    $statement = $db->prepare($query);
    if($vehicle_make_id){
    $statement->bindValue(':vehicleMake', $vehicle_make_id);
    };
    if($vehicle_type_id){
    $statement->bindValue(':vehicleType', $vehicle_type_id);
    };
    if($vehicle_class_id){
    $statement->bindValue(':vehicleClass', $vehicle_class_id);
    };
    $statement->execute();
    $vehiclesBy = $statement->fetchAll();
    $statement->closeCursor();
    return $vehiclesBy;
}
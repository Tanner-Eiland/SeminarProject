<?php

function get_uname_customers(){
    global $db;
    $query = 'SELECT username FROM customer_profiles';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
};

function get_uname_customer($customer){
    global $db;
    $query = 'SELECT username FROM customer_profiles where username = :customer';
    $statement = $db->prepare($query);
    $statement->bindvalue(':customer', $customer);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
};

function new_customer($uname, $pwd, $email, $phone, $fname, $lname){
    global $db;
    $query = 'INSERT INTO `customer_profiles`(`Username`, `password`, `email`, `phone`,`fname`, `lname`)
                 VALUES (:uname, :pwd, :email, :phone, :fname, :lname)';
    $statement = $db->prepare($query);
    $statement->bindvalue(':uname', $uname);
    $statement->bindvalue(':pwd', $pwd);
    $statement->bindvalue(':email', $email);
    $statement->bindvalue(':phone', $phone);
    $statement->bindvalue(':fname', $fname);
    $statement->bindvalue(':lname', $lname);
    $statement->execute();
    $statement->closeCursor();
};

function one_customer($uname){
    global $db;
    $query = 'SELECT * FROM customer_profiles WHERE Username = :uname';
    $statement = $db->prepare($query);
    $statement->bindvalue(':uname', $uname);
    $statement->execute();
    $person = $statement->fetchAll();
    $statement->closeCursor();
    return $person;
};

function insert_message($names, $email, $subject, $message){
    global $db;
    $query = 'INSERT INTO `message` (`ID`, `name`, `email`, `subject`, `message`) VALUES (NULL, :names, :email, :subject, :message)';
    $statement = $db->prepare($query);
    $statement->bindvalue(':names', $names);
    $statement->bindvalue(':email', $email);
    $statement->bindvalue(':subject', $subject);
    $statement->bindvalue(':message', $message);
    $statement->execute();
    
    $statement->closeCursor();
    
};
<?php
/**
 * Created by PhpStorm.
 * User: Chase Hausman
 * Date: 4/7/19
 * Time: 9:13 PM
 */

require "../app.php";

// Created a non-readable version of the password.
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$query = "INSERT INTO users (email, password, name, created_at, updated_at, deleted_at) VALUES ('{$_POST['email']}', '{$password}', '{$_POST['name']}', NOW(), NOW(), NULL);";

$results = $connection->query($query);

$connection->close();

if($results) {
    $_SESSION['message'] = "You have successfully been registered.";
} else {
    $_SESSION['message'] = "There was an error registering your account.";
}

redirectBack();

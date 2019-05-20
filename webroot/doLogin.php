<?php
/**
 * Created by PhpStorm.
 * User: Chase
 * Date: 5/18/19
 * Time: 10:32 PM
 */

require_once "../app.php";

if(!isset($_POST['email']) || !isset($_POST['password'])) {
    echo "Unable to log you in.";
    die();
}

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = \"{$email}\" LIMIT 1;";

$result = $GLOBALS['connection']->query($query);

if($result->num_rows < 1) {
    echo "Unable to log you in.";
}

$user = mysqli_fetch_assoc($result);

if(password_verify($password, $user['password'])) {
    saveUserId($user['id']);
    $_SESSION['message'] = "Successfully logged you in, {$user['name']}.";

    header("Location: {$App['home_url']}");
} else {
    echo "Unable to log you in.";
}
<?php
/**
 * Created by PhpStorm.
 * User: Chase
 * Date: 5/18/19
 * Time: 10:19 PM
 */

$App = [
    'home_url' => "http://cst126.chaseh.net",
];

require_once "database.php";
require_once "session.php";

function redirectBack() {
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

function redirect($to) {
    header("Location: {$App['home_url']}{$to}");
}

if(isset($_SESSION['message'])) {
    $message = $_SESSION['message'];

    unset($_SESSION['message']);
} else {
    $message = null;
}

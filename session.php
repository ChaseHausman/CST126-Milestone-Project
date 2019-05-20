<?php
/**
 * Created by PhpStorm.
 * User: Chase
 * Date: 5/18/19
 * Time: 10:18 PM
 */

require_once "database.php";

session_start();

function saveUserId($id) {
    $_SESSION["USER_ID"] = $id;
}

function getUserId() {
    if(isset($_SESSION['USER_ID'])) {
        return $_SESSION["USER_ID"];
    }
    return null;
}

function deleteUserId() {
    unset($_SESSION["USER_ID"]);
}

function authCheck() {
    if(isset($_SESSION['USER_ID']) && getUserId() !== null) {
        return true;
    }

    return false;
}

function getUser() {
    if(authCheck()) {
        $id = getUserId();

        $query = "SELECT * FROM users WHERE id = \"{$id}\" LIMIT 1;";

        $result = $GLOBALS['connection']->query($query);

        return mysqli_fetch_assoc($result);
    }

    return null;
}
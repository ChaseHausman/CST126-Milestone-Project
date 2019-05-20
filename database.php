<?php
/**
 * Created by PhpStorm.
 * User: Chase Hausman
 * Date: 4/7/19
 * Time: 9:22 PM
 */


$GLOBALS['connection'] = new mysqli("localhost", "cst126", "GCUCst126!", "cst126", 3306);

if(!$GLOBALS['connection']) {
    echo "Could not connect to database.";
    die;
}

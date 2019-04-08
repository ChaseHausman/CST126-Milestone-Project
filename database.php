<?php
/**
 * Created by PhpStorm.
 * User: Chase Hausman
 * Date: 4/7/19
 * Time: 9:22 PM
 */

$connection = new mysqli("localhost:8889", "root", "root", "milestone");

if(!$connection) {
    echo "Could not connect to database.";
    die;
}
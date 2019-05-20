<?php
/**
 * Created by PhpStorm.
 * User: Chase
 * Date: 5/18/19
 * Time: 11:24 PM
 */

require_once "../app.php";

deleteUserId();

$_SESSION['message'] = "See ya later!";

header("Location: {$App['home_url']}");
<?php
/**
 * Created by PhpStorm.
 * User: Chase
 * Date: 4/21/19
 * Time: 11:43 PM
 */

require "../app.php";

$validation = true;
$errors = "";

if($_POST['title'] == null || $_POST['title'] == "") {
    $errors = " Title is a required field. ";
    $validation = false;
} else {
    $title .= $_POST['title'];
}

if($_POST['body'] == null || $_POST['body'] == "") {
    $errors .= " Some Content is required to post. ";
    $validation = false;
} else {
    $body = $_POST['body'];
}

if(!$validation) {
    $_SESSION['message'] = trim($errors);
    redirectBack();
    die();
}

$query = "INSERT INTO posts (title, category_id, author_id, body) VALUES ('{$title}', 0, 0, '{$body}');";

$result = $connection->query($query);

if($result) {
    $_SESSION['message'] = "Successfully saved post.";
    redirect("posts.php");
    die();
} else {
    $_SESSION['message'] = "There was a problem saving your post.";
}

redirectBack();
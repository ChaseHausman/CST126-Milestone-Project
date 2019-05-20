<?php
/**
 * Created by PhpStorm.
 * User: Chase
 * Date: 4/29/19
 * Time: 12:10 AM
 */

require "../app.php";

if(!isset($_POST['id']) || $_POST['id'] == null || !is_numeric($_POST['id'])) {
    echo "Error 404 - Could not find an ID to search for.";
    die();
} else {
    $id = $_POST['id'];
}

if($_POST['action'] !== null && $_POST['action'] == "delete") {
    $query = "UPDATE posts SET deleted_at=NOW() WHERE id='{$id}';";

    $result = $connection->query($query);

    if($result) {
        $_SESSION['message'] = "Deleted post #{$id}.";
        redirectBack();
    } else {
        echo "Unable to find that post.";
    }

    die();
}

$errors = "";
$validation = true;
if($_POST['title'] == null || $_POST['title'] == "") {
    $errors .= " Title is a required field. ";
    $validation = false;
} else {
    $title = $_POST['title'];
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

$query = "UPDATE posts SET title='{$title}', body='{$body}' WHERE id='{$id}';";

$result = $connection->query($query);

if($result) {
    $_SESSION['message'] = "Successfully saved post #{$id}.";
} else {
    $_SESSION['message'] = "There was a problem saving your post.";
}

redirectBack();
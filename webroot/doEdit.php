<?php
/**
 * Created by PhpStorm.
 * User: Chase
 * Date: 4/29/19
 * Time: 12:10 AM
 */

require "../database.php";

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
        echo "Deleted post #{$id}.";
    } else {
        echo "Unable to find that post.";
    }

    die();
}

if($_POST['title'] == null || $_POST['title'] == "") {
    echo "Title is a required field.";
} else {
    $title = $_POST['title'];
}

if($_POST['body'] == null || $_POST['body'] == "") {
    echo "Some Content is required to post.";
} else {
    $body = $_POST['body'];
}



$query = "UPDATE posts SET title='{$title}', body='{$body}' WHERE id='{$id}';";

$result = $connection->query($query);

if($result) {
    echo "Successfully saved post #{$id}.";
} else {
    echo "There was a problem saving your post.";
}
<?php
/**
 * Created by PhpStorm.
 * User: Chase
 * Date: 4/21/19
 * Time: 11:43 PM
 */

require "../database.php";

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

$query = "INSERT INTO posts (title, category_id, author_id, body) VALUES ('{$title}', 0, 0, '{$body}');";

$result = $connection->query($query);

if($result) {
    echo "Successfully saved post.";
} else {
    echo "There was a problem saving your post.";
}
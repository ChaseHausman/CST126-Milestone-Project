<?php
/**
 * Created by PhpStorm.
 * User: Chase
 * Date: 5/19/19
 * Time: 8:57 PM
 */

require_once "../app.php";

if(isset($_POST['post']) && $_POST['post'] !== "") {
    $post = $_POST['post'];
} else {
    $_SESSION['message'] = "There was a problem with that request. (No post ID)";
    redirectBack();
    die();
}

$errors = "";
$validation = true;
if(isset($_POST['text']) && $_POST['text'] !== "") {
    $text = $_POST['text'];
} else {
    $errors = " Text is required to comment on a post. ";
    $validation = false;
}

if(!$validation) {
    $_SESSION['message'] = trim($errors);
    redirectBack();
    die();
}

$query = "INSERT INTO comments (post_id, text, deleted_at) VALUES (?, ?, NULL);";

$statement = $connection->prepare($query);

$statement->bind_param("is", $post, $text);

$result = $statement->execute();

$_SESSION['message'] = "Successfully added a new comment.";
redirectBack();
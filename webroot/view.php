<?php
/**
 * Created by PhpStorm.
 * User: Chase
 * Date: 5/19/19
 * Time: 8:01 PM
 */

require_once "../app.php";

if(!isset($_GET['id']) || $_GET['id'] == null || !is_numeric($_GET['id'])) {
    echo "Error 404 - Could not find an ID to search for.";
    die();
}

$id = $_GET['id'];

$query = "SELECT * FROM posts WHERE id = {$id} LIMIT 1;";

$post = $connection->query($query)->fetch_assoc();

$query = "SELECT * FROM comments WHERE post_id = {$id} AND deleted_at IS NULL ORDER BY created_at;";

$comments = $connection->query($query)->fetch_all(MYSQLI_ASSOC);

?>
<html>
    <head>
        <title><?php echo $post['title']; ?></title>
    </head>
    <body>
        <?php if($message !== null) { ?>
            <div class="alert-message"><?php echo $message; ?></div>
        <?php } ?>
        <a href="posts.php">View Posts</a>
        <?php if(authCheck()) { ?>
            <a href="post.php">New Post</a>
        <?php } ?>
        <hr>
        <h2><?php echo $post['title']; ?></h2>
        <div class="content">
            <?php echo $post['body']; ?>
        </div>
        <hr>
        <?php foreach($comments as $comment) { ?>
        <div class="comment-container">
            Posted at <?php echo $comment['created_at']; ?>:
            <div class="comment" style="margin: 15px; padding: 5px; background-color: lightgray;">
                <p><?php echo $comment['text']; ?></p>
            </div>
        </div>
        <?php } ?>
        <hr>
        <form action="doComment.php" method="post">
            <label for="text">Add a Comment</label><br>
            <textarea name="text" id="text" placeholder="Type your comment here."></textarea><br>
            <input type="hidden" name="post" value="<?php echo $post['id']; ?>">
            <button type="submit">Add Comment</button>
        </form>
    </body>
</html>
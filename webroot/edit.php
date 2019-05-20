<?php
/**
 * Created by PhpStorm.
 * User: Chase
 * Date: 4/28/19
 * Time: 11:52 PM
 */

require_once "../app.php";

if(!isset($_GET['id']) || $_GET['id'] == null || !is_numeric($_GET['id'])) {
    echo "Error 404 - Could not find an ID to search for.";
    die();
}

if(!authCheck()) {
    echo "Error 404 - Could not find this for you.";
    die();
}

$id = $_GET['id'];

$query = "SELECT * FROM posts WHERE id = {$id} LIMIT 1;";

$result = $connection->query($query)->fetch_assoc();

?>
<html>
    <head>
        <title>Edit <?php echo $result['title']; ?></title>
    </head>
    <body>
        <?php if($message !== null) { ?>
            <div class="alert-message"><?php echo $message; ?></div>
        <?php } ?>
        <a href="posts.php">View Posts</a>
        <a href="post.php">New Post</a>
        <h2>Edit <?php echo $result['title']; ?></h2>
        <form action="doEdit.php" method="post">
            <div class="form-group">
                <label for="title">Title</label><br>
                <input type="text" id="title" name="title" value="<?php echo $result['title']; ?>">
            </div>
            <div class="form-group">
                <label for="body">Post Content</label><br>
                <textarea id="body" name="body"><?php echo $result['body']; ?></textarea>
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                <button type="submit">Save</button>
                <button type="submit" name="action" value="delete">Delete</button>
            </div>
        </form>
    </body>
</html>

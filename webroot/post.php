<?php
/**
 * Created by PhpStorm.
 * User: Chase
 * Date: 4/21/19
 * Time: 11:36 PM
 */
?>

<html>
    <head>
        <title>New Post</title>
    </head>
    <body>
        <a href="posts.php">List Posts</a>
        <hr>
        <h2>Create New Post</h2>
        <form action="doPost.php" method="post">
            <div class="form-group">
                <label for="title">Title</label><br>
                <input type="text" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="body">Post Content</label><br>
                <textarea id="body" name="body"></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Post</button>
            </div>
        </form>
    </body>
</html>

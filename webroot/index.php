<?php
/**
 * Created by PhpStorm.
 * User: Chase
 * Date: 4/28/19
 * Time: 11:48 PM
 */

include "../app.php";
?>
<html>
    <head>
        <title>Blog</title>
    </head>
    <body>
        <?php if($message !== null) { ?>
            <div class="alert-message"><?php echo $message; ?></div>
        <?php } ?>
        <a href="posts.php">View Posts</a>
        <?php if(!authCheck()) { ?>
        <a href="register.php">New Account</a>
        <a href="login.php">Login</a>
        <?php } else { ?>
            <a href="post.php">New Post</a>
            Hello <?php echo getUser()['name']; ?>
            <a href="doLogout.php">Logout</a>
        <?php } ?>
    </body>
</html>
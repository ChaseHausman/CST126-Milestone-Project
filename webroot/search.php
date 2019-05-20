<?php
/**
 * Created by PhpStorm.
 * User: Chase
 * Date: 5/12/19
 * Time: 9:52 PM
 */

?>
<html>
    <head>
        <title>Posts</title>
    </head>
    <body>
        <?php if($message !== null) { ?>
            <div class="alert-message"><?php echo $message; ?></div>
        <?php } ?>
        <a href="posts.php">Posts</a>
        <hr>
        <h2>Search</h2>
        <form action="doSearch.php" method="get">
            <input type="text" name="q">
            <button type="submit">Search</button>
        </form>
    </body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Chase
 * Date: 4/28/19
 * Time: 11:29 PM
 */

require_once "../app.php";

$query = "SELECT id, title, updated_at, deleted_at FROM posts;";

$results = $connection->query($query);

$posts = [];
foreach($results as $result) {
    $posts[] = $result;
}

?>
<html>
    <head>
        <title>Posts</title>
    </head>
    <body>
        <?php if($message !== null) { ?>
            <div class="alert-message"><?php echo $message; ?></div>
        <?php } ?>
        <a href="index.php">Home</a>
        <?php if(authCheck()) { ?>
        <a href="post.php">Create New Post</a>
        <?php } else { ?>
        <a href="login.php">Login</a>
        <?php } ?>
        <a href="search.php">Search</a>
        <hr>
        <h2>All Posts</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Post</th>
                <th>Posted At</th>
            </tr>
            <?php foreach($posts as $post) {
                if ($post['deleted_at'] == null || authCheck()) { ?>
                    <tr <?php if ($post['deleted_at'] !== null) {
                        echo "style='background-color:orange;'";
                    } ?>>
                        <td><?php echo $post['id']; ?></td>
                        <td><a href="view.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></td>
                        <td><?php echo $post['updated_at']; ?></td>
                        <td>
                            <a href="<?php echo "{$App['home_url']}/view.php?id={$post['id']}"; ?>">View</a>
                            <?php if(authCheck()) { ?>
                                <a href="<?php echo "{$App['home_url']}/edit.php?id={$post['id']}" ?>">Edit</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php }
            }?>
        </table>
    </body>
</html>
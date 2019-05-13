<?php
/**
 * Created by PhpStorm.
 * User: Chase
 * Date: 4/28/19
 * Time: 11:29 PM
 */

require_once "../database.php";

$query = "SELECT id, title, updated_at, deleted_at FROM posts;";

$results = $connection->query($query);

$posts = [];
foreach($results as $result) {
    mysqli_fetch_assoc($result);

    $posts[] = $result;
}
?>
<html>
    <head>
        <title>Posts</title>
    </head>
    <body>
        <a href="post.php">Create New Post</a>
        <a href="search.php">Search</a>
        <hr>
        <h2>All Posts</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Post</th>
                <th>Posted At</th>
            </tr>
            <?php foreach($posts as $post) { ?>
            <tr <?php if($post['deleted_at'] !== null) { echo "style='background-color:orange;'"; } ?>>
                <td><?php echo $post['id']; ?></td>
                <td><a href="edit.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></td>
                <td><?php echo $post['updated_at']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>
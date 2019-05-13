<?php
/**
 * Created by PhpStorm.
 * User: Chase
 * Date: 5/12/19
 * Time: 10:02 PM
 */

require_once "../database.php";

$search = $_GET['q'];

$query = "SELECT * FROM posts WHERE deleted_at IS NULL AND (title LIKE '%{$search}%' OR body LIKE '%{$search}%');";

$results = $connection->query($query);

if(!$results) {
    echo "No posts found.";
}

$posts = [];
foreach($results as $result) {
    mysqli_fetch_assoc($result);

    $posts[] = [
        'id' => $result['id'],
        'title' => $result['title'],
        'updated_at' => $result['updated_at'],
    ];
}

?>
<html>
    <head>
        <title>Search Results for "<?php echo $search; ?>"</title>
    </head>
    <body>
        <a href="posts.php">Posts</a>
        <hr>
        <h2>Search Results</h2>
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

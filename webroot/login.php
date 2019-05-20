<?php
/**
 * Created by PhpStorm.
 * User: Chase
 * Date: 5/18/19
 * Time: 10:16 PM
 */

require_once "../app.php";

if(authCheck()) {
    echo "You cannot login a second time. Sorry.";
    die();
}

?>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <?php if($message !== null) { ?>
            <div class="alert-message"><?php echo $message; ?></div>
        <?php } ?>
        <h2>Login</h2>
        <form action="doLogin.php" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <button type="submit">Login</button>
        </form>
    </body>
</html>

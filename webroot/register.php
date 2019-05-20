<?php
/**
 * Created by PhpStorm.
 * User: Chase Hausman
 * Date: 4/7/19
 * Time: 9:03 PM
 */

require_once "../app.php";

?>

<html>
<head>
    <title>Register</title>
</head>
<body>
    <?php if($message !== null) { ?>
        <div class="alert-message"><?php echo $message; ?></div>
    <?php } ?>
    <h1>Register New Account</h1>
    <form action="doRegister.php" method="post">
        <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" placeholder="John Smith">
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="me@place.tld">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="It's a secret...">
        </div>
        <div class="form-group">
            <button type="submit">Create Account</button>
        </div>
    </form>
</body>
</html>
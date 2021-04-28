<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Users;

    require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - Philomena.nl</title>
    <meta charset="UTF-8">
    <meta name="author" content="Junyi Xie">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Philomena is a store located in The Netherlands, it specializes in hair and nail beautification.">
    <meta name="keywords" content="Philomena, salon, hair and nail stylists.">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css?<?php echo date("YmdHis"); ?>" media="screen">
</head>
<body>


<?php 

    $Users = new Users();
?>

<form action="login.php" method="GET">

    <input type="email" name="email" id="" placeholder="email">
    <input type="password" name="password" id="" placeholder="password">
    <input type="submit" value="submit">

</form>

<?php print("<!--".date("YmdHis")."-->"); $jsFiles = getFiles("assets/js", "js"); echo loadFiles($jsFiles); ?>
    
</body>
</html>
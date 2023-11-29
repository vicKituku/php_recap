<?php
//sessions can be used to carry over a variable. stores data on a server between requests
//lasts until the browser is closed

if (isset($_POST['submit'])) {
    session_start();
    $_SESSION['name'] = $_POST['name'];

    header('Location: index.php');
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions</title>
</head>

<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input type="text" name="name">
        <input type="submit" name="submit" value="submit">
    </form>

</body>

</html>
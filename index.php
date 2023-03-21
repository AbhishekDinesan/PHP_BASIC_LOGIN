<?php
session_start();

include ("connection.php");
include ("functions.php");

$user_date = check_login($con);


?>

<html>
    <head>
        <title> 
        Abhishek's Login
        </title>
    </head>

    <body>

    <a href = "logout.php"></a>

    <h1>This is the index page bud.</h1>

    <br>

    Hello, <?php echo $user_id['user_name'] ?>;
    </body>

</html>


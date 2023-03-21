<?php

session_start();

include ("connection.php");
include ("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_name = $_POST['user_name'];
    $passwrod = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        //database
        $query = "select * from users where user_name = '$user_name' limit 1";
        
       $result =  mysqli_query($con, $query);

       if ($result)
       {
        if ($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['password'] === $password)
            {
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.php");
                die;
            }
            return $user_data;
        }
       }
       echo "Incorrect username /password";
    }
    else {
        echo "Incorrect Password";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style type = "text/css"> </style>

    <div id = "box">

    <form method="post">
        <input type="text" name = "user_name"> <br> <br>
        <input type="password" name = "password"> <br> <br>
        <input type = "submit" value = "Login"><br> <br>
        <a href="signup.php"> Click to Sign Up</a><br> <br>

    </form>
    </div>
</body>
</html>
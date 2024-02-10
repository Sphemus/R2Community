<?php
require 'config.php';
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];                         //tb_user is the table name in the database
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($row["TYPE"] == "admin" && ($password == $row["PASSWORD"])){
            $_SESSION["login"] = true;                          //redirects user to admin page if type is admin
            $_SESSION["id"] = $row["id"];
            header("Location: admin.php");
        }else{

        if($password == $row["PASSWORD"]){
            $_SESSION["login"] = true;                          //else redirect to regular page
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        }
        else{
            echo                                                   //if username exists but password is not correct
            "<script> alert('Wrong Password'); </script>";
        }
        }
    }else{
        echo                                                                    //if username doesnt exist
        "<script> alert('User does not exist, please make an account'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login</title>                             <!--Lance style code starts here -->
        <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #007bb5;
        }

        a {
            text-decoration: none;
            color: #3498db;
            margin-top: 10px;
            display: inline-block;
        }
    </style>                                       <!-- Lance style code ends here -->
    </head>
    <body>
        <h2>Rizal Rescue & Community Development Inc.(R2)</h2>
        <h2>Login</h2>
        <form class="" action="" method="post" autocomplete="off">
            <label for="usernameemail">Username or Email : </label>
            <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br>
            <label for="password">Password</label>
            <input type="password" name="password" id = "password" required value=""> <br>
            <button type="submit" name="submit">Login</button>
        </form>
        <br>
        <a href="registration.php">registration</a>
    </body>
</html>
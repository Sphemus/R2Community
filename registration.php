<?php
require 'config.php';
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $lname = $_POST["lname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $contact = $_POST["contact"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Username or Email already in use by others'); </script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO tb_user VALUES('', '$name','$username','$email','$password','$lname','','$contact')";
            mysqli_query($conn,$query);
            echo
            "<script> alert('Signup Successful'); </script>";

            }
        else{
            echo
            "<script> alert('Password Does not Much'); </script>";

            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Registration</title>                  <!--Start of Lance's style code-->
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
            width: 350px;
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
            border-radius: 20px;
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
    </style>       <!-- End of Lance's Style code-->
    </head>
    <body>
    <h2>Registration</h2>
        <form class="" action="" method="post" autocomplete="off">
            <label for="name">First Name : </label>
            <input type="text" name="name" id="fname" required values=""> <br>
            <label for="lname">Last Name : </label>
            <input type="text" name="lname" id="lname" required values=""> <br>
            <label for="username">Username : </label>
            <input type="text" name="username" id="username" required values=""> <br>
            <label for="email"> Email : </label>
            <input type="email" name="email" id="email" required values=""> <br>
            <label for="contact">Contact Number : </label>
            <input type="number" name="contact" id="contact" required values=""><br>
            <label for="password">Password : </label>
            <input type="password" name="password" id="password" required values=""> <br>
            <label for="confirmpassword">Confirm Password : </label>
            <input type="password" name="confirmpassword" id="confirmpassword" required values=""> <br>
            <button type="submit" name="submit">Register</button>
        </form>
        <br>
        <a href="login.php">Login</a>
    </body>
</html>
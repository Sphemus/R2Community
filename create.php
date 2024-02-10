<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id=$id");
    $row = mysqli_fetch_assoc($result);                       //fetches result row

    if($row["TYPE"] != "admin"){
        echo
        "<script> alert('You are not authorized to access this page'); </script>";
        header("Location: index.php");
    }
}
else{
    header("Location: login.php");
}

if(isset($_POST["submit"])){
    $postname = $_POST["postname"];
    $posttype = $_POST["posttype"];
    $postdesc = $_POST["postdesc"];
    $posterid = $_SESSION["id"];
            $query = "INSERT INTO tb_post VALUES('', '$postname','$posttype','$postdesc','$posterid')";
            mysqli_query($conn,$query);
            echo
            "<script> alert('Post Created'); </script>";
        }

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Index Admin</title>                               <!-- Lance code starts here --> 
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

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        a {
            text-decoration: none;
            color: #3498db;
            padding: 10px 20px;
            margin: 10px;
            border: 2px solid #3498db;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
        }

        a:hover {
            background-color: #3498db;
            color: #fff;
        }
    </style>                                                 <!-- Lance code ends here -->

    </head>
    <body>
    <h1>Create a Post</h1>
    <form class="" action="" method="post" autocomplete="off">
            <label for="postname">Post Name </label>
            <input type="text" name="postname" id="postname" required values=""> <br>
            <label for="posttype">Subject </label>
            <input type="text" name="posttype" id="posttype" required values=""> <br>
            <label for="username">Description </label>
            <input type="textbox" name="postdesc" id="postdesc" required values=""> <br>
            <button type="submit" name="submit">Create Post</button>
        </form>
        <br>


    <a href="admin.php">admin page</a>
    <a href="index.php">index</a>
    <a href="logout.php">Logout</a>
    </body>
</html>
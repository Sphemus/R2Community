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
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Index</title>                              <!-- Lance style code starts-->
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
    </style>                                     <!-- Lance style code ends here -->
    </head>
    <body>
    <h1>Manage Members' Roles</h1>

        <table border = 1>
            <tr>
                <td>User ID</td>
                <td>Username</td>
                <td>Last Name</td>
                <td>First Name</td>
                <td>Email</td>
                <td>Role</td>
            </tr>
        <?php 
        $users = mysqli_query($conn, "SELECT * FROM tb_user");

        foreach($users as $user):
            ?>
        <tr>
            <td><?php echo $user["id"]; ?></td>
            <td><?php echo $user["username"]; ?></td>
            <td><?php echo $user["lname"]; ?></td>
            <td><?php echo $user["fname"]; ?></td>
            <td><?php echo $user["email"]; ?></td>
            <td><?php echo $user["TYPE"]; ?></td>
            <td><?php echo $user["contact"]; ?></td>
            <td><a href="demote.php?id=<?php echo $user["id"]; ?>">Demote</a>
            <td><a href="promote.php?id=<?php echo $user["id"]; ?>">Promote</a>

        </tr>
            <?php endforeach; ?>
        </table>
        </br>
    <a href="logout.php">Logout</a>
    </body>
</html>
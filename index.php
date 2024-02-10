<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id=$id");
    $row = mysqli_fetch_assoc($result);                       //fetches result row
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
    <h1>Welcome <?php echo $row["username"]; ?></h1>
        <table border = 1>
            <tr>
                <td>Title</td>
                <td>Subject</td>
                <td>Description</td>
            </tr>
        <?php 
        $post = mysqli_query($conn, "SELECT * FROM tb_post");

        foreach($post as $posted):
            ?>
        <tr>
            <td><?php echo $posted["postname"]; ?></td>
            <td><?php echo $posted["posttype"]; ?></td>
            <td><?php echo $posted["postdesc"]; ?></td>
            <td>
                <a href="join.php?id=<?php echo $posted["postid"]; ?>">Join</a>
        </tr>
            <?php endforeach; ?>
        </table>
        </br>
    <a href="logout.php">Logout</a>
    </body>
</html>
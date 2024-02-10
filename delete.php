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

<?php
$postid = $_GET['id'];
$sql = "DELETE FROM tb_post WHERE postid = $postid";
$result = mysqli_query($conn, $sql);
header("Location: admin.php?msg=Post Deleted.");

?>
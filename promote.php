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
$volunteer="volunteer";

$userid = $_GET["id"];
mysqli_query($conn, "UPDATE tb_user SET 'type'=volunteer WHERE id = $userid");
header("Location: admin.php?msg=Post Deleted.");
?>
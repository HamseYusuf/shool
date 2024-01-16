<?php 
include("db.php");
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare(" DELETE FROM students WHERE id = :id");
    $stmt->bindParam(":id" , $id);
    $stmt->execute();
    header("Location: index.php");

}
?>
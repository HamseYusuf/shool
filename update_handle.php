<?php 
include("db.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

if($_SERVER['REQUEST_METHOD']) {
    $name = $_POST['name'];
    $grade= $_POST['grade'];
    $address = $_POST['address'];

    $sql = " UPDATE students SET name = :name ,  grade = :grade , address = :address WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":name" , $name);
    $stmt->bindParam(":grade" , $grade);
    $stmt->bindParam(":address" , $address);
    $stmt->bindParam(":id" , $id);
    $stmt->execute();
    header("Location: index.php");

}

?>
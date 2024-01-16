<html>
<?php 
include('db.php');
include("base.php");
include("header.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    echo $id;
    $stmt = $conn->prepare("SELECT * FROM students WHERE id = $id");
    $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $student['name'];
}
?>
<body>
    
<div class="container">
    <div class="row flex justify-content-center">
        <div class="col-4">
            <div class="display-5 m-2 text-center"> Update Form </div>
            <form action="update_handle.php?id=<?php echo $student['id'] ?>" method="post" class="form-group">
                <label for="" class="form-label"> Name </label>
                <input type="text" name="name" value="<?php echo $student['name'] ?>" class="form-control">
                <label for="" class="form-label"> grade </label>
                <input type="text" value="<?php echo $student['grade'] ?>" name="grade" class="form-control">
                <label for="" class="form-label"> address </label>
                <input type="text" name="address" value="<?php echo $student['address'] ?>" class="form-control">
                <input type="submit" value="submit" class="form-control btn btn-secondary mt-2">
            </form>
        </div>
    </div>
</div>
</body>
</html>
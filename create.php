<html>
    <?php include('base.php');
          include("header.php");
          include("db.php");

          if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name=$_POST['name'];
            $grade=$_POST['grade'];
            $address=$_POST['address'];

            if(empty($name) || empty($grade) || empty($address)) {
                header("Location: create.php");
            } elseif(!filter_var($name , FILTER_VALIDATE_INT) && 
            filter_var($grade, FILTER_VALIDATE_INT) && !filter_var($address,
             FILTER_VALIDATE_INT)) {
                $sql = "INSERT INTO students (name , grade , address ) VALUES (:name , :grade, :address)";
                $stmt= $conn->prepare($sql);
                $stmt->bindParam(":name" , $name);
                $stmt->bindParam(":grade" , $grade);
                $stmt->bindParam(":address" , $address);
                $stmt->execute();
                header("Location: index.php");

             } else {
                header('Location: create.php');
             }

          }
    ?>
    <body>
        <div class="contaier mt-4">
            <div class="display-6 text-center">Create Form </div>
            <div class="row flex justify-content-center">
                <div class="col-4">
                    <form action="create.php" class="form-group" method="post">
                        <label for="" class="form-label"> Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your name">
                        <label for="" class="form-label" > Grade</label>
                        <input type="text" class="form-control" name="grade" placeholder="Enter Your Grade">
                        <label for="" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Enter Address">
                        <input type="submit" value="Add" class="btn btn-danger mt-2 ">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
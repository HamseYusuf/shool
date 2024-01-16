<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query = $_POST['query'];
    if(empty($query)) {
        header("Location: index.php");
    }

}
?>

<html>
    <?php include('base.php');
          include("header.php");
         include('db.php');
     ?>
     <body>
        <div class="container">
            <div class="display-5 text-center"> List of Students </div>
            <a href="create.php" class="btn btn-secondary btn-sm">Add New </a>
            <table class="table table-hover table-striped">
                <thead>
                    <th>Id </th>
                    <th>Name</th>
                    <th>Grade</th>
                    <th>Address</th>
                    <th></th>
                </thead>
                <tbody>
             <?php
                    $stmt=$conn->prepare('SELECT * FROM students WHERE name LIKE :query');
                    $stmt->bindParam(":query" , $query);
                    $stmt->execute();
                    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if($students) {
                        foreach($students as $student) { ?>

                            <tr>
                                <td><?php echo $student['id'] ?></td>
                                <td><?php echo $student['name'] ?></td>
                                <td><?php echo $student['grade'] ?></td>
                                <td><?php echo $student['address'] ?></td>
                                <td>
                                    <a href="update.php?id=<?php echo $student['id'] ?>" class="btn btn-info btn-sm">Update</a>
                                    <a href="delete.php?id=<?php echo $student['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                       <?php }
                    } else {
                        echo "Not Found";
                    } ?>
                </tbody>
            </table>
        </div>
     </body>
</html>
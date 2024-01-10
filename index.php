<html>
    <?php include('base.php');
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
                </thead>
                <tbody>
             <?php
                    $stmt=$conn->prepare('SELECT * FROM students');
                    $stmt->execute();
                    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach($students as $student) { ?>

                        <tr>
                            <td><?php echo $student['id'] ?></td>
                            <td><?php echo $student['name'] ?></td>
                            <td><?php echo $student['grade'] ?></td>
                            <td><?php echo $student['address'] ?></td>
                        </tr>
                   <?php }?>
                </tbody>
            </table>
        </div>
     </body>
</html>
<?php
include("base.php");
include("db.php");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username= $_POST['username'];
    $email = $_POST['email'];
    $password= $_POST['password'];

    $sql = "INSERT INTO users (username , email , password) VALUES (:username , :email ,:password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":username" , $username);
    $stmt->bindParam(":email" , $email);
    $stmt->bindParam(":password" , password_hash($password , PASSWORD_DEFAULT));
    $stmt->execute();
    header("Location: login.php");

}
?>

<html>
    <body>
        <div class="container m-5 ">
            <div class="row flex justify-content-center">
                <div class="col-5">
                    <div class="display-6 mb-2 "> Signup  form </div>
                    <form action="signup.php" method="post" class="form-group">
                        <label for="" class="form-label"> Username</label>
                        <input type="text" name ="username"class="form-control">
                        <label for="" class="form-label"> Email</label>
                        <input type="text" name ="email" class="form-control">
                        <label for="" class="form-label"> Password</label>
                        <input type="password" name ="password"class="form-control">
                        <button type="submit" class="btn btn-info mt-2">Sign up </button>
                    </form>
                    <a href="login.php"> Already have an Account</a>
                </div>
            </div>
        </div>
    </body>
</html>
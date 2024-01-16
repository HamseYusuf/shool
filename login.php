<?php 
include("base.php");
include("db.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":username" , $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user && password_verify($password , $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
    } else {
        echo "invalid username or password";
    }


}

?>

<html>
    <body>
        <div class="container m-5 ">
            <div class="row flex justify-content-center">
                <div class="col-5">
                    <div class="display-6 mb-2 "> Login form </div>
                    <form action="login.php" method="post" class="form-group">
                        <label for="" class="form-label"> Username</label>
                        <input type="text" name ="username"class="form-control">
                        <label for="" class="form-label"> Password</label>
                        <input type="password" name ="password"class="form-control">
                        <button type="submit" class="btn btn-info mt-2">Login </button>
                    </form>
                    <a href="signup.php"> Register New user </a>
                </div>
            </div>
        </div>
    </body>
</html>
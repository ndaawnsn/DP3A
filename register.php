<?php
session_start();
error_reporting(0);
include('config.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "INSERT INTO users(name, email, mobile, password) VALUES(:name,:email, :mobile, :password)";
    $query = $db->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $db->lastInsertId();
    if ($lastInsertId) {
        $_SESSION['login']=$_POST['username'];
        echo "<script>alert('Thanks For Register, Continue Your Shopping')</script>";
    } else {
        echo "<script>alert('Please Fill All Valid Details')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrendZ | Online Store for Latest Trends</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body style="overflow: hidden;">

    <section>
        <?php include('./inc/header.php'); ?>

        <div class="bgLogin">
            <div class="row justify-content-md-center">
                <div class="col-4">
                    <form class="text-center p-5 mt-3" style="background: rgba(217, 217, 217, 0.44); backdrop-filter: blur(10px);" method="post">
                        <p class="h4 mb-4">Sign up</p>
                        <input name="name" type="text" class="form-control mb-4" placeholder="Name" required>
                        <input name="email" type="email" class="form-control mb-4" placeholder="Email" required>
                        <input name="mobile" type="number" class="form-control mb-4" placeholder="Mobile" required>
                        <input name="password" type="password" class="form-control mb-4" placeholder="Password" required>

                        <input class="btn btn-dark btn-block my-4" name="submit" type="submit" value="Register">
                        <p>Already Registerd?
                            <a href="login.php">Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
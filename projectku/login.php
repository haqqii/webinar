<?php
session_start();

include 'conn.php';

if ($_SESSION) {
    header('location: index.php');
} else {

    if (isset($_GET['redirectProfile'])) {
        $profileId = $_GET['redirectProfile'];
    }

    if (isset($_POST['submit'])) {
        // session_start();
        $username = $_POST['username'];
        $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $password = password_verify($_POST['password'], $hash);

        $sql = "SELECT * FROM users WHERE `username`='$username'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        if ($row != NULL) {
            if (password_verify($_POST['password'], $row['password'])) {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $row['id'];
                // var_dump($_SESSION['id']);
                if ($profileId != NULL) {
                    header('location: profile.php?id=' . $profileId);
                } else {
                    header('Location: index.php');
                }
            }
        } else {
            echo "No Dataset";
        }
    }
    mysqli_close($conn);
}

$pageTitle = 'Login';
include 'header.php';

?>

<div class="jumbotron">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-0 col-md-9">
                <div class="text-center">
                    <div class="container p-3 my-3 bg-dark text-white">
                        <h1>Halaman Login</h1>
                    </div>
                </div>
                <form action="login.php<?php if (isset($_GET['redirectProfile'])) {
                                            echo "?redirectProfile=" . $_GET['redirectProfile'];
                                        } ?>" method="POST">

                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" onkeyup='check();'>
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Confirm Password" onkeyup=' check();'>
                        </div>
                    </div>
                    <a href="index.php" class="btn btn-primary btn-user btn-block">
                        Login
                </form>
                <div class="text-center">
                    <a class="small" href="register.php">Create a new Account!</a>
                </div>
            </div>

            <?php include 'footer.php' ?>
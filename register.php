<?php
session_start();

include 'conn.php';

if ($_SESSION) {
    header('location: index.php');
} else {

    if (isset($_POST['submit'])) {
        if ($_POST['password'] !== $_POST['confirm_password'])
            header('Location: register.php');

        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $bio = $_POST['bio'];
        $desc = $_POST['desc'];

        $sql = "INSERT INTO users (`email`, `username`, `password`,`bio`,`description`)
            VALUES ('$email', '$username', '$password','$bio','$desc')";

        // var_dump($sql);
        // die();
        if (mysqli_query($conn, $sql)) {
            echo "Pendaftaran telah berhasil, silahkan login";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}

$pageTitle = 'Register';
include 'header.php';
?>

<div class="jumbotron">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Create Account</h3>
                            </div>
                            <div class="card-body">
                                <form action="register.php" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <textarea type="text" class="form-control" id="bio" name="bio" placeholder="Bio"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <textarea type="text" class="form-control" id="username" name="desc" placeholder="Description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" onkeyup='check();'>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" onkeyup=' check();'>
                                        <span id="message"></span>
                                    </div>

                            </div>
                            <button class="btn btn-primary btn-block" type="submit" name="submit" id="submit" class="btn btn-primary">Create Account</button>
                            </form>
                        </div>
                        <div class="text-center">
                            <div class="card-footer text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
            </main>
            <script type="text/javascript">
                var check = function() {
                    if (document.getElementById('password').value ==
                        document.getElementById('confirm_password').value) {
                        document.getElementById('message').style.color = 'green';
                        document.getElementById('message').innerHTML = 'Password Matches!';
                    } else {
                        document.getElementById('message').style.color = 'red';
                        document.getElementById('message').innerHTML = 'Password is not the same!';
                    }
                }
            </script>
            <?php include 'footer.php' ?>
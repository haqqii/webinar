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
    <div class="card o-hidden border-0 shadow-lg-0 my-5">
        <div class="card-body p-7">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-0 col-md-9">
                    <div class="text-center">
                        <h2>Hi User Baru, Daftar Yuk!</h2>
                        <form action="register.php" method="POST">
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" onkeyup='check();'>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" onkeyup=' check();'>
                                <span id="message"></span>
                            </div>
                            <div class="form-group">
                                <textarea type="text" class="form-control" id="bio" name="bio" placeholder="Bio"></textarea>
                            </div>
                            <div class="form-group">
                                <textarea type="text" class="form-control" id="username" name="desc" placeholder="Description"></textarea>
                            </div>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <div class="text-center">
                        <a class="small" href="login.php">Already have an account? Login!</a>
                    </div>

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
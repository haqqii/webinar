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
        $instansi = $_POST['instansi'];

        $sql = "INSERT INTO users (`email`, `username`, `password`,`instansi`)
            VALUES ('$email', '$username', '$password','$instansi')";

        // var_dump($sql);
        // die();
        if (mysqli_query($conn, $sql)) {
?>
            <p style="color:red;">Pendaftaran telah berhasil, silahkan login</p>
<?php
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}

?>
<html>

<head>
    <title>Webinar | Register</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <style>
        .b {
            background-size: cover;
        }
    </style>
</head>

<body style="background: url(assets/img/bg2.jpg); background-size: cover;" class="trans">
    <div class="white-text" style="background-color: rgba(0, 0, 0, 0.75); width: 100%; height:1000px; margin-top: -35px;">
        <center>
            <div style="padding-top: 175px;">
                <img src="assets/img/register2.png" class="img-responsive" style="width: 200px;">
                <p style="font-family: News701 BT; font-size: 21px;">Sign Up dulu, baru Sign In <b>Tiketnya</b></p>
                <div class="container" style="width: 500px;">
                    <form action="register.php" method="POST">
                        <div class="input-field">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required>
                        </div>
                        <div class="input-field">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                        </div>
                        <div class="input-field">
                            <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi" required></input>
                        </div>
                        <div class="input-field">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" onkeyup='check();' required>
                        </div>
                        <div class="input-fie">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" onkeyup=' check();' required>
                            <span id="message"></span>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit" name="submit" id="submit" class="btn btn-primary">Create Account</button>
                    </form>
                    <p class="left">Anda sudah punya akun? Silahkan langsung Sign In.</p><a href="login.php" style="font-family: segoe ui light;"><button class="btn waves-effect blue">Sign In </button></a>
                </div>
            </div>
        </center>
    </div>
</body>
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
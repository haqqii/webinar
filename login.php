<?php
session_start();

include 'conn.php';

if ($_SESSION) {
    header('location: home.php');
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
                    header('Location: home.php');
                }
            }
        } else {
            echo "No Dataset";
        }
    }
    mysqli_close($conn);
}

?>
<html>

<head>
    <title>Webinar | Sign In</title>
    <link rel="icon" href="image/bayplane.png">
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
    <div class="white-text" style="background-color: rgba(0, 0, 0, 0.75); width: 100%; height:700px; margin-top: -35px;">
        <center>
            <div style="padding-top: 175px;">
                <div class="container" style="width: 500px;">
                    <img src="assets/img/login7.png" class="img-responsive" style="width: 150px; height: 100px;">
                    <p style="font-family: News701 BT; font-size: 21px;">Sign In dulu, baru cari <b>Webinarnya</b></p>
                    <form action="login.php<?php if (isset($_GET['redirectProfile'])) {
                                                echo "?redirectProfile=" . $_GET['redirectProfile'];
                                            } ?>" method="POST">

                        <div class="input-field">
                            <label>Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <p class="left">Anda belum punya akun? Silahkan buat akun anda.</p><a href="register.php" style="font-family: segoe ui light;" class="right"><button class="btn waves-effect blue">Register</button></a>
                </div>
            </div>
        </center>
</body>
<!-- </div> -->
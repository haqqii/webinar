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

<!DOCTYPE html>
<html>

<head>
    <title>Animated Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <img class="wave" src="img/wave.png">
    <div class="container">
        <div class="img">
            <img src="img/hello.svg">
        </div>
        <div class="login-content">
            <form action="login.php<?php if (isset($_GET['redirectProfile'])) {
                                        echo "?redirectProfile=" . $_GET['redirectProfile'];
                                    } ?>" method="POST">
                <img src="img/profil.svg">
                <h2 class="title">Login dulu bosku</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="text" class="input" id="Email" name="Email">
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Username</h5>
                        <input type="text" class="input" id="username" name="username">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" id="exampleInputPassword">
                    </div>
                </div>
                <a type="submit" class="btn" value="Login" href="index.php">
                    Login
                </a>
                <a href="register.php">Belum punya akun? DAFTAR </a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
    <!--testaaa-->
</body>

</html>



<?php include 'footer.php' ?>
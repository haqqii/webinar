<?php
session_start();
include 'conn.php';

$sql = "SELECT * FROM users";

$rows = mysqli_query($conn, $sql);
$i = 0;
mysqli_close($conn);

$pageTitle = 'Dashboard';
include 'header.php';

?>
<div class="wrapper">
    <div class="top_navbar">
        <div class="hamburger">
            <div class="one"></div>
            <div class="two"></div>
            <div class="three"></div>
        </div>
        <div class="top_menu">
            <img src="assets/img/logo2.gif" alt="logo" width="100px">
            <?php if ($_SESSION) : ?>
                <p class="navbar-nav ml-auto mr-4 mt-2 mt-lg-0" style="margin-right:5px"><?php echo $_SESSION['username'] ?></p>
                <!-- <a href="update.php" class="mr-4">Update gan</a> -->
                <a href="logout.php">Logout bang</a>
            <?php else : ?>
                <ul class="navbar-nav ml-auto mr-4 mt-2 mt-lg-0">
                    <li class="nav-item active" style="margin-right:5px;">
                        <a class="nav-link" href="register.php">Register <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ml-5">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>

    <div class="sidebar">
        <ul>
            <li><a href="info.php">
                    <span class="icon"><i class="fas fa-info-circle"></i></span>
                    <span class="title">Info</span>
                </a></li>
            <li><a href="#">
                    <span class="icon"><i class="fas fa-list"></i></span>
                    <span class="title">Lainnya</span>
                </a></li>
        </ul>
    </div>
    <div class="main_container">
        <center>
            <div class="item">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="bg-primary text-white">
                                <h1>Welcome to Webinar</h1>
                                <img class="card-img-top" src="assets/img/webinar.jpg" alt="webinar" width="600px">
                                <p class="lead"><b>
                                        <font size="4">Joining a webinar is free and easy to attend </font>
                                    </b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
        <div class="item">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="bg-primary text-white">
                            <p class="lead"><b>
                                    <font size="5">"To persevere, i think, is important for everybody. Don't give up, don't give in. There's always an answer to everything"</font>
                                </b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<footer class="footer text-right">
    <div class="text-center">
        <span class="hide-phone">
            2021
            <i class="fa fa-copyright">
            </i>
            Web Webinar Dibuat dengan
            <i class="fa fa-heart text-danger">
            </i>
            oleh
            <a href="https://api.whatsapp.com/send?phone=6285904437552">admin</a>
        </span>
    </div>
</footer>
</body>

</html>
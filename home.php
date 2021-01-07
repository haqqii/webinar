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
                <a href="logout.php">Logout</a>
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
            <li><a href="home.php" class="active">
                    <span class="icon"><i class="fas fa-home"></i></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li><a href="seminar.php">
                    <span class="icon"><i class="fas fa-book"></i></span>
                    <span class="title">Seminar</span></a></li>
            <li><a href="lomba.php">
                    <span class="icon"><i class="fas fa-volleyball-ball"></i></span>
                    <span class="title">Lomba</span>
                </a></li>
            <li><a href="users.php">
                    <span class="icon"><i class="fas fa-user"></i></span>
                    <span class="title">Users</span>
                </a></li>
            <li><a href="#">
                    <span class="icon"><i class="fas fa-list"></i></span>
                    <span class="title">Lainnya</span>
                </a></li>
        </ul>
    </div>
    <center>
        <div class="main_container">
            <div class="item">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100">
                            <header class="bg-primary text-white">
                                <h1>Welcome to Webinar</h1>
                                <img class="card-img-top" src="assets/img/webinar.jpg">
                                <p class="card-text">Selamat bergabung di Website Webinar ini.</p>
                                <p>Bagi yang mempunyai info Seminar & Workshop GRATIS, monggo dikirim ke Narahubung agar bisa di post di Website ini</p>
                                <p>Bagi yang mempunyai info Seminar & Workshop BERBAYAR, diwajibkan berdonasi ke channel (seikhlasnya)
                                </p>
                                <p>Bagi ingin bertanya dan berdonasi, silakan hubungi Narahubung</p>
                                <p>Terima Kasih</p>
                                <p>➖➖➖➖➖➖➖➖➖➖➖➖</p>
                                <p>Narahubung : </p>
                                <a href="https://api.whatsapp.com/send?phone=6285904437552">Admin (Klik Disini)</a>
                            </header>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
    </body>

    </html>
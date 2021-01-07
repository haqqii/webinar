<?php
session_start();

$id = $_GET['id'];
if (!($_SESSION)) {
    header('location: login.php?redirectProfile=' . $id);
}

include 'conn.php';
$sql = "SELECT * FROM users WHERE id=$id LIMIT 1";

$rows = mysqli_query($conn, $sql);
$i = 0;
mysqli_close($conn);
$data = mysqli_fetch_assoc($rows);

$pageTitle = 'Profil @' . $data['username'];
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
            <li><a href="home.php">
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
            <li><a href="users.php" class="active">
                    <span class="icon"><i class="fas fa-user"></i></span>
                    <span class="title">Users</span>
                </a></li>
            <li><a href="#">
                    <span class="icon"><i class="fas fa-list"></i></span>
                    <span class="title">Lainnya</span>
                </a></li>
        </ul>
    </div>
    <div class="main_container">
        <div class="item">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="row no-gutters">
                            <div class="col-xl-12 img-cover">
                                <div class="overlay-black"></div>
                                <h2>@<?php echo $data['username'] ?></h2>
                            </div>
                        </div>
                        <div class="row no-gutters" style="margin-top: 60px;">
                            <div class="col-xl-3">
                                <ul>
                                    <li>
                                        <h4>Explore</h4>
                                    </li>
                                    <li>
                                        <h4>Settings</h4>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-6 img-cover">
                                <ul>
                                    <li>
                                        <h4>Bio</h4>
                                        <a><?php echo $data['instansi']; ?></a>
                                    </li><br />
                                    <li>
                                        <h4>Contact</h4>
                                        <a><?php echo $data['email']; ?></a>
                                    </li><br />
                                </ul>
                            </div>
                            <div class="col-xl-3"></div>
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
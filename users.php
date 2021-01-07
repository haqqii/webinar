<?php
session_start();
include 'conn.php';

$sql = "SELECT * FROM users";

$rows = mysqli_query($conn, $sql);
$i = 0;
mysqli_close($conn);

$pageTitle = 'Users';
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
            <ul>
                <li><a href="#">
                        <i class="fas fa-search"></i></a></li>
                <li><a href="#">
                        <i class="fas fa-bell"></i>
                    </a></li>
                <li><a href="#">
                        <i class="fas fa-user"></i>
                    </a></li>
            </ul>
        </div>
    </div>

    <div class="sidebar">
        <ul>
            <li><a href="index.php">
                    <span class="icon"><i class="fas fa-home"></i></span>
                    <span class="title">Dashboard</span>
                </a></li>
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
            <table class="table table-bordered" style="width:100%">
                <thead class=" thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td> <?= ++$i ?> </td>
                        <td> <?= $row['username'] ?> </td>
                        <td> <?= $row['email'] ?> </td>
                        <td> <a href="profile.php?id=<?= $row['id'] ?>" class="btn btn-primary"> Details </a> </td>

                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
</body>

</html>
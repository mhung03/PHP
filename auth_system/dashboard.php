<?php
    require 'config.php';

    if(!isset($_SESSION['user'])) {
        header('Location:login.php');
        exit;
    }
    echo "<h2>Chào, ". htmlspecialchars($_SESSION['user']['username']) . "!</h2>";
    echo "<p>Bạn đã đăng nhập thành công</p>";
    echo "<a href='logout.php'>Đăng xuất</a>";
?>
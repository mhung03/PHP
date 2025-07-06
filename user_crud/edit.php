<?php
    require 'db.php';
    $id = $_GET['id'];
    $stmt = $pdo->prepare('Select * from users where id = ?');
    $stmt -> execute([$id]);
    $user = $stmt -> fetch();
    if (!$user) die("User đéo tổn tại");

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['username'];
        $email = $_POST['email'];

        $stmt = $pdo->prepare('Update users set name = ?, email = ? where id = ?');
        $stmt -> execute([$name, $email, $id]);
        header("Location: index.php");
    }
?>

<h2>Sửa người dùng</h2>
<form action="" method="POST">
    Tên: <input type="text" name="username" value="<?= htmlspecialchars($user['name']) ?>"><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>"><br>
    <button type="submit">Cập nhật</button>
</form>
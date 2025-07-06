<?php 
    require 'db.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];

        $stmt = $pdo-> prepare('Insert into users (name,email) values (?,?)');
        $stmt -> execute([$name, $email]);

        header('Location: index.php');
    }
?>

<h2>Thêm người dùng</h2>
<form action="" method="POST">
    Tên: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    <button type="submit">Thêm</button>
</form>
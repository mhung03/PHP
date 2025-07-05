<?php 
    require 'config.php';
    require 'db.php';

    $errors = [];
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $stmt = $pdo->prepare("select * from users where email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if($user && password_verify($password, $user['password'])){
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
            ];
            header("Location: dashboard.php");
            exit;
        } else {
            $errors[] = 'Email hoặc mật khẩu không đúng';
        }
    }
?>
<h2>Đăng nhập</h2>
<form action="" method="POST">
    Email: <input type="email" name="email"><br>
    Mật khẩu: <input type="password" name="password"><br>
    <button type="submit">Đăng nhập</button>
</form>

<?php 
    foreach ($errors as $error) {
        echo "<p style='color:red'>$error</p>";
    }
?>
<p>Chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
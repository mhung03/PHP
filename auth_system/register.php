<?php 
    require 'config.php';
    require 'db.php';

    $errors = [];
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if(empty($username) || empty($email) || empty($password)) {
            $errors[] = 'Vui lòng điền đầy đủ thông tin';
        } else {
            $stmt = $pdo -> prepare('Select id from users where email = ?');
            $stmt -> execute([$email]);
            if($stmt-> fetch()) {
                $errors[] = 'Email đã tồn tại';
            }
        }

        if(empty($errors)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo -> prepare("Insert into users (username,email,password) value (?,?,?)");
            $stmt -> execute([$username,$email,$hash]);
            header("Location:login.php");
            exit;
        }
    }

?>

<h2>Đăng ký</h2>
<form action="" method="POST">
    Tên người dùng: <input type="text" name="username"><br>
    Email: <input type="email" name="email"><br>
    Mật khẩu: <input type="password" name="password"><br>
    <button type="submit">Đăng ký</button>
</form>

<?php 
    foreach($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
?>
<p>Đã có tài khoản ? <a href="login.php">Đăng nhập</a></p>
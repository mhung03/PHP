<?php 
    require 'db.php';
    require 'functions.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $stmt = $pdo-> prepare("Select * from admins where username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch();

        if($admin && password_verify($password, $admin['password'])) {
            session_regenerate_id(true);
            $_SESSION['admin_logged_in'] = true;
            header("Location: ./admin/dashboard.php");
            exit;
        } else {
            $error = 'Invalid login credentials';
        }
    }
?>
<form action="" method="POST">
    <h2>LOGIN</h2>
    <?php if(!empty($error)) echo"<p style='color:red'>$error</p>"; ?>
    <input type="text" name="username" placeholder="username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
<?php
    require '../db.php';
    require '../functions.php';
    require_login();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(!validate_csrf($_POST['csrf_token'])) die('Invalid CSRF token');
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';

        $stmt = $pdo->prepare('Insert into posts (title,content) values (?,?)');
        $stmt->execute([$title, $content]);
        header("Location: dashboard.php");
        exit;
    }
?>
<h2>Create Post </h2>
<form action="" method="POST">
    <input type="text" name="title" placeholder="Title" required><br>
    <textarea name="content" placeholder="Content" rows="10" cols="50" required></textarea><br>
    <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
    <button type="submit">Create</button>
</form>
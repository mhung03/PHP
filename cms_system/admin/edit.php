<?php
    require '../db.php';
    require '../functions.php';
    require_login();

    $id = $_GET['id'] ?? null;
    if(!$id || !is_numeric($id)) die("Invalid ID");

    $stmt = $pdo -> prepare("Select * from posts where id = ? ");
    $stmt -> execute([$id]);
    $post = $stmt->fetch();
    if(!$host) die("Post not found");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(!validate_csrf($_POST['csrf_token'])) die("Invalid CSRF token");
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';

        $stmt = $pdo->prepare("Update posts set title =?, content =? where id =?");
        $stmt->execute([$title, $content, $id]);
        header("Location: dashboard.php");
        exit;
    }
?>  

<h2>Edit Post</h2>
<form action="" method="POST">
    <input type="text" name="title" value="<?= e($post['title']) ?>" require><br>
    <textarea name="content" rows="10" cols="50" required><?= e($post['content']) ?></textarea><br>
    <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
    <button type="submit">Update</button>
</form>

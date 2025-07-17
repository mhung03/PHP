<?php
    require 'db.php';
    require 'functions.php';

    $id = $_GET['id'] ?? null;
    if(!$id || !is_numeric($id)) die('Invalid post ID.');

    $stmt = $pdo->prepare('Select * from posts where id = ?');
    $stmt->execute([$id]);
    $post = $stmt->fetch();
    if(!$post) die("Post not found");
?>
<h2><?= e($post['title']) ?></h2>
<p><?= nl2br(e($post['content'])) ?></p>
<p><i>Posted on: <?= $post['created_at'] ?></i></p>

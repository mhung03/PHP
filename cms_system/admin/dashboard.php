<?php
    require '../db.php';
    require '../functions.php';
    require_login();

    $posts = $pdo->query("Select * from posts order by created_at desc")-> fetchAll();
?>
<h2>Manage Posts</h2>
<a href="create.php">Create New Post</a>
<table border="1">
    <tr><th>Title</th><th>Actions</th></tr>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= e($post['title']) ?></td>
            <td>
                <a href="edit.php?id=<?= $post['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $post['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="../index.php">Trang tin tức</a>
<?php
    require 'db.php';
    require 'functions.php';

    $posts = $pdo->query("Select id,title,created_at from posts order by created_at desc")->fetchall();
?>

<h2>Articles</h2>
<?php foreach ($posts as $post): ?>
    <div>
        <a href="post.php?id=<?= $post['id'] ?>"><?= e($post['title']) ?></a>
        (<?= $post['created_at'] ?>)
    </div>
<?php endforeach; ?>
<a href="./admin/dashboard.php">Quay về giao diện quản trị</a><br>
<a href="logout.php">Đăng xuất</a>

<?php 
    require 'db.php';

    $stmt = $pdo -> query("Select * from users order by id DESC");
    $users = $stmt->fetchall();
?>

<h2>Danh sách người dùng</h2>
<a href="create.php">Thêm người dùng</a>
<table border="1" cellpadding= "8">
    <tr>
        <th>ID</th><th>Tên</th><th>Email</th><th>Ngày tạo</th><th>Hành động</th>
    </tr>
    <?php foreach($users as $u): ?>
    <tr>
        <td><?= $u['id'] ?></td>
        <td><?= htmlspecialchars($u['name']) ?></td>
        <td><?= htmlspecialchars($u['email']) ?></td>
        <td><?= $u['created_at'] ?></td>
        <td>
            <a href="edit.php?id=<?= $u['id']?>">Sửa</a>
            <a href="delete.php?id=<?= $u['id']?>" onclick="return confirm('Xóa ?')">Xóa</a>
        </td>
    </tr>
    <?php endforeach ?>
</table>
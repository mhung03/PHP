<?php 
    require 'db.php';
    $id = $_GET['id'];
    $stmt = $pdo->prepare('Delete from users where id =?');
    $stmt->execute([$id]);

    header('Location: index.php')
?>
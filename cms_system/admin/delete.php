<?php
    require '../db.php';
    require '../functions.php';
    require_login();

    $id = $_GET['id'] ?? null;
    if(!$id || !is_numeric($id)) die("Invalid ID");

    $stmt = $pdo->prepare("Delete from posts where id =?");
    $stmt-> execute([$id]);
    header("Location: dashboard.php");
    exit;
?>
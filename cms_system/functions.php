<?php 
    session_start();
    function is_logged_in() {
        return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true;
    }
    function require_login() {
        if(!is_logged_in()) {
            header('Location: /login.php');
            exit;
        }
    }
    function csrf_token() {
        if(empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
    function validate_csrf($token) {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
    function e($str) {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }
?>
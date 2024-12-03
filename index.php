<?php

session_start();
require_once 'config/database.php';
require_once 'model/User.php';
require_once 'controller/UserController.php';

// Routing
if ($_SERVER['REQUEST_URI'] === '/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $userModel = new User($db);
    $userController = new UserController($userModel);
    $error = $userController->login($_POST['username'], $_POST['password']);
    if ($error) {
        include 'views/login.php';
    }
} elseif ($_SERVER['REQUEST_URI'] === '/login') {
    include 'views/login.php';
} elseif ($_SERVER['REQUEST_URI'] === '/dashboard' && isset($_SESSION['user_id'])) {
    include 'views/dashboard.php';
} else {
    header("Location: /login");
}



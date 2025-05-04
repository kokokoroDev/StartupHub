<?php
    require_once __DIR__ . '/../../models/user.php';
    require_once __DIR__ . '/../../models/session.php';
    include __DIR__ . '/../../partials/header.php';

    RedirectIfLoggedIn();

    $error = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        
        $result = login($email, $password);
        if ($result) {

            header("Location: index.php?action=profile");
            exit('Successfully signed up! You can now log in.');
        } elseif ($result === false) {
            $error = "email or password not correct.";
        }else {
            $error = "An error occurred during signup. Please try again.";
        }
    }

    require_once __DIR__ . '/../../Vues/auth/login.php';
?>
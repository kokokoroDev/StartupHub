<?php
    require_once __DIR__ . '/../../models/user.php';
    include __DIR__ . '/../../partials/header.php';

    RedirectIfLoggedIn();

    $error = '';
    $old = [
        'nom' => '',
        'prenom' => '',
        'adresse' => '',
        'email' => ''
    ];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $confirmPassword = htmlspecialchars($_POST['confirm_password']);

        
        if ($password !== $confirmPassword) {
            
            $old['nom'] = $nom;
            $old['prenom'] = $prenom;
            $old['adresse'] = $adresse;
            $old['email'] = $email;

            $error = "Passwords do not match.";
            
        } else {
            $result = signup($nom, $prenom , $adresse , $email, $password);
            if ($result) {
                header("Location: index.php?action=login");
                exit('Successfully signed up! You can now log in.');
            } elseif ($result === false) {
                $old['nom'] = $nom;
                $old['email'] = $email;
                $error = "Username or email already exists.";
            }else {
                $error = "An error occurred during signup. Please try again.";
            }
        }
    }

    require_once __DIR__ . '/../../Vues/auth/signup.php';
?>
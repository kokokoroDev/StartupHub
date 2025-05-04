<?php
    require_once 'db.php';

    function checkLoggedIn() {
        if (!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin'] !== true) {
            header('Location: Vues/Login.php');
            exit();
        }
    }
    function RedirectIfLoggedIn() {
        if (isset($_SESSION['Loggedin']) && $_SESSION['Loggedin'] === true) {
            header('Location: index.php?action=profile');
            exit();
        }
    }

    
    function isprofileowner($id, $userId) {
        return $id === $userId;
    }
    
    function getUserById($id) {
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    function updateProfile($id, $nom, $prenom, $adresse, $email, $title, $about, $profile_picture_path) {
        $pdo = getConnection();
        $stmt = $pdo->prepare("UPDATE users SET nom = ?, prenom = ?, adresse = ?, email = ?, title = ?, about_me = ? , profile_picture = ?  WHERE id = ?");
        return $stmt->execute([$nom, $prenom, $adresse, $email, $title,  $about, $profile_picture_path, $id]);
    }
    
    
    function signup($nom , $prenom , $adresse, $email, $password) {
        $pdo = getConnection();
        $stmt = $pdo->prepare("INSERT INTO users (nom, prenom , adresse , email, mot_de_passe) VALUES (?,?,?,?,?)");
        return $stmt->execute([$nom, $prenom , $adresse , $email, password_hash($password, PASSWORD_BCRYPT)]);
    }
    
    function login($email,$password) {
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['mot_de_passe'])) {
            session_regenerate_id(true);
            $_SESSION['Loggedin'] = true;
            $_SESSION['user_id'] = $user['id'];
            return true;
        } else {
            return false;
        }
    }

?>
<?php
    require_once 'db.php';

    function checkLoggedIn() {
        if (!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin'] !== true) {
            header('Location: index.php?action=login');
            exit();
        }
    }
    function RedirectToProfileIfLoggedIn() {
        if (isset($_SESSION['Loggedin']) && $_SESSION['Loggedin'] === true) {
            header('Location: index.php?action=profile');
            exit();
        }
    }


    function checkLoggedInNoRedirect(){
        if (!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin'] !== true) {
            return false;
        }
        return true;
    }
    
    function isprofileowner($id, $userId) {
        return $id === $userId;
    }
    
    function getUserById($id) {
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT nom, prenom, id, profile_picture, title, about_me, adresse, email FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
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

    function GetProjectRealOwner($ProjectId){
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT u.nom, u.prenom, u.profile_picture, u.id FROM projects p Join users u
         On u.id = p.user_id  WHERE p.id = ?");
        $stmt->execute([$ProjectId]);
        return $stmt->fetch();
    }

?>
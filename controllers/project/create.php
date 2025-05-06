<?php 
    require_once __DIR__  . '/../../models/session.php';
    require_once __DIR__  . '/../../models/user.php';
    require_once __DIR__  . '/../../models/project.php';
    
    checkLoggedIn();
    
    $loggeduserid = intval(htmlspecialchars($_SESSION['user_id']));
    
    
    
    
    
    
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $titre = htmlspecialchars(trim($_POST['titre'] ?? ''));
        $description = htmlspecialchars(trim($_POST['description'] ?? ''));
        $membres_voulus = intval($_POST['membres_voulus']);
        
        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
            $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            
            if(in_array($file_extension, $allowed_extensions)) {
                $new_filename = uniqid() . '.' . $file_extension;
                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $new_filename);
                $profile_picture_path = 'uploads/' . $new_filename;
            } else {
                $_SESSION['error'] = "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
                header("Location: index.php?action=dashboard");
                exit();
            }
        }
        
        if(InsertProject($loggeduserid, $titre, $description, $profile_picture_path, $membres_voulus) === false) {
            $_SESSION['message'] = "An error occurred during profile update. Please try again.";
        } else {
            $_SESSION['message'] = "Profile updated successfully.";
        }
        header("Location: index.php?action=dashboard");
        exit();
        
    }
    
    
    include __DIR__ . '/../../partials/header.php';
    require __DIR__  . '/../../Vues/Project/createvue.php';


?>

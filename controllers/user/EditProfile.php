<?php
    require_once __DIR__  . '/../../models/user.php';
    require_once __DIR__  . '/../../models/session.php';
    require_once __DIR__  . '/../../models/project.php';

    checkLoggedIn();

    $loggeduserid = intval(htmlspecialchars($_SESSION['user_id']));
    $profileID = isset($_GET['id']) ? intval(htmlspecialchars($_GET['id'])) : $loggeduserid;
    
    
    $IsOwner =  isprofileowner($profileID, $loggeduserid);
    $user = getUserById($loggeduserid);

    $error = $_SESSION['error'] ?? null;
    unset($_SESSION['error']);

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = htmlspecialchars($_POST['nom']); 
        $prenom = htmlspecialchars($_POST['prenom']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $email = htmlspecialchars($_POST['email']);
        $Title = htmlspecialchars($_POST['title']);
        $about = htmlspecialchars($_POST['about_me']);

        if(isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
            $file_extension = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);

            if(in_array($file_extension, $allowed_extensions)) {
                $new_filename = uniqid() . '.' . $file_extension;
                move_uploaded_file($_FILES['profile_picture']['tmp_name'], 'uploads/' . $new_filename);
                $profile_picture_path = '/../../uploads/' . $new_filename;
            } else {
                $_SESSION['error'] = "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
                header("Location: index.php?action=editprofile");
                exit();
            }
        }

        
        if(updateProfile($loggeduserid, $name, $prenom , $adresse, $email, $Title, $about, $profile_picture_path) === false) {
            $_SESSION['message'] = "An error occurred during profile update. Please try again.";
        } else {
            $_SESSION['message'] = "Profile updated successfully.";
        }
        header("Location: index.php?action=profile");
        exit();
    }

    require __DIR__  . '/../../Vues/User/editprofilevue.php';

?>
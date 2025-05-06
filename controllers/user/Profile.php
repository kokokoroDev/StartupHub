<?php
    require_once __DIR__  . '/../../models/session.php';
    require_once __DIR__  . '/../../models/user.php';
    require_once __DIR__  . '/../../models/project.php';
    require_once __DIR__  . '/../../models/contribution.php';
    include __DIR__ . '/../../partials/header.php';


    $message = $_SESSION['message'] ?? null;

    unset($_SESSION['message']);

    $status = checkLoggedInNoRedirect();
    
    if($status){
        $loggeduserid = intval(htmlspecialchars($_SESSION['user_id']));
        $profileID = isset($_GET['id']) ? intval(htmlspecialchars($_GET['id'])) : $loggeduserid;
        $IsOwner =  isprofileowner($profileID, $loggeduserid);
    }else{
        $profileID = isset($_GET['id']) ? intval(htmlspecialchars($_GET['id'])) : null;
        
    }
    
    if(isset($profileID)){
        $user = getUserById($profileID);
    }else{
        header('Location: index.php?action=error');
        exit;
    }

    
    
    
    if(isset($IsOwner) && $IsOwner){
        checkLoggedIn();
    }
    if(!$user ){
            $_SESSION['message'] = 'not found';
            header('Location: index.php?action=error');
            exit;
        }
    
    $ProjectCount = getProjectCountByUserId($profileID);
    $ContributionsCount = getContributionsCountByUserId($profileID);

    $profileProjects = get3ProjectsByUserId($profileID);
    $profileContributions = get3ContributionsByUserId($profileID);	


    require __DIR__  . '/../../Vues/User/profilevue.php';
?>
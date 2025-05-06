<?php 
    require_once __DIR__  . '/../../models/session.php';
    require_once __DIR__  . '/../../models/user.php';
    require_once __DIR__  . '/../../models/project.php';
    require_once __DIR__  . '/../../models/contribution.php';

    checkLoggedIn();


    $loggeduserid = intval(htmlspecialchars($_SESSION['user_id']));
    $ProjectID = isset($_GET['id']) ? intval(htmlspecialchars($_GET['id'])) : null;

    

    if($ProjectID){
        if(!CheckIFContribution($ProjectID, $loggeduserid)){
            contribute($ProjectID,$loggeduserid);
            $_SESSION['message'] = 'Avec succes!';
        }else{
            $_SESSION['message'] = 'Already Contibuting!';
        }
    }else{
        $_SESSION['message'] = 'Not Found!';
    }
    
    
    header("Location: index.php?action=project&id=". $ProjectID);
    exit();
?>
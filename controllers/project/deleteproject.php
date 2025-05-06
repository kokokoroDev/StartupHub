<?php
    require_once __DIR__  . '/../../models/session.php';
    require_once __DIR__  . '/../../models/user.php';
    require_once __DIR__  . '/../../models/project.php';

    checkLoggedIn();

    $ProjectID = isset($_GET['id']) ? intval(htmlspecialchars($_GET['id'])) : null;

    if($ProjectID){
        DeleteProject($ProjectID);
        $_SESSION['message'] = 'Avec succes!';
    }else{
        $_SESSION['message'] = 'Not Found!';
    }
    
    
    header('Location: index.php?action=dashboard');
    exit();
?>
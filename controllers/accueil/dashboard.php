<?php
    require_once __DIR__  . '/../../models/session.php';
    require_once __DIR__  . '/../../models/user.php';
    require_once __DIR__  . '/../../models/project.php';
    require_once __DIR__  . '/../../models/contribution.php';
    include __DIR__ . '/../../partials/header.php';
    
    checkLoggedIn();
    
    $message = $_SESSION['message'] ?? null;
    unset($_SESSION['message']);

    
    // Check if the user is logged in

    $loggeduserid = intval(htmlspecialchars($_SESSION['user_id']));
    $profileID = isset($_GET['id']) ? intval(htmlspecialchars($_GET['id'])) : $loggeduserid;

    $pageP = (isset($_GET['pageP']) && is_numeric($_GET['pageP'])) ? (int)$_GET['pageP'] : 1;
    $offsetP = ($pageP-1)*5;
    
    $pageC = (isset($_GET['pageC']) && is_numeric($_GET['pageC'])) ? (int)$_GET['pageC'] : 1;
    $offsetC = ($pageC-1)*5;
  
  
    $IsOwner =  isprofileowner($profileID, $loggeduserid);

    $user = getUserById($loggeduserid);

    // counts

    $ProjectCount = getProjectCountByUserId($profileID);
    $ContributionsCount = getContributionsCountByUserId($profileID);
    $SavedCount = getSavedCountByUserId($profileID);


    // Projects & contributions by page
    $profileProjects = getProfileProjectPagination($profileID,5,$offsetP);
    $profileContributions = getContributionPagination($profileID,5,$offsetC);	


    require __DIR__  . '/../../Vues/accueil/dashboardvue.php';


?>
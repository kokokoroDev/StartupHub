<?php
    require_once __DIR__  . '/../../models/user.php';
    require_once __DIR__  . '/../../models/session.php';
    require_once __DIR__  . '/../../models/project.php';
    include __DIR__ . '/../../partials/header.php';


    $message = $_SESSION['message'] ?? null;

    unset($_SESSION['message']);

    
    // Check if the user is logged in
    checkLoggedIn();

    $loggeduserid = intval(htmlspecialchars($_SESSION['user_id']));
    $profileID = isset($_GET['id']) ? intval(htmlspecialchars($_GET['id'])) : $loggeduserid;
    
    
    $IsOwner =  isprofileowner($profileID, $loggeduserid);
    $user = getUserById($loggeduserid);

    $ProjectCount = getProjectCountByUserId($profileID);
    $ContributionsCount = getContributionsByUserId($profileID);

    $profileProjects = get3ProjectsByUserId($profileID);
    $profileContributions = get3ContributionsByUserId($profileID);	


    require __DIR__  . '/../../Vues/User/profilevue.php';
?>
<?php
    require_once __DIR__  . '/../../models/session.php';
    require_once __DIR__  . '/../../models/user.php';
    require_once __DIR__  . '/../../models/project.php';
    require_once __DIR__  . '/../../models/contribution.php';
    include __DIR__ . '/../../partials/header.php';
    
    $status = checkLoggedInNoRedirect();

    $message = $_SESSION['message'] ?? null;
    unset($_SESSION['message']);


    if($status){
        $loggeduserid = intval(htmlspecialchars($_SESSION['user_id']));
    }
    
    $ProjectID = isset($_GET['id']) ? intval(htmlspecialchars($_GET['id'])) : null ;

    


    if(isset($ProjectID)){
        if(getProjectById($ProjectID)){
            $project = getProjectById($ProjectID);
        }else{
            $_SESSION['message'] = 'Project Not Found!';
            header('Location: index.php?action=dashboard');
            exit();
        }
    }else{
        $_SESSION['message'] = 'Project Not Found!';
        if($status){
            header('Location: index.php?action=accueil');
        }else{
            header('Location: index.php?action=dashboard');
        }
        exit();
    }
    if($status){
        $isOwner = CheckifOwner($ProjectID,$loggeduserid);
        if(!$isOwner){
            $RealOwner = GetProjectRealOwner($ProjectID);
            $IsContributing = CheckIFContribution($ProjectID,$loggeduserid);
            if($IsContributing){
                $ContributionStatus = GetContributionStatus($ProjectID,$loggeduserid);
            }
        }else{
            $LoggedUserInfo = getUserById($loggeduserid);
            $ContributionRequests = GetContributionRequestList($ProjectID);
        }
    }else{
        $RealOwner = GetProjectRealOwner($ProjectID);
    }

    $memberscount = GetMembersByProjectID($ProjectID);
    if($memberscount > 0){
        $membersList = GetMembersList($ProjectID);
    }
    


    

    require_once __DIR__ . '/../../Vues/Project/detailvue.php';
?>
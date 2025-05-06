<?php
        require_once __DIR__  . '/../../models/session.php';
        require_once __DIR__  . '/../../models/user.php';
        require_once __DIR__  . '/../../models/project.php';
        require_once __DIR__  . '/../../models/contribution.php';

        $action = $_POST['action'] ?? null;  
        $userID = isset($_POST['user_id']) ? intval($_POST['user_id']) : null;
        $ProjectID = isset($_POST['project_id']) ? intval($_POST['project_id']) : null;
        
        checkLoggedIn();

        // var_dump($_POST);
        var_dump($userID);
        var_dump($ProjectID);
        

        if ($action === 'accept_contribution') {
            if (UpdateMemberStatus($ProjectID, $userID, 'accepté')) {
                $_SESSION['message'] = 'Effectue!';
                header("Location: index.php?action=project&id=" . $ProjectID);
                exit;
            } else {
                $_SESSION['message'] = 'Try Again!';
                header("Location: index.php?action=project&id=" . $ProjectID);
                exit;
            }
        } elseif ($action === 'reject_contribution') {
            if (UpdateMemberStatus($ProjectID, $userID, 'refusé')) {
                $_SESSION['message'] = 'Effectue!';
                header("Location: index.php?action=project&id=" . $ProjectID);
                exit;
            } else {
                $_SESSION['message'] = 'Try Again!';
                header("Location: index.php?action=project&id=" . $ProjectID);
                exit;
            }
        } else {
            $_SESSION['message'] = 'An Error occurred';
            header("Location: Vues/ErrorVue.php");
            exit;
        }
        



?>
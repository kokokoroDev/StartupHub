<?php
function handleRequest() {
    try {
        $action = isset($_GET['action']) ? $_GET['action'] : 'home';
        $action = htmlspecialchars($action, ENT_QUOTES, 'UTF-8');

        switch ($action) {
            case 'home':
                if (file_exists("controllers/accueil/accueil.php")) {
                    require "controllers/accueil/accueil.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;

            case 'signup':
                if (file_exists("controllers/auth/signup.php")) {
                    require "controllers/auth/signup.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;

            case 'logout':
                if (file_exists("controllers/auth/logout.php")) {
                    require "controllers/auth/logout.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;

            case 'login':
                
                if (file_exists("controllers/auth/login.php")) {
                    require "controllers/auth/login.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;

            case 'profile':
                
                if (file_exists("controllers/user/profile.php")) {
                    require "controllers/user/profile.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;

            case 'editprofile':
                
                if (file_exists("controllers/user/EditProfile.php")) {
                    require "controllers/user/EditProfile.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;

            case 'createproject':
                if (file_exists("controllers/project/Create.php")) {
                    require "controllers/project/Create.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;

            case 'dashboard':
                if (file_exists("controllers/accueil/dashboard.php")) {
                    require "controllers/accueil/dashboard.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;

            default:
                
                throw new Exception('Action not recognized!');
        }
    } catch (Exception $e) {
        $msgErreur = $e->getMessage();
        require 'Vues/ErrorVue.php';  
    }
}
?>
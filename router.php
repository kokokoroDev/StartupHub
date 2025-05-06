<?php
function handleRequest() {
    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
            $action = $_POST['action'] ?? 'home';
        } else {
            $action = $_GET['action'] ?? 'home';
        }
        $action = htmlspecialchars($action, ENT_QUOTES, 'UTF-8');

        

        switch ($action) {
            case 'home':
                if (file_exists("controllers/accueil/accueil.php")) {
                    require_once "controllers/accueil/accueil.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;

            case 'signup':
                if (file_exists("controllers/auth/signup.php")) {
                    require_once "controllers/auth/signup.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;

            case 'project':
                if (file_exists("controllers/project/detail.php")) {
                    require_once "controllers/project/detail.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;

            case 'logout':
                if (file_exists("controllers/auth/logout.php")) {
                    require_once "controllers/auth/logout.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;

            case 'login':
                
                if (file_exists("controllers/auth/login.php")) {
                    require_once "controllers/auth/login.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;

            case 'profile':
                
                if (file_exists("controllers/user/profile.php")) {
                    require_once "controllers/user/profile.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;

            case 'editprofile':
                
                if (file_exists("controllers/user/EditProfile.php")) {
                    require_once "controllers/user/EditProfile.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;

            case 'contribute':
                if (file_exists("controllers/project/contribute.php")) {
                    require_once "controllers/project/contribute.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;

            case 'create':
                if (file_exists("controllers/project/create.php")) {
                    require_once "controllers/project/create.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;

            case 'delete':
                if (file_exists("controllers/project/deleteproject.php")) {
                    require_once "controllers/project/deleteproject.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;


            case 'accept_contribution':
                case 'reject_contribution' :
                    if (file_exists("controllers/project/handle_contribution.php")) {
                        require_once "controllers/project/handle_contribution.php";
                    } else {
                        throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                    }
                    break;

            case 'browse':
                if(file_exists('controllers/accueil/browse.php')){
                    require_once "controllers/accueil/browse.php";
                }else{
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;


            case 'dashboard':
                if (file_exists("controllers/accueil/dashboard.php")) {
                    require_once "controllers/accueil/dashboard.php";
                } else {
                    throw new Exception('Page not found: '. $_SERVER['SCRIPT_NAME']);
                }
                break;

            default:
                
                throw new Exception('Action not recognized!');
        }
    } catch (Exception $e) {
        $msgErreur = $e->getMessage();
        require_once 'Vues/ErrorVue.php';  
    }
}
?>
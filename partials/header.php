<?php
    require_once __DIR__ . '/../models/session.php';
    require_once __DIR__ . '/../models/user.php';
    

    $useroption = true;
    if(!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin'] !== true){
        $useroption = false;
    };

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
        <div>
            <div>
                <a href="index.php?action=<?= $useroption ? 'dashboard' : 'home' ?>">Logo</a>
            </div>
            <nav>
                <ul>
                    <?php if(!$useroption) :?>
                        <li><a href="index.php?action=home">Home</a></li>
                        <?php else: ?>
                        <li><a href="index.php?action=dashboard">dashboard</a></li>
                        <?php endif ?>
                    <li><a href="index.php?action=projects">Browse Ideas</a></li>
                    <?php if($useroption): ?>
                        <li><a href="index.php?action=create">Post idea</a></li>
                        <li><a href="index.php?action=profile">Profile</a></li>
                        <li><a href="index.php?action=logout">Logout</a></li>
                    <?php else: ?>
                        <li><a href="index.php?action=login">Login</a></li>
                        <li><a href="index.php?action=signup">Sign Up</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
</body>
</html>
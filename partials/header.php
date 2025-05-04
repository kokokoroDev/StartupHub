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
    <header class="header">
        <div class="container">
            <div class="logo">
                <a href="index.php?action=home">Logo</a>
            </div>
            <nav class="navbar">
                <ul class="nav-list">
                    <li><a href="index.php?action=home">Home</a></li>
                    <li><a href="index.php?action=projects">Browse Ideas</a></li>

                    <?php if($useroption): ?>
                        <li><a href="index.php?action=dashboard">dashboard</a></li>
                    <?php else: ?>
                    <?php endif; ?>
                    <?php if($useroption): ?>
                        <li><a href="index.php?action=profile&id=<?= $_SESSION['user_id']; ?>">Post idea</a></li>
                        <li><a href="index.php?action=profile&id=<?= $_SESSION['user_id']; ?>">Profile</a></li>
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
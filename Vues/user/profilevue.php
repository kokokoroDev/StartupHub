<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $user['nom'] ?>'s Profile - StartupHub</title>
    <link rel="stylesheet" href="public/css/css.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <img class="profile-picture" src="<?= $user['profile_picture'] ?? '' ?>" width="100" height="100"  alt="Profile Pict usrte">
            <h1><?= $user['nom'] ?> <?= $user['prenom'] ?></h1>
            <?php if($user['title']) : ?>
                <h2><?= $user['title'] ?></h2>
            <?php endif; ?>
            <?php if(isset($IsOwner) && $IsOwner ) : ?>
                <a href="index.php?action=editprofile">Edit Profile</a>
            <?php endif; ?>

            <div class="profile-stats">
                <div class="stat-item">
                    <p><?= $ProjectCount ?></p>
                    <p>Projects</p>
                </div>
                <div class="stat-item">
                    <p><?= $ContributionsCount ?></p>
                    <p>Contributions</p>
                </div>
            </div>
        </div>

        <div class="profile-content">
            <div class="about-section">
                <h2>About</h2>
                <p><?= !empty($user['about_me']) ? $user['about_me'] : "Nothing About ". $user['nom'] ?></p>
            </div>

            <div class="main-content">
                <div class="projects-section">
                    <h2>Latest Projects: </h2>
                    <div class="projects">
                        <?php if(empty($profileProjects)) : ?>
                            <p>No projects available.</p>
                        <?php else: ?>
                            <?php foreach ($profileProjects as $project): ?>
                                <div class="project-card">
                                    <h3><?= htmlspecialchars($project['titre']) ?></h3>
                                    <p>Created on: <?= htmlspecialchars($project['date_creation']) ?></p>  
                                    <p><?= htmlspecialchars($project['description']) ?></p>
                                    <a href="index.php?action=project&id=<?= $project['id'] ?>">View Project</a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="contributions-section">
                    <h2>Latest Contributions: </h2>
                    <div class="contributions">
                        <?php if(empty($profileContributions)) : ?>
                            <p>No Contributions available.</p>
                        <?php else: ?>
                            <?php foreach ($profileContributions as $contribution): ?>
                                <div class="contribution-card">
                                    <h3><?= htmlspecialchars($contribution['titre']) ?></h3>
                                    <span class="status"><?= htmlspecialchars($contribution['description']) ?></span>
                                    <p>Created on: <?= htmlspecialchars($contribution['date_creation']) ?></p>  
                                    <p><?= htmlspecialchars($contribution['description']) ?></p>
                                    <a href="index.php?action=project&id=<?= $contribution['id'] ?>">View Project</a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Message">
        <h1><?= $message ?></h1>

    </div>
</body>
</html>
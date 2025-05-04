<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <div>
            <img src="<?= $user['profile_picture'] ?? '' ?>" alt="Profile Picture" style="width: 100px; height: 100px;">
            <h1><?= $user['nom'] ?> <?= $user['prenom'] ?> </h1>
            <?php  if($user['title']) :  ?>
                <h2><?= $user['title'] ?></h2>
            <?php endif; ?>
            <?php if($IsOwner) : ?>
                <a href="index.php?action=editprofile">Edit Profile</a>
            <?php endif; ?>

        </div>
        <div>
            <div>
                <p><?= $ProjectCount ?></p>
                <p>Projects</p>
            </div>
            <div>
                <p> <?= $ContributionsCount ?> </p>
                <p> Contributions </p>
                </div>
        </div>
    </div>

    <div class='all'>
        <div>
            <div>
                <h2>About</h2>
                <p><?= !empty($user['about_me']) ? $user['about_me'] : "Nothing About ". $user['nom'] ?></p>
            </div>
    
        </div>
        <div>
            <div>
                <h2>Projects</h2>
                <div class="projects">
                    <?php if(empty($profileProjects) ) : ?>

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
            <div>
                <h2>Contributions</h2>
                <div class="contributions">
                <?php if(empty($profileProjects) ) : ?>
                    <p>No Contributions available.</p>
                <?php else: ?>
                    <?php foreach ($profileContributions as $contribution): ?>
                        <div class="contribution-card">
                            <h3><?= htmlspecialchars($contribution['titre']) ?></h3>
                            <p><?= htmlspecialchars($contribution['status']) ?></p>  
                            <p>Created on: <?= htmlspecialchars($contribution['date_creation']) ?></p>  
                            <p><?= htmlspecialchars($contribution['description']) ?></p>
                            <a href="index.php?action=project&id=<?= $project['id'] ?>">View Project</a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                </div>
            </div>
    </div>


</body>
</html>
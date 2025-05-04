<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StartupHub</title>
</head>
<body>
    <header>
        <h1>StartupHub</h1> 
        <div>
            <a href="index.php?action=signup">Sign Up</a>
            <a href="index.php?action=login">Login</a>
        </div>
    </header>
    <div>
        <h1>Team Up with Trainees to Build Real-World Projects</h1>
        <h3>Collaborate with passionate minds and turn your vision into reality</h3>
        <div>
            <a href="index.php?action=createproject">Share Your Idea</a>
            <a href="index.php?action=exploreprojects">Browse Projects</a>
        </div>
    </div>
    <div class="latest_Ps">
        <h2>Latest Projects</h2>
        <div class="projects">
            <?php if (is_string($latestProjects)): ?>

                <p><?= htmlspecialchars($latestProjects) ?></p>
            <?php else: ?>
               <?php foreach ($latestProjects as $project): ?>
                    <div class="project">
                        <h3><?= htmlspecialchars($project['title']) ?></h3>
                        <p><?= htmlspecialchars($project['description']) ?></p>
                        <a href="ProjectDetails.php?id=<?= $project['id'] ?>">View Details</a>
                    </div>
                <?php endforeach; ?>
        <?php endif; ?>
        </div>


    </div>
</body>
</html>
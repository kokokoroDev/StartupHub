<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StartupHub</title>
    <link rel="stylesheet" href="public/css/css.css">
</head>
<body>
    <div class="hero-section">
        <div class="hero-content">
            <h1>Team Up with Trainees to Build Real-World Projects</h1>
            <h3>Collaborate with passionate minds and turn your vision into reality</h3>
            <div class="hero-buttons">
                <a href="index.php?action=createproject" class="btn btn-primary">Share Your Idea</a>
                <a href="index.php?action=exploreprojects" class="btn btn-secondary">Browse Projects</a>
            </div>
        </div>
    </div>

    <div class="latest-projects">
        <div class="container">
            <h2>Latest Projects</h2>
            <div class="projects-grid">
                <?php if (is_string($latestProjects)): ?>
                    <p class="no-projects"><?= htmlspecialchars($latestProjects) ?></p>
                <?php else: ?>
                    <?php foreach ($latestProjects as $project): ?>
                        <div class="project-card">
                            <div class="project-content">
                                <h3><?= htmlspecialchars($project['titre']) ?></h3>
                                <p><?= htmlspecialchars($project['description']) ?></p>
                                <a href="index.php?action=project&id=<?= $project['id'] ?>" class="btn btn-outline">View Details</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
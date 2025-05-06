<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div>
        <div>
            <div>
                <h1>Welcome back, <?= htmlspecialchars($user['nom']) ?></h1>
                <p>Here's what's happening with your ideas and participations</p>
            </div>
            <a href="index.php?action=create">New Idea</a>
        </div>
    
        <div>
            <div>
                <div>
                    <h1><?= $ProjectCount ?></h1>
                    <h3>My Ideas</h3>
                </div>
                <div>
                    <h1><?= $ContributionsCount ?></h1>
                    <h3>Participated in</h3>
                </div>
                <div>
                    <h1><?= $SavedCount ?></h1>
                    <h3>Saved</h3>
                </div>
            </div>
        </div>
    
        <div>
            <div>
                <div>
                    <h2>My Projects</h2>
                </div>
                <?php if(!empty($profileProjects)) : ?>
                    <div>
                        <?php foreach($profileProjects as $project): ?>
                            <div>
                                <div>
                                    <h3><?= htmlspecialchars($project['titre']) ?></h3>
                                    <div>
                                        <span>Created on: <?= htmlspecialchars($project['date_creation']) ?></span>
                                    </div>
                                    <p><?= htmlspecialchars($project['description']) ?></p>
                                    <a href="index.php?action=project&id=<?= $project['id'] ?>">View Project</a>
                                    <a onclick='return confirm("Are you sure?")' href="index.php?action=delete&id=<?= $project['id'] ?>">Delete Project</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div>
                        <?php 
                            $totalPages = ceil($ProjectCount / 5);
                            
                            if ($pageP > 1) {
                                echo '<a href="?action=dashboard&pageP=' . ($pageP - 1) . '&pageC=' . $pageC . '">Previous</a>';
                            }
                            
                            echo '<div>';
                            for ($i = 1; $i <= $totalPages; $i++) {
                                echo '<a href="?action=dashboard&pageP=' . $i . '&pageC=' . $pageC . '">' . $i . '</a>';
                            }
                            echo '</div>';

                            if ($pageP < $totalPages) {
                                echo '<a href="?action=dashboard&pageP=' . ($pageP + 1) . '&pageC=' . $pageC . '">Next</a>';
                            }
                        ?>
                    </div>
                <?php else : ?>
                    <div>
                        <p>No projects available.</p>
                        <a href="index.php?action=create">Create Your First Project</a>
                    </div>
                <?php endif; ?>
            </div>
            
            <div>
                <div>
                    <h2>My Contributions</h2>
                </div>
                <?php if(!empty($profileContributions)) : ?>
                    <div>
                        <?php foreach($profileContributions as $contribution): ?>
                            <div>
                                <div>
                                    <h3><?= htmlspecialchars($contribution['titre']) ?></h3>
                                    <div>
                                        <span><?= htmlspecialchars($contribution['statut']) ?></span>
                                        <span>Created: <?= htmlspecialchars($contribution['date_creation']) ?></span>
                                    </div>
                                    <p><?= htmlspecialchars($contribution['description']) ?></p>
                                    <a href="index.php?action=project&id=<?= $contribution['project_id'] ?>">View Project</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div>
                        <?php 
                            $totalPages = ceil($ContributionsCount / 5);
                            
                            if ($pageC > 1) {
                                echo '<a href="?action=dashboard&pageP=' . $pageP . '&pageC=' . ($pageC - 1) . '">Previous</a>';
                            }
                            
                            echo '<div>';
                            for ($i = 1; $i <= $totalPages; $i++) {
                                echo '<a href="?action=dashboard&pageP=' . $pageP . '&pageC=' . $i . '">' . $i . '</a>';
                            }
                            echo '</div>';
                            
                            if ($pageC < $totalPages) {
                                echo '<a href="?action=dashboard&pageP=' . $pageP . '&pageC=' . ($pageC + 1) . '">Next</a>';
                            }
                        ?>
                    </div>
                <?php else : ?>
                    <div>
                        <p>No contributions available.</p>
                        <a href="index.php?action=exploreprojects">Explore Projects</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="Message">
        <h1><?= $message ?></h1>

    </div>
</body>
</html>
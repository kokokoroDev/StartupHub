<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>
<body>
    <div>
        <h1> Welcome back, <?= $user['nom'] ?> </h1>
        <p> Here's what's happening with your ideas and participations</p>
        <a href="index.php?action=create.php">New Idea</a>
    </div>
    <div>
        <div class="Stats">
            <div class="Stat">
                <h1><?= $ProjectCount ?></h1>
                <h3>My Ideas</h3>
            </div>
            <div class="Stat">
                <h1><?= $ContributionsCount ?></h1>
                <h3>Participated in</h3>
            </div>
            <div class="Stat">
                <h1><?= $SavedCount ?></h1>
                <h3>Saved</h3>
            </div>
        </div>
    </div>
    

    <div class="ALL">
        <div class="myIdeas">
            <?php if(!empty($profileProjects)) : ?>
                <?php foreach($profileProjects as $project): ?>
                    <div class="project-card">
                            <h3><?= htmlspecialchars($project['titre']) ?></h3>
                            <p>Created on: <?= htmlspecialchars($project['date_creation']) ?></p>  
                            <p><?= htmlspecialchars($project['description']) ?></p>
                            <a href="index.php?action=project&id=<?= $project['id'] ?>">View Project</a>
                        </div>
                        <?php endforeach; ?>
                        <div class="pagination">
                            <?php
                                $totalPages = ceil($totalProjects / $limit);
                                for ($i = 1; $i <= $totalPages; $i++) {
                                    echo '<a href="?page='.$i.'"'.($i == $page ? ' style="font-weight:bold;"' : '').'>'.$i.'</a> ';
                                }
                            ?>
                        </div>
                    <?php else : ?>
                        <p>No projects available.</p>
            <?php endif; ?> 
        </div>


    </div>

</body>
</html>
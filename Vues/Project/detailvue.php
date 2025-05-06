<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $project['titre'] ?> - StartupHub</title>
</head>
<body>
    <div>
        <div>
                <?php if($status): ?>
                    <!-- User is logged in -->
                    <img src="<?= $isOwner ? $LoggedUserInfo['profile_picture'] : $RealOwner['profile_picture'] ?>" width="100" alt="Profile Picture">
                    <a href="index.php?action=profile<?= $isOwner ? '' : '&id=' . $RealOwner['id'] ?>"><?= $isOwner ? 'You' : $RealOwner['nom'] . ' ' . $RealOwner['prenom'] ?></a>
                    <?php if($isOwner): ?>
                        <a href="index.php?action=modify&id=<?= $project['id'] ?>">Edit</a>
                    <?php endif; ?>
                <?php else: ?>
                    <!-- User is not logged in -->
                    <img src="<?= $RealOwner['profile_picture'] ?>" width="100" alt="Profile Picture">
                    <a href="index.php?action=profile&id=<?= $RealOwner['id'] ?>">
                        <?= $RealOwner['nom'] . ' ' . $RealOwner['prenom'] ?>
                    </a>
                <?php endif; ?>
                <p><?= $project['date_creation'] ?></p>
                <h3><?= $project['titre'] ?></h3>
                <p><?= $project['description'] ?></p>
            </div>
            <div>
                <h3>People In this Project: <?= $memberscount + 1 ?>/<?= $project['membres_voulus'] ?></h3>            
                <?php if($status) : ?>
                    <?php if($isOwner) : ?>
                        <!-- Owner sees project but no contribute button -->
                        <p>You are the owner of this project</p>
                    <?php else : ?>
                        <?php if($IsContributing): ?>
                            <?php if($ContributionStatus['statut'] === "accepté") : ?>
                                <p>You are in the team!</p>
                            <?php elseif($ContributionStatus['statut'] === "en_attente") : ?>
                                <p>You are in the waitlist!</p>
                            <?php elseif($ContributionStatus['statut'] === "refusé") : ?>
                                <p>You got rejected</p>
                            <?php endif; ?>
                        <?php else : ?>
                            <a href="index.php?action=contribute&id=<?= $project['id'] ?>">Contribute</a>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php else : ?>
                    <!-- User not logged in -->
                    <p>Please <a href="index.php?action=login">log in</a> to contribute to this project</p>
                <?php endif; ?>
            </div>
            <div>
                <?php if($status): ?>
                    <div>
                        <img src="<?= $isOwner ? $LoggedUserInfo['profile_picture'] : $RealOwner['profile_picture'] ?>" width="100" alt="Profile Picture">
                        <a href="index.php?action=profile<?= $isOwner ? '' : '&id=' . $RealOwner['id'] ?>">
                            <?= $isOwner ? 'You' : $RealOwner['nom'] . ' ' . $RealOwner['prenom'] ?>
                        </a>
                    </div>
                    <?php else: ?>
                        <div>
                            <!-- User is not logged in -->
                            <img src="<?= $RealOwner['profile_picture'] ?>" width="100" alt="Profile Picture">
                            <a href="index.php?action=profile&id=<?= $RealOwner['id'] ?>"> <?= $RealOwner['nom'] . ' ' . $RealOwner['prenom'] ?></a>
                        </div>
                        <?php endif; ?>
                        <?php if(isset($membersList)) : ?>
                            <?php foreach($membersList as $member) : ?>
                            <div>
                                <img src="<?= $member['profile_picture'] ?>" width="100" alt="Profile Picture">
                                <a href="index.php?action=profile&id=<?= $member['user_id'] ?>"> <?= $member['nom'] . ' ' . $member['prenom'] ?></a>
                            </div>
                    <?php endforeach; ?>
                    
                <?php endif ?>


            </div>  
        </div>
        <?php if($status) : ?>
            <?php if($isOwner) : ?>
            <div class="Contribution-list">
                <h1>Contribution requests:</h1>
                <?php if(!empty($ContributionRequests)) : ?>
                    <div>
                        <?php foreach($ContributionRequests as $request ) : ?>
                            <div> 
                                <img src="<?= $request['profile_picture'] ?>" width='100' alt="">
                                <a href="index.php?action=profile&id=<?= $request['user_id'] ?>"><?= $request['nom'] . ' ' . $request['prenom'] ?></a>
                                <form action="index.php" method="POST">
                                    <input type="hidden" name="action" value="accept_contribution">
                                    <input type="hidden" name="project_id" value="<?= $request['project_id'] ?>">
                                    <input type="hidden" name="user_id" value="<?= $request['user_id'] ?>">
                                    <button type="submit">Accept</button>
                                </form>
                                <form action="index.php" method="POST">
                                    <input type="hidden" name="action" value="reject_contribution">
                                    <input type="hidden" name="project_id" value="<?= $request['project_id'] ?>">
                                    <input type="hidden" name="user_id" value="<?= $request['user_id'] ?>">
                                    <button type="submit">Reject</button>
                                </form>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <?php else: ?>
                        <p>No contributions</p>
                <?php endif; ?>
            </div>
            <?php endif ?>
        <?php endif ?>
        
    </div>
    <?php if(!empty($message)) : ?>
        <div>
            <h1><?= $message ?></h1>
        </div>
    <?php endif ?>



</body>
</html>
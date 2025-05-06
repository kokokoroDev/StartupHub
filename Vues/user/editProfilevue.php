<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="public/css/css.css">
</head>
<body>
    <div class="edit-profile-container">
        <div class="edit-profile-card">
            <h1>Edit Your Profile</h1>

            <?php if (isset($error)) : ?>
                <div class="error-message"><?= $error ?></div>
            <?php endif; ?>

            <form method="post" enctype="multipart/form-data" class="edit-profile-form">
                <div class="form-group profile-picture-section">
                    <label for="profile_picture">Profile Picture</label>
                    <div class="profile-picture-upload">
                        <?php if (!empty($user['profile_picture'])) : ?>
                            <img src="<?= htmlspecialchars($user['profile_picture']) ?>" alt="Profile Picture" class="current-profile-pic">
                        <?php endif; ?>
                        <div class="upload-container">
                            <input type="file" id="profile_picture" name="profile_picture" value="<?= $user['profile_picture'] ?>" accept="image/*">
                            <input type="hidden" name="existing_profile_picture" value="<?= $user['profile_picture'] ?? 'public/images/default.png' ?>">
                            <label for="profile_picture" class="upload-label">Choose new picture</label>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="nom">First Name</label>
                        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="prenom">Last Name</label>
                        <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title">Professional Title</label>
                    <input type="text" id="title" name="title" value="<?= htmlspecialchars($user['title']) ?>" placeholder="e.g. Full Stack Developer">
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="adresse">Address</label>
                    <textarea id="adresse" name="adresse" rows="2" placeholder="Your address"><?= htmlspecialchars($user['adresse']) ?></textarea>
                </div>

                <div class="form-group">
                    <label for="about_me">About Me</label>
                    <textarea id="about_me" name="about_me" rows="4" placeholder="Tell us about yourself..."><?= htmlspecialchars($user['about_me']) ?></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    <a href="index.php?action=profile" class="btn btn-secondary">Back to Profile</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
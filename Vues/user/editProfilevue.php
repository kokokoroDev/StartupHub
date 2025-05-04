<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <h1>Edit Your Profile</h1>

    <?php if (isset($error)) : ?>
        <p style="color: red"><?= $error ?></p>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <label for="profile_picture">Profile Picture:</label>
        <input type="file" id="profile_picture" name="profile_picture" accept="image/*"><br><br>
        <?php if (!empty($user['profile_picture'])) : ?>
            <img src="<?= htmlspecialchars($user['profile_picture']) ?>" alt="Profile Picture" style="width: 100px; height: 100px;"><br><br>
        <?php endif; ?>
        <label for="nom">First Name:</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required><br><br>

        <label for="prenom">Last Name:</label>
        <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required><br><br>
        
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($user['title']) ?>"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br><br>
        
        <label for="adresse">Adresse:</label>
        <textarea id="adresse" name="adresse"><?= htmlspecialchars($user['adresse']) ?></textarea><br><br>

        <label for="about_me">About Me:</label>
        <textarea id="about_me" name="about_me"><?= htmlspecialchars($user['about_me']) ?></textarea><br><br>


        <input type="submit" value="Update Profile">
    </form>

    <a href="index.php?action=profile">Back to Profile</a>
</body>
</html>
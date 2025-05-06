<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h1>Sign Up</h1>
    <form method="POST">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?= $old['nom'] ?>" required><br><br>
       
        <label for="prenom">Prenom:</label>
        <input type="text" id="prenom" name="prenom" value="<?= $old['prenom'] ?>" required><br><br>
       
        <label for="adresse">Adresse:</label>
        <input type="adresse" id="adresse" name="adresse" value="<?= $old['adresse'] ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $old['email'] ?>" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>  

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>

        <button type="submit">Sign Up</button>
    </form>
    <p>Already have an account? <a href="index.php?action=login">Login here</a></p>
    <?php if (isset($error)): ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project</title>
    <script src="public/script.js"></script>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
  <label for="titre">Titre:</label><br>
  <input type="text" id="titre" name="titre" required><br><br>

  <label for="description">Description:</label><br>
  <textarea id="description" name="description" rows="4" required></textarea><br><br>

  <label for="image">Image:</label><br>
  <input type="file" id="image" name="image" accept="image/*"><br><br>
  
  <label for="membres_voulus">Nombre de membres souhaités (max 8):</label><br>
  <input type="number" id="membres_voulus" name="membres_voulus" min="2" max="8" value="2" required><br><br>

  <button type="submit">Créer le projet</button>
</form>
</body>
</html>
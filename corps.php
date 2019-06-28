<!DOCTYPE html>
<html>
<head>
  <title>Site</title>
  <link rel="stylesheet" href="design.css" type="text/css" title="Design" />
</head>
<form method="post" action="questionnaire.php">
<fieldset>
<legend>Coordonnées</legend>
<label for="titre">Titre : </label>
<select name="titre">
<option value="Mme" selected="selected">Madame</option>
<option value="Mlle">Mademoiselle</option>
<option value="Mr">Monsieur</option>
</select>
<label for="nom">Nom:</label>
<input type="text" name="nom" id="nom" />
<label for="prenom">Prénom:</label>
<input type="text" name="prenom" id="prenom" />
<label for="email">Email:</label>
<input type="text" name="email" id="email" />
<label for="tel">Téléphone:</label>
<input type="text" name="tel" id="tel" />
</fieldset>
<fieldset>
<legend>Centres d'intérêt</legend>
<p>
Quels sont vos centres d'intérêt <br />
<input type="checkbox" name="musique" id="musique" /> <label for="musique">musique</label>
<input type="checkbox" name="politique" id="politique" /> <label for="politique">politique</label>
<input type="checkbox" name="informatique" id="informatique" /> <label for="informatique">informatique</label>
<input type="checkbox" name="cuisine" id="cuisine" /> <label for="cuisine">cuisine</label> </p> </fieldset> <input type="submit" value="envoyer" /> </form>
</html>

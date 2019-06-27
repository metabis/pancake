<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
        <link rel="stylesheet" href="design.css" type="text/css" title="Design" />
    </head>

    <body>
<div id="global">
  <table border = 0 >
    <tr>
  <td colspan=0><div="entete" ></td>
    </tr>
   <tr>
   <td height=20px> &nbsp;  </td>
   <td >&nbsp;</td>

   </tr>
   <tr>

   <td><div id="corps">
    <form action="minichat_post.php" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form>
  </div></td>
   <td >&nbsp;</td>
  <td valign=top>
  </div></td>
   </tr>
   <tr>
   <td heigh=20px> &nbsp;  </td>
   <td >&nbsp;</td>

   </tr>
   <tr>
   <td colspan=3>
<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}

$reponse->closeCursor();

?>
</td>
 </tr>
 </table>
 </div>
 </body>
</html>

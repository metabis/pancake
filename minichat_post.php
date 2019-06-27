

<?php
// Maintenant on doit récupérer les 10 dernières entrées de la table
// On se connecte d'abord à MySQL :
mysql_connect("localhost", "root", "");
mysql_select_db("minichat");
// On utilise la requête suivante pour récupérer les 10 derniers messages :
$reponse = mysql_query("SELECT * FROM minichat ORDER BY ID DESC LIMIT 0,10");
// On se déconnecte de MySQL
mysql_close();
// Puis on fait une boucle pour afficher tous les résultats :
while($donnees = mysql_fetch_array($reponse))
{
?>

<p><strong><?php echo$donnees['pseudo']; ?></strong> : <?php echo $donnees['message']; ?></p>

<?php
}
// Fin de la boucle, le script est terminé !
header('Location: minichat.php');
?>

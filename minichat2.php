<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>


<?php
if (isset($_POST['pseudo']) and isset($_POST['message']) //Si les messages existent
    if($_POST['pseudo'] != NULL and $_POST['message'] != NULL) //Si les deux champs sont bien rempli
    //On se connecte à MySQL
    mysql_connect("localhost", "root", "");
    mysql_select_db("minichat");
    // On utilise la fonction PHP htmlentities pour éviter d'enregistrer du code HTML dans la table
    $pseudo = htmlentities ($_POST['pseudo']);
    $message = htmlentities ($_POST['message']);
    //On enregistre dans la table minichat
    mysql_query("INSERT INTO minichat VALUES('', '$pseudo', '$message')");
    //On se déconnecte de MySQL
    mysql_close();
    }
}
?>

<form action="minichat.php?message=envoyer" method="post">
Votre pseudo : <input type="text" name="pseudo" /><br />
Votre message : <input type="text" name="message" /><br />
<input type="submit" value="Envoyer" />
</form>

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
?>

</body>
</html>

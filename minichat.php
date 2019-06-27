<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>Mini-chat</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    </head>
    <style type="text/css">
    form
    {
    text-align:center;
    }
    </style>
    <body>


<?php
if (isset($_POST['pseudo']) AND isset($_POST['message'])) // Si les variables existent
{
    if ($_POST['pseudo'] != NULL AND $_POST['message'] != NULL) // Si on a quelque chose à enregistrer
    {
        // D'abord, on se connecte à MySQL
        mysql_connect("localhost", "root", "");
        mysql_select_db("minichat");

        // On utilise la fonction PHP htmlentities pour éviter d'enregistrer du code HTML dans la table
        $message = htmlentities ($_POST['message']);
        $pseudo = htmlentities ($_POST['pseudo']);

        // Ensuite on enregistre le message
        mysql_query("INSERT INTO minichat VALUES('', '$pseudo', '$message')");

        // On se déconnecte de MySQL
        mysql_close();
    }
}


// Que l'on ait enregistré des données ou pas...
// On affiche le formulaire puis les 10 derniers messages

// Tout d'abord le formulaire :
?>



<form action="minichat_post.php" method="post">
    <p>
    <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
    <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

    <input type="submit" value="Envoyer" />
</p>

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
while ($donnees = mysql_fetch_array($reponse) )
{
?>

<p><strong><?php echo $donnees['pseudo']; ?></strong> : <?php echo $donnees['message']; ?></p>



<?php
}
// Fin de la boucle, le script est terminé !
?>


    </body>
</html>

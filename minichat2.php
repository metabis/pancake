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

    <form action="minichat_post.php" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form>

<?php
if (isset($_POST['pseudo']) and isset($_POST['message']) //Si les messages existent
    if($_POST['pseudo'] != NULL and $_POST['message'] != NULL) //Si les deux champs sont bien rempli
    //On se connecte à MySQL
    mysql_connect("localhost", "root", "");
    mysql_select_db("minichat");
    // On utilise la fonction PHP htmlentities pour éviter d'enregistrer du code HTML dans la table
    $pseudo = htmlspecialchars ($_POST['pseudo']);
    $message = htmlspecialchars ($_POST['message']);
    //On enregistre dans la table minichat
    mysql_query("INSERT INTO minichat VALUES('', '$pseudo', '$message')");
    //On se déconnecte de MySQL
    mysql_close();
    }
}
?>

</body>
</html>

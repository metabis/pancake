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
    mysql_connect("mysql:host=localhost", "root", "");
    mysql_select_db("mydbtest");
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

</body>
</html>

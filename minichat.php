<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>
  <title>Site</title>
  <link rel="stylesheet" href="design.css" type="text/css" title="Design" />
</head>
<body>
<div id="global">
<table border = 0 >
  <tr>
<td><img src="banpub.png" div="entete" ></td>
  </tr>

 <tr>
   <td >&nbsp;</td>
<tr><td>
   <?php include('menu.php');
   ?></td></tr><td >&nbsp;</td>
   <?php

   try
   {
   	$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '');
   }
   catch(Exception $e)
   {
           die('Erreur : '.$e->getMessage());
   }


   $reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');


   while ($donnees = $reponse->fetch())
   {
   	echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
   }

   $reponse->closeCursor();

   ?>

   <tr>

 <td><div id="corps">
    <form action="minichat_post.php" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form>
</td></tr>
	</div>


 <tr>
 <td> <?php include('pied_de_page.php');
?></td>
 </tr>
 </table>
 </div>
 </body>
</html>

<?php
echo 'Bonjour '. $_POST['titre'].' ';
echo $_POST['nom'].' ';
echo $_POST['prenom'].'';
echo "<br>";
echo "Votre adresse mail est : ";
echo $_POST['email'].'';
echo "<br>";
echo "Et votre numéro de téléphone est : ";
echo $_POST['tel'].'';
echo "<br>";
echo "<br>";
if(isset($_POST['musique']))
{
  echo "Un grand homme";
}
if(isset($_POST['informatique']))
{
  echo "Je suis ingénieur informaticieeeennn.....";
}
if(isset($_POST['politique']))
{
  echo "Chacun son truc";
}
if(isset($_POST['cuisine']))
{
  echo "J'espere tu me feras un bon repas";
}
?>

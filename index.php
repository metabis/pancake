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
   ?></td></tr>
   <tr>

 <td><div id="corps"><?php
   include('corps.php');
    ?>
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

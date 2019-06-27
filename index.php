<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>
  <title>SkyStation</title>
  <link rel="stylesheet" href="design.css" type="text/css" title="Design" />
</head>
<body>
<div id="global">
<table border = 0 >
  <tr>
<td colspan=0><img src="banpub.png" div="entete" ></td>
  </tr>
 <tr>
 <td height=20px> &nbsp;  </td>
 <td >&nbsp;</td>

 </tr>
 <tr>

 <td><div id="corps"><?php  
   include('cutenews/show_news.php');  
    ?> 
	
	</div></td>
	 <td >&nbsp;</td>
	<td valign=top>
<?php include('menu.php');
?></div></td>
 </tr>
 <tr>
 <td heigh=20px> &nbsp;  </td>
 <td >&nbsp;</td>

 </tr>
 <tr>
 <td colspan=3> <?php include('pied_de_page.php');
?></td>
 </tr>
 </table>
 </div>
 </body>
</html>
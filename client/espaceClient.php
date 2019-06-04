<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="gestion.css">
        <title></title>
        
        
    </head>

    <body onload=init()>
		<img class= 'img1'  src="images/image2.png">
		<h1>Médiathèque</h1>
		<header>
			<div class="wrapper">
				
				<h2> Espace Adherent </h2>
				
			</div> 
	</header>
	<div class="horizontal"><h1></h1></div>
	
	<nav class= " Menu" >
			<ul>
				<li><a href="ListeEmprunt.php?id=".$_GET['id']>Liste de Mes Emprunts</a></li>
				<li><a href="listeDocuments.php">Liste des Oeuvres</a></li>
                <li><a href="reserver.php">Reservation</a></li>
				<li><a href="compte.php">Deconnexion</a></li>

			</ul>
	</nav>
    
    
    </body>
</html>


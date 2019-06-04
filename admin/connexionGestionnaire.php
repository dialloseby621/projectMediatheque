	<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="index.css">
        <title></title>
        
        
    </head>

    <body onload=init()>
		<img class= 'img1'  src="images/image2.png">
		<h1>Médiathèque</h1>
		<header>
			<div class="wrapper">
				
				<nav class= "menu-head">
					<ul id ="menu-demo2">
						<li><a href="main-image">Infos Pratiques</a>
						<ul>
							<li>Nous trouver</li>
							<li>Horaires</li>
							<li>Nous connaitre</li>
						
						</ul>
						</li>
						<li><a href="steps">Mediathèque Numerique</a>
						<ul>
							<li>Ecouter cd/DVD en ligne</li> 
							<li>Liste des Oeuvres disponibles</li>
							
						</ul>
						</li>
						<li><a href="possibilities">Selections</a>
						<ul>
							<li>Selections Adultes</li>
							<li>Selections Jeunesse</li> 
							<li>Selections CD/DVD</li>
							
						</ul>
						</li>
						<li><a href="contact">Nouveautés</a>
						<ul>
							<li>Nouveautés Adultes</li> 
							<li>Nouveautés Jeunesse</li> 
							<li>Nouveautés CD/DVD</li>
							
						</ul>
						</li>
					</ul>
				</nav>
			</div> 
	</header>
	<div class="horizontal"><h1></h1></div>
	<h2>Connexion Gestionnaire</h2>
	<section id="liens"> 
		
			<div class="bloconnexion">
				
				
				<?php require "connexion.php" ?>;
					
					
					
			</div>
		</div>
	</section>
	
	
    
    
    </body>
</html>


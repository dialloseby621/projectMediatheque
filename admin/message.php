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
				
				<h2> Espace Gestionnaire </h2>
				
			</div> 
	</header>
	<div class="horizontal"><h1></h1></div>
    
    <?php
        $identifiant = $_GET['id'];
        require 'database.php';
        $db = Database::connect();
        
        if(isset($_POST['ok'])){
                echo "<h2>vous avez validé la demande d'inscription</h2>";
                $statement = $db->query('SELECT * FROM demande WHERE demande.idd = '.$identifiant);
                $demande= $statement->fetch();
                $nom = $demande['nom'];
                $prenom = $demande['prenom'];
                $email = $demande['email'];
                $addresse= $demande['addresse'];
                $statement = $db->prepare("INSERT INTO adherant (nom,prenom,email,addresse) values(?, ?, ?, ?)");
	            $statement->execute(array($nom,$prenom,$email,$addresse));
	            Database::disconnect();
                $statement = $db->query('DELETE FROM demande WHERE demande.idd = '.$identifiant);

        }
        else if(isset($_POST['no']))
                echo "<h2>vous avez refusez la demande d inscription</h2>";
                $statement = $db->query('DELETE FROM demande WHERE demande.idd = '.$identifiant);
?>
    
    
    </body>
</html>


<?php
        require 'database.php';
		$nom = $prenom = $email= "";
		$nomError = $prenomError = $emailError="" ;
		$isSucces = false;

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$nom = veryfyInput($_POST["nom"]);
            $prenom = veryfyInput($_POST["prenom"]);
            $email = veryfyInput($_POST["email"]);
			


			$isSucces=true;
			$emailText ="";
			


			if(empty($nom))
		    {
				$nomError = "Le nom du gestionnaire svp";
			    $isSucces=false;

			}
			 

			if(empty($prenom))
			{
				$prenomError = "Le prenom svp !";
				$isSucces=false;

            }
            
            if(empty($email))
			{
				$emailError = "le email svp !";
				$isSucces=false;

			}
			
			
			
			if($isSucces)
			{
			    $db = Database::connect();
	            $statement = $db->prepare("INSERT INTO gestionnaire (nom,prenom,email) values(?, ?, ?)");
	            $statement->execute(array($nom,$prenom,$email));
	            Database::disconnect();
				$nom = $prenom = $email ="";
			}

		}


		

		function veryfyInput($data) 
		{


 			 $data = trim($data); 
 			 $data = stripslashes($data);
  			 $data = htmlspecialchars($data);
  				return $data;

		}	


?>





<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="ajoutOeuvre.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
		<link href="https:/fonts.googleapis.com/css?family=lato" rel="stylesheet" type="text/css">
        <title></title>
        
        
    </head>

    <body onload=init()>
		<img class= 'img1'  src="images/image2.png">
		<h1>Médiathèque</h1>
		<header>
			<div class="wrapper">
				
				<h2> Espace Administrateur </h2>
				
			</div> 
	</header>
	<div class="horizontal"><h1></h1></div>
	<h2 class="ajout"> Ajout Gestionnaire </h2>
	<div class="container">
		
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
					<div class="row">

						<div class="col-md-6">
							<label for="code">Nom<span class="red">*</span></label>
							<input type="text" id="nom" name="nom" class="form-control" placeholder="nom gestionnaire" value = "<?php echo $nom; ?>" >
							<p class="comments"><?php echo $nomError; ?></p>
						</div>	

						<div class="col-md-6">
							<label for="nom">Prenom<span class="red">*</span></label>
							<input type="text" id="prenom" name="prenom" class="form-control" placeholder="prenom" value = "<?php echo $prenom; ?>">
							<p class="comments"><?php echo $prenomError; ?></p>
						</div>	

						<div class="col-md-6">
							<label for="email">Email<span class="red">*</span></label>
							<input type="text" id="email" name="email" class="form-control" placeholder="votre email" value = "<?php echo $email; ?>">
							<p class="comments"><?php echo $emailError; ?></p>
						</div>

						<div class="col-md-12">
							<p class="red"><strong>* Ces informations sont requises</strong></p>
						</div>	

						<div class="col-md-12">
							<input type="submit" class="button1" value="Valider">
						</div>	

					</div>
					<p class="thank-you" style="display:<?php if($isSucces) echo "block";else echo "none"; ?>">Merci pour l'Ajout du nouveau Gestionnaire </p>
					
				</form>	
			</div>	
		</div>
	</div>
    
    
    </body>
</html>


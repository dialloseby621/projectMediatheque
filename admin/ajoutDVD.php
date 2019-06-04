<?php
        require 'database.php';
		$code = $nom = $duree= "";
		$codeError = $nomError = $dureeError="" ;
		$isSucces = false;

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$code = veryfyInput($_POST["nom"]);
            $nom = veryfyInput($_POST["code"]);
            $duree = veryfyInput($_POST["duree"]);
			


			$isSucces=true;
			$emailText ="";
			


			if(empty($code))
		    {
				$codeError = "Le code svp";
					$isSucces=false;

			}
			 

			if(empty($nom))
			{
				$nomError = "Le nom svp !";
					$isSucces=false;

            }
            
            if(empty($duree))
			{
				$dureeError = "La duree du dvd !";
					$isSucces=false;

			}
			
			
			
			if($isSucces)
			{
			    $db = Database::connect();
	            $statement = $db->prepare("INSERT INTO dvd (nom,code,duree) values(?, ?, ?)");
	            $statement->execute(array($nom,$code,$duree));
	            Database::disconnect();
				$nom = $code = $duree= "";
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
				
				<h2> Espace Gestionnaire </h2>
				
			</div> 
	</header>
	<div class="horizontal"><h1></h1></div>
	<h2 class="ajout"> Ajout DVD </h2>
	<div class="container">
		
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
					<div class="row">

						<div class="col-md-6">
							<label for="code">code<span class="red">*</span></label>
							<input type="text" id="code" name="code" class="form-control" placeholder="code" value = "<?php echo $code; ?>" >
							<p class="comments"><?php echo $codeError; ?></p>
						</div>	

						<div class="col-md-6">
							<label for="nom">nom<span class="red">*</span></label>
							<input type="text" id="nom" name="nom" class="form-control" placeholder="nom" value = "<?php echo $nom; ?>">
							<p class="comments"><?php echo $nomError; ?></p>
						</div>	

						<div class="col-md-6">
							<label for="email">Duree<span class="red">*</span></label>
							<input type="text" id="duree" name="duree" class="form-control" placeholder="duree DVD" value = "<?php echo $duree; ?>">
							<p class="comments"><?php echo $dureeError; ?></p>
						</div>

						<div class="col-md-12">
							<p class="red"><strong>* Ces informations sont requises</strong></p>
						</div>	

						<div class="col-md-12">
							<input type="submit" class="button1" value="Valider">
						</div>	

					</div>
					<p class="thank-you" style="display:<?php if($isSucces) echo "block";else echo "none"; ?>">Merci pour l'Ajout du nouveau DVD :-)</p>
					
				</form>	
			</div>	
		</div>
	</div>
    
    
    </body>
</html>


<?php
        require 'database.php';
		$ida = $idd = "";
		$idaError = $iddError ="" ;
		$isSucces = false;

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$ida = veryfyInput($_POST["ida"]);
            $idd = veryfyInput($_POST["idd"]);
           
			


			$isSucces=true;
			


			if(empty($ida))
		    {
				$idaError = "Identifiant Adherent svp";
			    $isSucces=false;

			}
			 

			if(empty($idd))
			{
				$iddError = "Identifiant Documents svp !";
				$isSucces=false;

            }
            
            
			
			
			
			if($isSucces)
			{
                $db = Database::connect();
                
	            $statement = $db->prepare("DELETE From  emprunt where ida=? and idd=?");
	            $statement->execute(array($ida,$idd));
	            Database::disconnect();
				$ida = $idd = "";
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
	<h2 class="ajout"> Retour Emprunt </h2>
	<div class="container">
		
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
					<div class="row">

						<div class="col-md-6">
							<label for="code">Identifiant Adhérent<span class="red">*</span></label>
							<input type="text" id="ida" name="ida" class="form-control" placeholder="id adherent" value = "<?php echo $ida; ?>" >
							<p class="comments"><?php echo $idaError; ?></p>
						</div>	

						<div class="col-md-6">
							<label for="nom">Identifiant Document<span class="red">*</span></label>
							<input type="text" id="idd" name="idd" class="form-control" placeholder="idd" value = "<?php echo $idd; ?>">
							<p class="comments"><?php echo $iddError; ?></p>
						</div>	


						<div class="col-md-12">
							<p class="red"><strong>* Ces informations sont requises</strong></p>
						</div>	

						<div class="col-md-12">
							<input type="submit" class="button1" value="Valider">
						</div>	

					</div>
					<p class="thank-you" style="display:<?php if($isSucces) echo "block";else echo "none"; ?>">Merci pour le retour du Documents à Bintot</p>
					
				</form>	
			</div>	
		</div>
	</div>
    
    
    </body>
</html>


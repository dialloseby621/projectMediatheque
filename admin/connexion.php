<?php
		session_start();
		 require 'database.php';
		


	    $motdepasse = $email = "";
		$motdepasseError = $emailError =  "";
		$isSucces = false;

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			
			$motdepasse = veryfyInput($_POST["motdepasse"]);
			$email = veryfyInput($_POST["email"]);
			

			$isSucces=true;
			$emailText ="";
		
			 

			if(empty($motdepasse))
			{
					$isSucces=false;
					$motdepasseError = "mot de passe valide svp";

			}

			
			if(!IsEmail($email))
			{
					$isSucces=false;
					$emailError = 'Login Valdie svp';

			}
			
			
			
			if($isSucces)
			{
				$db = Database::connect();

			    $statement = $db->prepare("SELECT * from gestionnaire  WHERE idg = ?");
			    $statement->execute(array($motdepasse));
			    $result = $statement->fetch();



			    if(md5(($_POST['motdepasse'])) == $result['idg'])
			    {
			            $_SESSION['idg'] = $resulta['idg'];
			            $_SESSION['nom'] = $result['nom'];
			            $_SESSION['prenom'] = $result['prenom'];
			            $_SESSION['email'] = $result['email'];
			           
			            


							        
				        
		        }
		         Database::disconnect();
		          header("Location: gestion.php");
		          	$email =  $motdepasse = "";
    }
		}


		function IsEmail($var)
		{
			return filter_var($var, FILTER_VALIDATE_EMAIL);
		}

		function veryfyInput($data) 
		{


 			 $data = trim($data); 
  			 $data = htmlentities($data);
  				return $data;

		}	


?>





<!DOCTYPE html>
<html>
<head>
	<title>connexion</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<link href="https:/fonts.googleapis.com/css?family=lato" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="connexion.css">
</head>
<body>
	<div class="container">
		<div class="divider"></div>
		
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
					<div class="row">

						
						<div class="col-md-6">
							<label for="email">login</label>
							<input type="text" id="email" name="email" class="form-control" value = "<?php echo $email; ?>">
							<p class="comments"><?php echo $emailError; ?></p>
						</div>

						
						<div class="col-md-6">
							<label for="motdepasse">mot de passe</label>
							<input type="password" id="motdepasse" name="motdepasse" class="form-control" value = "<?php echo $motdepasse; ?>">
							<p class="comments"><?php echo $motdepasseError; ?></p>
						</div>	


						<div class="col-md-12">
							<input type="submit" class="button1" value="connexion">
						</div>	

					</div>
					<p class="thank-you" style="display:<?php if(!$isSucces) echo "block";else echo "none"; ?>">veuillez entrez votre login et mot de passe </p>

					
				</form>	
			</div>	
		</div>
	</div>

</body>
</html>


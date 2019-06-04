
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

			}

			
			if(!IsEmail($email))
			{
					$isSucces=false;

			}
			
			
			
			if($isSucces)
			{
				$db = Database::connect();

			    $statement = $db->prepare("SELECT * from adherant  WHERE ida = ?");
			    $statement->execute(array($motdepasse));
			    $result = $statement->fetch();



			    if(md5(($_POST['motdepasse'])) == $result['ida'])
			    {
			            $_SESSION['ida'] = $resulta['ida'];
			            $_SESSION['nom'] = $result['nom'];
			            $_SESSION['prenom'] = $result['prenom'];
			            $_SESSION['email'] = $result['email'];
			            $_SESSION['adresse'] = $result['adresse'];
			            $_SESSION['statut']=$result['statut'];
			            $_SESSION['nbreEmprunt'] = $result['nbreEmprunt'];
			            $_SESSION['nbreMaxEmprunts'] = $result['nbreMaxEmprunt'];
			            $_SESSION['dateInscription'] = $result['dateInscription'];
			            $_SESSION['forfaitAnnuel'] = $result['forfaitAnnuel'];


							        
				        
		        }
		         Database::disconnect();
		          header("Location: index.php");
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
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="moncompte.css">
     	<meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<link href="https:/fonts.googleapis.com/css?family=lato" rel="stylesheet" type="text/css">

        
        
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
							<li><a href="index3.php"> Accueil</a></li>
							<li>Nous trouver</li>
								<li><a href="horaire.php"> Horaires</a></li>
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
   <h2>Mon compte</h2>	
 
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
					<p class="thank-you" style="display:<?php if(!$isSucces) echo "block";else echo "none"; ?>">Veuillez entrez votre login et mot de passe </p>

					
				</form>	
			</div>	
		</div>
	</div>



    </body>
</html>

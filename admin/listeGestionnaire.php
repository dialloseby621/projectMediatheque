<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="gestion.css">
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
	
	<div class="container admin">
            <div class="row">
                
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>Email</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                         <?php
                        require 'database.php';
                        $db = Database::connect();
                        $statement = $db->query('SELECT * from gestionnaire');
                        while($adherant= $statement->fetch()) 
                        {
                            echo '<tr>';
                            echo '<td>'. $adherant['nom'] . '</td>';
                            echo '<td>'. $adherant['prenom'] . '</td>';
                            echo '<td>'. $adherant['email'] . '</td>';
                            echo '<tr>';
                           
                            
                        }
                        Database::disconnect();
                      ?>
                  </tbody>
                </table>
            </div>
        </div>
    
    
    </body>
</html>


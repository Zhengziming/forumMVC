<?php
	    
		
		if(isset($_SESSION["UserID"]))
		{
			$modeleUsers = $this->getDAO("Users");
			$donnees["users"] = $modeleUsers->obtenir_par_username($_SESSION["UserID"]);
			
			if($donnees["users"]->banni==true)
			{
				echo "Maintenant Vous n'avez pas de droit.";
			}
			else
			{
				require_once('FormNouveauSujet.php');
			}
		}
		else
		{
			echo 'Pas encore Login!';
		}
	
?>






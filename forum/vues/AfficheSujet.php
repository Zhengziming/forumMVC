        <h1>Affichage d'un seul Sujet</h1>

<?php
	
		echo"<table border='1' width='100%'>";
			echo"<capital><h1> </h1></capital>";
			echo "<tr>
			<th>Username</th>
			<th>Titre</th>
			<th>Texte</th>
			</tr>";
			

    
		echo "<tr><td>" . $data["sujet"]->username 
				. "</td><td>" . $data["sujet"]->titre."</td><td>" .$data["sujet"]->texte
				. "</td></tr>";
				
    
	echo "</table>";
?>
<?php
	    $modeleReponses = $this->getDAO("Reponses");
        $donnees["reponses"] = $modeleReponses->obtenir_par_idSujet($data["sujet"]->id);
        $this->afficheVue("AfficheLesReponses", $donnees);
		
		if(isset($_SESSION["UserID"]))
		{
			require_once('FormReponse.php');
		}
?>		

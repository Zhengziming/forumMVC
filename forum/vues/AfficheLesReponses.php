
<h1>Affichage de tous les Reponses</h1>
<ul>
<?php
	
		echo"<table border='1' width='100%'>";
			echo"<capital><h1> </h1></capital>";
			echo "<tr>
			<th>Username</th>
			<th>Titre</th>
			<th>Reponse</th>
			</tr>";
			
    foreach($data["reponses"] as $r)
    {
		echo "<tr><td>" . $r->username 
				. "</td><td>" . $r->titre."</td><td>" .$r->texte
				. "</td></tr>";
				
    }
	echo "</table>";
?>
</ul>

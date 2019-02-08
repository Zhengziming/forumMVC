

<h1>Affichage de Mes Sujets</h1>
<ul>
<?php
	echo"<table border='1' width='100%'>";
			echo"<capital><h1> </h1></capital>";
			echo "<tr><th>Titre</th>
			<th>Username</th>
			<th>Date</th>
			<th>ReponseNombre</th>
			<th>ReponseUsername</th>
			<th>ReponseDate</th>
			</tr>";
			
    foreach($data["sujets"] as $s)
    {
		echo "<tr><td><a href='index.php?&action=AfficheSujet&idSujet=" . $s->id ."'>" 
				. $s->titre . "</a></td><td>" . $s->username 
				. "</td><td>" . $s->date."</td><td>" .$s->reponseNB
				. "</td><td>" . $s->rUsername."</td><td>" .$s->rDate."</td></tr>";
		
				
    }
	echo "</table>";
	/*
    foreach($data["sujets"] as $s)
    {
        echo "<li><a href='index.php?&action=AfficheSujet&idSujet=" . $s->id ."'>"
		. $s->titre ."</a>". $s->username .$s->date. $s->reponseNB ."</li>";          
    }*/
?>
</ul>

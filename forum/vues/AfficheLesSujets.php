

<h1>Affichage de tous les Sujets</h1>
<ul>
<?php
	if(isset($_SESSION["UserAdmin"]))
            {
                $UserAdmin=$_SESSION["UserAdmin"] ;
            }
            else
            {
                 $UserAdmin=false;
            }
			
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
		echo "<tr><td>".($UserAdmin == true ? "<a href='index.php?&action=SupprimerSujet&idSujet=".$s->id 
				."'>[Supprimer]</a><br>  <a href='index.php?&action=AfficheSujet&idSujet=" . $s->id ."'>".$s->titre  :" <a href='index.php?&action=AfficheSujet&idSujet=" . $s->id
				."'>". $s->titre . "</a><br>") ."</td><td>" . $s->username 
				. "</td><td>" . $s->date."</td><td>" .$s->reponseNB
				. "</td><td>" . $s->rUsername."</td><td>" .$s->rDate."</td></tr>";
				
    }
	echo "</table>";
?>
</ul>

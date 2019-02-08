

<h1>Affichage de tous les Username</h1>
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
			echo "<tr>
			<th>Username</th>
			<th>Banni</th>
			<th>Admin</th>
			
			</tr>";
			
    foreach($data["users"] as $s)
    {
		echo "<tr><td>".($UserAdmin == true ? "<a href='index.php?&action=DisplayUser&idUser=".$s->username 
				."'>[Edit]</a>".$s->username  : $s->username )
				. "</td><td>" . $s->banni."</td><td>" .$s->admin
				. "</td></tr>";
				
    }
	echo "</table>";
?>
</ul>

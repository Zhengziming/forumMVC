
<h1>Affichage de tous les films dans l'inventaire</h1>
<ul>
<?php
    foreach($data["films"] as $film)
    {
        echo "<li>" . $film->titre . "</li>";        
    }
?>
</ul>

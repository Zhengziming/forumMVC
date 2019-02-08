<h1>Formulaire d'ajout de film</h1>
<form method="POST">
    Titre : <input type="text" name="titre"/><br>
    Description :<input type="text" name="description"/><br>
    Réalisateur : <select name="idRealisateur">
    <?php
        foreach($data["realisateurs"] as $realisateur)
        {
            echo "<option value='{$realisateur->id}'>{$realisateur->prenom} {$realisateur->nom}</option>";
        }
    ?>            
    </select><br>
    <input type="hidden" name="action" value="insereFilm"/>
    <input type="submit" value="Enregistrer"/>
</form>
<?php
    if($data["erreurs"] != "")
        echo "<p>" . $data["erreurs"] . "</p>";
?>


		<section id="hero" class="clearfix">    
  
			<div class="conteneur">
				<div > 
					<div >
<?php
    if(!isset($_SESSION["UserID"]))
    {
?>
  
		
    <h1>Registre</h1>
		<form method="POST" action="index.php">
			<label for='usager'>Nom d'usager : </label>
			<input type="text" name="username"/><br>
			<label for='password'>Mot de passe : </label>
			<input type="password" name="mdp"/><br>
            <!-- <input type="password" name="nom"/> préférable pour un mot de passe -->
            <input type="hidden" name="action" value="InsertUser"/>
			<input type="submit" value="Registre"/>
		</form>			
<?php
    }

?>
						
						
					</div>
					
				</div><!-- fin row -->
			</div><!-- fin conteneur -->
		</section><!-- fin zone hero  -->


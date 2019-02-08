
		<section id="hero" class="clearfix">    
  
			<div class="conteneur">
				<div > 
					<div >
<?php
    if(!isset($_SESSION["UserID"]))
    {
?>
    <h1>Login</h1>
		<form method="POST" action="index.php">
			<label for='usger'>Nom d'usager : </label>
			<input type="text" name="username"/><br>
			<label for='mdp'>Mot de passe : </label>
			<input type="password" name="mdp"/><br>
            <!-- <input type="password" name="nom"/> préférable pour un mot de passe -->
            <input type="hidden" name="action" value="Login"/>
			<input type="submit" value="Login"/>
		</form>	
		
<?php

		if(isset($messageErreur))
		echo $messageErreur;
	}
    
?>
						
						
					</div>
					
				</div><!-- fin row -->
			</div><!-- fin conteneur -->
		</section><!-- fin zone hero  -->

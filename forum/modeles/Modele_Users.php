<?php
    class Modele_Users extends BaseDAO
    {
       public function getTableName()
       {
           return "users";
       }
        
        public function getPrimaryKey()
        {
            return "username";
        }
        
        public function obtenir_par_id($id)
        {
            $resultat = $this->lire($id);
            $resultat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "User");
            $leUser = $resultat->fetch();
            return $leUser;
        }
		
		public function obtenir_par_username($username)
        {
            $resultat = $this->lire($username);
            $resultat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "User");
            $leUser = $resultat->fetch();
            return $leUser;
        }
        
        public function obtenir_tous()
        {
            $resultats = $this->lireTous();
            $lesUsers = $resultats->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "User");
            return $lesUsers;
        }
        
        public function sauvegarde(User $leUser)
		{			
			//si le produit existe déjà
			if($leUser->username && $resultat = $this->lire($leUser->username)->fetch())
			{
				//mettre à jour - à faire...
				$query = "UPDATE " . $this->getTableName() . " SET  banni=" .$leUser->banni .", admin=" . $leUser->admin ."  WHERE ".$this->getPrimaryKey() ."='" . $leUser->username. "'";
				$donnees = array($leUser->id,$leUser->username, $leUser->mdp, $leUser->banni,$leUser->admin);
				return $this->requete($query, $donnees);
				
			}
			else
			{
				//insérer
				$query = "INSERT INTO " . $this->getTableName() . " (id,username, mdp, banni,admin) VALUES (?, ?, ?, ?, ?)";
				$donnees = array($leUser->id,$leUser->username, $leUser->mdp, $leUser->banni,$leUser->admin);
				return $this->requete($query, $donnees);
			}
		}
    }
?>
<?php
    class Modele_Reponses extends BaseDAO
    {
       public function getTableName()
       {
           return "reponses";
       }
        
        public function getPrimaryKey()
        {
            return "idSujet";
        }
        
        public function obtenir_par_id($id)
        {
            $resultat = $this->lire($id);
            $resultat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Reponse");
            $leReponse = $resultat->fetch();
            return $leReponse;
        }
		
		public function obtenir_par_idSujet($id)
        {
            $resultats = $this->lire($id,'idSujet');
            $lesReponses = $resultats->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Reponse");
            return $lesReponses;
        }
        
        public function obtenir_tous()
        {
            $resultats = $this->lireTous();
            $lesReponses = $resultats->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Reponse");
            return $lesReponses;
        }
        
        public function sauvegarde(Reponse $leReponse)
		{			
			//si le produit existe déjà
			if($leReponse->id && $resultat = $this->lire($leReponse->id)->fetch())
			{
				//mettre à jour - à faire...
				
			}
			else
			{
				//insérer
				$query = "INSERT INTO " . $this->getTableName() . " (titre, texte, username, date, idSujet) VALUES (?, ?, ?, ?, ?)";
				$donnees = array($leReponse->titre, $leReponse->texte, $leReponse->username, $leReponse->date, $leReponse->idSujet);
				return $this->requete($query, $donnees);
			}
		}
		
		public function suppression(Reponse $leReponse)
		{		
			//si le produit existe déjà
			if($leReponse->id && $resultat = $this->lire($leReponse->id,'idSujet')->fetch())
			{
				echo '$leReponse->id='.$leReponse->id;
				
				$this->supprimer($leReponse->id);
			}
			else
			{
				
				echo 'suppression pas fini';
			}
		}
    }
?>
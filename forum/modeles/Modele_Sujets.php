<?php
    class Modele_Sujets extends BaseDAO
    {
       public function getTableName()
       {
           return "sujets";
       }
        
        public function getPrimaryKey()
        {
            return "id";
        }
        
        public function obtenir_par_id($id)
        {
            $resultat = $this->lire($id);
            $resultat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Sujet");
            $leSujet = $resultat->fetch();
            return $leSujet;
        }
        
		public function obtenir_par_username($id)
        {
            $resultats = $this->lire($id,'username');
            $lesSujets = $resultats->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Sujet");
            return $lesSujets;
        }
        public function obtenir_tous()
        {
            $resultats = $this->lireTous();
            $lesSujets = $resultats->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Sujet");
            return $lesSujets;
        }
        
        public function sauvegarde(Sujet $leSujet)
		{			
			//si le produit existe déjà
			if($leSujet->id && $resultat = $this->lire($leSujet->id)->fetch())
			{
				//mettre à jour - à faire...
				
			}
			else
			{
				//insérer
				$query = "INSERT INTO " . $this->getTableName() . " (titre, texte, username, date) VALUES (?, ?, ?, ?)";
				$donnees = array($leSujet->titre, $leSujet->texte, $leSujet->username, $leSujet->date);
				return $this->requete($query, $donnees);
			}
		}
		
		public function suppression(Sujet $leSujet)
		{			
			//si le produit existe déjà
			if($leSujet->id && $resultat = $this->lire($leSujet->id)->fetch())
			{
				
				
				$this->supprimer($leSujet->id);
			}
			else
			{
				
				echo 'suppression pas fini';
			}
		}
		
		public function Sujet_NombreDeReponse()
		{
			$resultats = $this->lireSujet_NombreDeReponse();
            $lesSujets = $resultats->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Sujet");
            return $lesSujets;
		}
		
		public function MesSujet_NombreDeReponse($username)
		{
			$resultats = $this->lireMesSujet_NombreDeReponse($username);
            $lesSujets = $resultats->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Sujet");
            return $lesSujets;
		}
    }
?>
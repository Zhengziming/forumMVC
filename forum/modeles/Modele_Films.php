<?php
    class Modele_Films extends BaseDAO
    {
       public function getTableName()
       {
           return "films";
       }
        
        public function getPrimaryKey()
        {
            return "id";
        }
        
        public function obtenir_par_id($id)
        {
            $resultat = $this->lire($id);
            $resultat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Film");
            $leFilm = $resultat->fetch();
            return $leFilm;
        }
        
        public function obtenir_tous()
        {
            $resultats = $this->lireTous();
            $lesFilms = $resultats->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Film");
            return $lesFilms;
        }
        
        public function sauvegarde(Film $leFilm)
		{			
			//si le produit existe déjà
			if($leFilm->id && $resultat = $this->lire($leFilm->id)->fetch())
			{
				//mettre à jour - à faire...
				
			}
			else
			{
				//insérer
				$query = "INSERT INTO " . $this->getTableName() . " (titre, description, idRealisateur) VALUES (?, ?, ?)";
				$donnees = array($leFilm->titre, $leFilm->description, $leFilm->idRealisateur);
				return $this->requete($query, $donnees);
			}
		}
    }
?>
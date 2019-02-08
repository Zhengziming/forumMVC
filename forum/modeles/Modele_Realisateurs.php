<?php
    class Modele_Realisateurs extends BaseDAO
    {
       public function getTableName()
       {
           return "realisateurs";
       }
        
        public function getPrimaryKey()
        {
            return "id";
        }
        
        public function obtenir_par_id($id)
        {
            $resultat = $this->lire($id);
            $resultat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Realisateur");
            $leFilm = $resultat->fetch();
            return $leFilm;
        }
        
        public function obtenir_tous()
        {
            $resultats = $this->lireTous();
            $lesFilms = $resultats->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Realisateur");
            return $lesFilms;
        }
        
    }
?>
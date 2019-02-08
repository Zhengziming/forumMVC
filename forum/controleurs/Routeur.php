<?php

    class Routeur
    {
        public static function route()
        {
            //obtenir la chaine de la requête (ex : Films&action=liste)
            $queryString = $_SERVER["QUERY_STRING"];
            $posEperluette = strpos($queryString, "&");
            
            //définir un controleur par défaut (à faire plus tard)
            $controleur = "";   
            
            if($posEperluette === false)
            {
                $controleur = $queryString;
            }
            else
            {
                $controleur = substr($queryString, 0, $posEperluette);
            }
            
            //si aucun contrôleur n'a été spécifié dans la querystring, mettre un contrôleur par défaut
            if($controleur == "")
                $controleur = "Forums"; //default First controleur for beginning
            
            //on a déterminé le controleur
            $classe = "Controleur_" . $controleur;
            //on en crée une instance si la classe existe
            if(class_exists($classe))
            {
                $objetControleur = new $classe;
                if($objetControleur instanceof BaseControleur)
                {
                    $objetControleur->traite($_REQUEST);
                }
                else
                    trigger_error("Controleur invalide.");
            }
            else
            {
                trigger_error("Le controleur $classe n'existe pas.");
            }
        }
    }






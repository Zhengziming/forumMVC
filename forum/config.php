<?php
	session_start();
    define("RACINE", $_SERVER["DOCUMENT_ROOT"] . "/PR3_TP2/");

    //définition des constantes de connexion à la base de données
    define("DBTYPE", "mysql");
    define("DBNAME", "lesagess_pr3_tp2");
    define("HOST", "162.241.224.137");
    define("USER", "lesagess_pr3_tp2");
    define("PWD", "pr3_tp2");


    //définition de la fonction d'autoload
    function mon_autoloader($classe)
    {
        $repertoires = array(RACINE . "controleurs/",
                            RACINE . "modeles/",
                            RACINE . "vues/");
        
        foreach($repertoires as $rep)
        {
            if(file_exists($rep . $classe . ".php"))
            {
                require_once($rep . $classe . ".php");
                return;
            }
        }
    }

    spl_autoload_register("mon_autoloader");
?>
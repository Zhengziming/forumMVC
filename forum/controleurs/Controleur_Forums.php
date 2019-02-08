<?php

class Controleur_Forums extends BaseControleur
{
    public function traite(array $params)
    {
		 session_start();
		 
        //déterminer une vue par défaut (à faire plus tard)
        $vue = "";
     
        if(isset($params["action"]))
        {
            switch($params["action"])
            {
				case "FormRegister":
					$this->afficheVue("Header");
					$this->afficheVue("Register");
                    $this->afficheVue("Footer");
					break;
				case "InsertUser":
                    $messageForm = "";
                        
                    if(isset($params["username"], $params["mdp"]))
                    {
                        //j'ai reçu les paramètres, j'arrive probablement du formulaire
                        $messageForm = $this->valideFormInsertUser($params["username"], $params["mdp"]);                        
                        
                        if($messageForm == "")
                        {
                            //les paramètres sont valides
                            $leUser = new User(0, $params["username"], $params["mdp"],0,0);
                            $modeleUsers = $this->getDAO("Users");
                            $succes = $modeleUsers->sauvegarde($leUser);
                            
                            if($succes)
                            {
                                $messageForm = "Insertion réussie.";
                            }
                            else
                            {
                                //ça n'a pas fonctionné... refaire l'entrée
                                $messageForm = "Erreur lors de l'ajout...";
                            }
                        }         
                    }
                    
                    $this->afficheVue("Header");
                    $this->afficheVue("Login");
                    $this->afficheVue("Footer");
                    break;
				case "FormLogin":
					$this->afficheVue("Header");
					$this->afficheVue("Login");
                    $this->afficheVue("Footer");
					break;
				case "Login":
					
					if(isset($params["username"], $params["mdp"]))
                    {
                        //j'ai reçu les paramètres, j'arrive probablement du formulaire
                        $messageForm = $this->valideFormInsertUser($params["username"], $params["mdp"]);                        
                        
                        if($messageForm == "")
                        {
                            //les paramètres sont valides
                            $leUser = new User(0, $params["username"], $params["mdp"],0);
                            $modeleUsers = $this->getDAO("Users");
							
							$donnees["user"] = $modeleUsers->obtenir_par_username($params["username"]);
                            
							if($params["mdp"]==$donnees["user"]->mdp)
							{
								$_SESSION["UserID"] =$params["username"];
								$_SESSION["UserAdmin"] =$donnees["user"]->admin;
								
							}
						}
					}
                            
                    $this->afficheVue("Header");
					if($_SESSION["UserAdmin"]== true)
					{
						$this->afficheLesUsers();
					}
					else
					{
						$this->afficheLesSujets();
					}
                    $this->afficheVue("Footer");
					
					break;
				case "Logout":
						// Détruit toutes les variables de session
					$_SESSION = array();

					// Si vous voulez détruire complètement la session, effacez également
					// le cookie de session.
					// Note : cela détruira la session et pas seulement les données de session !
					if (ini_get("session.use_cookies")) {
						$params = session_get_cookie_params();
						setcookie(session_name(), '', time() - 42000,
							$params["path"], $params["domain"],
							$params["secure"], $params["httponly"]
						);
					}

					// Finalement, on détruit la session.
				//	session_destroy();
					$this->afficheVue("Header");
                    $this->afficheLesSujets();
                    $this->afficheVue("Footer");
					
					
					break;
				case "FormSujet":
					

					$this->afficheVue("Header");
					$this->afficheVue("NouveauSujet");
                    $this->afficheVue("Footer");
					break;
				case "InsertSujet":
					$messageForm = "";
                        
                    if(isset($params["titre"], $params["texte"]))
                    {
                        //j'ai reçu les paramètres, j'arrive probablement du formulaire
                        $messageForm = $this->valideFormInsertSujet($params["titre"], $params["texte"]);                        
                        
                        if($messageForm == "")
                        {
                            //les paramètres sont valides
							date_default_timezone_set("America/New_York");
							
							$date=date("Y-m-d H:i:s");
                            $leSujet = new Sujet(0, $params["titre"], $params["texte"],$_SESSION["UserID"],$date);
                            $modeleSujets = $this->getDAO("Sujets");
                            $succes = $modeleSujets->sauvegarde($leSujet);
                            
                            if($succes)
                            {
                                $messageForm = "Insertion réussie.";
                            }
                            else
                            {
                                //ça n'a pas fonctionné... refaire l'entrée
                                $messageForm = "Erreur lors de l'ajout...";
                            }
                        }         
                    }
                    
                    $this->afficheVue("Header");
                    $this->afficheLesSujets();
                    $this->afficheVue("Footer");
                    break;
				case "AfficheSujet":
				
					if(isset($params["idSujet"]))
                    {
                        $modeleSujets = $this->getDAO("Sujets");
                        $donnees["sujet"] = $modeleSujets->obtenir_par_id($params["idSujet"]);
                        $vue = "AfficheSujet";
                        $this->afficheVue("Header");
                        $this->afficheVue($vue, $donnees);
                        $this->afficheVue("Footer");
                    }
                    else
                    {
                        trigger_error("Pas d'id de film spécifié...");
                    }
                    break;
				case "InsertReponse":
					
					$messageForm = "";
                        
                    if(isset($params["titre"], $params["texte"]))
                    {
                        //j'ai reçu les paramètres, j'arrive probablement du formulaire
                        $messageForm = $this->valideFormInsertSujet($params["titre"], $params["texte"]);                        
                        
                        if($messageForm == "")
                        {
                            //les paramètres sont valides
							date_default_timezone_set("America/New_York");
							$date=date("Y-m-d H:i:s");
                            $leReponse = new Reponse(0, $params["titre"], $params["texte"],$_SESSION["UserID"],$date,$params["idSujet"]);
                            $modeleReponses = $this->getDAO("Reponses");
                            $succes = $modeleReponses->sauvegarde($leReponse);
                            
                            if($succes)
                            {
                                $messageForm = "Insertion réussie.";
                            }
                            else
                            {
                                //ça n'a pas fonctionné... refaire l'entrée
                                $messageForm = "Erreur lors de l'ajout...";
                            }
                        }         
                    }
                    
                    $this->afficheVue("Header");
                    $this->afficheLesSujets();
                    $this->afficheVue("Footer");
                    break;	
				case "SupprimerSujet":
                    $messageForm = "";
                    
                    if(isset($params["idSujet"]))
                    {
                        
                        if($messageForm == "")
                        {
                           //supprimer reponses
						   $leReponse = new Reponse( $params["idSujet"]);
						   $modeleReponses = $this->getDAO("Reponses");
						   $succes = $modeleReponses->suppression($leReponse);
							
							
							//supprimer sujet
                            $leSujet = new Sujet( $params["idSujet"]);
                            $modeleSujets = $this->getDAO("Sujets");
                            $succes = $modeleSujets->suppression($leSujet);
                            
                            if($succes)
                            {
                                $messageForm = ".";
                            }
                            else
                            {
                                //ça n'a pas fonctionné... refaire l'entrée
                                $messageForm = ".";
                            }
                        }        
                    }
                    
                    $this->afficheVue("Header");
                    $this->afficheLesSujets();
                   
                    $this->afficheVue("Footer");
                    break;
				case "DisplayUser":

					if(isset($params["idUser"]))
                    {
                        $modeleUsers = $this->getDAO("Users");
                        $donnees["user"] = $modeleUsers->obtenir_par_username($params["idUser"]);
                        $vue = "AfficheUser";
                        $this->afficheVue("Header");
                        $this->afficheVue($vue, $donnees);
                        $this->afficheVue("Footer");
                    }
                    else
                    {
                        trigger_error("Pas d'id de film spécifié...");
                    }
                    break;
				case "ModifierUser":
                    $messageForm = "";
					
                        
                    if(isset($params["username"]))
                    {
                        //j'ai reçu les paramètres, j'arrive probablement du formulaire
						$params["mdp"]="mdp";
                        $messageForm = $this->valideFormInsertUser($params["username"], $params["mdp"]);                        
                        
                        if($messageForm == "")
                        {
                            //les paramètres sont valides
                            $leUser = new User(0, $params["username"], $params["mdp"],$params["banni"],$params["admin"]);
                            $modeleUsers = $this->getDAO("Users");
                            $succes = $modeleUsers->sauvegarde($leUser);
                            
                            if($succes)
                            {
                                $messageForm = "Insertion réussie.";
                            }
                            else
                            {
                                //ça n'a pas fonctionné... refaire l'entrée
                                $messageForm = "Erreur lors de l'ajout...";
                            }
                        }         
                    }
                    

                    $this->afficheVue("Header");
					if($_SESSION["UserAdmin"]== true)
					{
						$this->afficheLesUsers();
					}
					else
					{
						$this->afficheLesSujets();
					}
                    $this->afficheVue("Footer");
                    break;
					//
                case "afficheListe":
                    $this->afficheVue("Header");
                    $this->afficheListeFilms();
                    $this->afficheFormAjoutFilm();
                    $this->afficheVue("Footer");
                   
                    break;
                case "affiche":
                    if(isset($params["id"]))
                    {
                        $modeleFilms = $this->getDAO("Films");
                        $donnees["film"] = $modeleFilms->obtenir_par_id($params["id"]);
                        $vue = "AfficheFilm";
                        $this->afficheVue("Header");
                        $this->afficheVue($vue, $donnees);
                        $this->afficheVue("Footer");
                    }
                    else
                    {
                        trigger_error("Pas d'id de film spécifié...");
                    }
                    break;
                case "insereFilm":
                    $messageForm = "";
                        
                    if(isset($params["titre"], $params["description"], $params["idRealisateur"]))
                    {
                        //j'ai reçu les paramètres, j'arrive probablement du formulaire
                        $messageForm = $this->valideFormAjoutFilm($params["titre"], $params["description"]);                        
                        
                        if($messageForm == "")
                        {
                            //les paramètres sont valides
                            $leFilm = new Film(0, $params["username"], $params["mdp"]);
                            $modeleFilms = $this->getDAO("Films");
                            $succes = $modeleFilms->sauvegarde($leFilm);
                            
                            if($succes)
                            {
                                $messageForm = "Insertion réussie.";
                            }
                            else
                            {
                                //ça n'a pas fonctionné... refaire l'entrée
                                $messageForm = "Erreur lors de l'ajout...";
                            }
                        }         
                    }
                    
                    $this->afficheVue("Header");
                    $this->afficheListeFilms();
                    $this->afficheFormAjoutFilm($messageForm);
                    $this->afficheVue("Footer");
                    break;
                default:
                    trigger_error("Action invalide.");
            }
        }
        else
        {
            //action du controleur à effectuer par défaut
            $this->afficheVue("Header");
			
			
            $this->afficheLesSujets();
           
            $this->afficheVue("Footer");
        }
        
    }
    
    private function afficheListeFilms()
    {
        $modeleFilms = $this->getDAO("Films");
        $donnees["films"] = $modeleFilms->obtenir_tous();
        $this->afficheVue("AfficheListeFilms", $donnees);
    }
    
    private function afficheFormAjoutFilm($erreurs = "")
    {
        $modeleRealisateurs = $this->getDAO("Realisateurs");
        $donnees["realisateurs"] = $modeleRealisateurs->obtenir_tous();    
        $donnees["erreurs"] = $erreurs;
        $this->afficheVue("FormAjoutFilm", $donnees);
    }
    
    private function valideFormAjoutFilm($titre, $description)
    {
        $erreurs = "";
        
        $titre = trim($titre);
        $description = trim($description);
        
        if($titre == "")
            $erreurs .= "Le titre ne peut être vide.<br>";
        
        if(strlen($titre) > 250)
            $erreurs .= "Le titre ne doit pas dépasser 250 caractères.<br>";
        
        if($description == "")
            $erreurs .= "La description ne peut être vide.<br>";
        
        return $erreurs;
    }
	
	private function valideFormInsertUser($username, $mdp)
    {
        $erreurs = "";
        
        $username = trim($username);
        $mdp = trim($mdp);
        
        if($username == "")
            $erreurs .= "Le titre ne peut être vide.<br>";
        
        if(strlen($username) > 50)
            $erreurs .= "Le UserName ne doit pas dépasser 50 caractères.<br>";
        
        if($mdp == "")
            $erreurs .= "La Password ne peut être vide.<br>";
        
        return $erreurs;
    }
	
	private function valideFormInsertSujet($titre, $texte)
    {
        $erreurs = "";
        
        $titre = trim($titre);
        $texte = trim($texte);
        
        if($titre == "")
            $erreurs .= "Le titre ne peut être vide.<br>";
        
        if(strlen($titre) > 50)
            $erreurs .= "Le titre ne doit pas dépasser 250 caractères.<br>";
        
        if($texte == "")
            $erreurs .= "La description ne peut être vide.<br>";
        
        return $erreurs;
    }
	
	private function afficheLesSujets()
    {
		if(isset($_SESSION["UserID"]))
		{	
				$this->afficheMesSujets($_SESSION["UserID"]);
		}
        $modeleSujets = $this->getDAO("Sujets");
        //$donnees["sujets"] = $modeleSujets->obtenir_tous();
		$donnees["sujets"] = $modeleSujets->Sujet_NombreDeReponse();
        $this->afficheVue("AfficheLesSujets", $donnees);
    }
	private function afficheMesSujets($username)
    {
        $modeleSujets = $this->getDAO("Sujets");
       // $donnees["sujets"] = $modeleSujets->obtenir_par_username($username);
		$donnees["sujets"] = $modeleSujets->MesSujet_NombreDeReponse($username);
        $this->afficheVue("AfficheMesSujets", $donnees);
    }
	
	private function afficheLesUsers()
    {
		
        $modeleUsers = $this->getDAO("Users");
        //$donnees["sujets"] = $modeleSujets->obtenir_tous();
		$donnees["users"] = $modeleUsers->obtenir_tous();
        $this->afficheVue("AfficheLesUsers", $donnees);
    }
}
?>
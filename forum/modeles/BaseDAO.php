<?php
	abstract class BaseDao
	{
		protected $db;

		public function __construct(PDO $dbPDO)
		{			
			$this->db = $dbPDO;
		}
			
		protected function supprimer($clePrimaire)
		{
			$query = "DELETE FROM " . $this->getTableName() . " WHERE " . $this->getPrimaryKey() ."=?";
			$donnees = array($clePrimaire);
			return $this->requete($query, $donnees);
		}

	
		protected function lire($valeurCherchee, $cle = NULL)
		{
			if(!isset($cle)){
				$query = "SELECT * from " . $this->getTableName() . " WHERE " . $this->getPrimaryKey() ."=?";
			}
			else{
				$query = "SELECT * from " . $this->getTableName() . " WHERE " . $cle ."=?";
			}
			$donnees = array($valeurCherchee);
			return $this->requete($query, $donnees);
		}

		
		protected function lireTous()
		{
			$query = "SELECT * from " . $this->getTableName() . " ORDER BY ". $this->getPrimaryKey() . " DESC";
			return $this->requete($query);
		}
		
		protected function lireSujet_NombreDeReponse()
		{
			$query = "select s.id,s.titre, s.username ,s.date , 
						r.reponseNB,r.rDate,r.username as rUsername,r.rDate as rDate from sujets s
						left outer join
						( select username ,idSujet,count(idSujet) as reponseNB,max(date) as rDate from reponses group by idSujet ) r 
						on s.id=r.idSujet
						group by s.titre
						order by rDate desc";
		/*	$query = "select s.id,s.titre, s.username ,s.date ,count(r.id) as reponseNB , r.username as rUsername,r.date as rDate from sujets s
						left outer join reponses r on s.id=r.idSujet
						group by s.titre
						order by max(r.date) desc";*/
			return $this->requete($query);
		}
		
		protected function lireMesSujet_NombreDeReponse($username)
		{
			$query = "select s.id,s.titre, s.username ,s.date , 
						r.reponseNB,r.rDate,r.username as rUsername,r.rDate as rDate from sujets s
						left outer join
						( select username ,idSujet,count(idSujet) as reponseNB,max(date) as rDate from reponses group by idSujet ) r 
						on s.id=r.idSujet
						where  s.username='" . $username . "'
						group by s.titre
						order by rDate desc";
		/*	$query = "select s.id,s.titre, s.username ,s.date ,count(r.id) as reponseNB, r.username as rUsername,r.date as rDate from sujets s
						left outer join reponses r on s.id=r.idSujet
						where  s.username='" . $username . "'
						group by s.titre
						order by max(r.date) desc";*/
		/*	$query = "select s.id,s.titre, s.username ,s.date, count(*) as reponseNB from sujets s
							join reponses r on s.id=r.idSujet
							where s.id=r.idSujet and s.username='" . $username . "'
							group by s.titre
							order by dataline desc";*/
			return $this->requete($query);
		}

	
		final protected function requete($query, $data = array())
		{
			try
			{
				$stmt = $this->db->prepare($query);
				$stmt->execute($data);
			}
			catch(PDOException $e)
			{
				trigger_error("<p>La requête suivante a donné une erreur : $query</p><p>Exception : " . $e->getMessage() . "</p>");
                return false;
			}
			return $stmt;
		}
		
		abstract protected function getPrimaryKey();
		abstract function getTableName();	
	}
?>
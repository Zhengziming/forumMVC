<?php
    class Reponse
    {
        public $id;
        public $titre;
        public $texte;
		public $username;
		public $date;
		public $idSujet;
      

        public function __construct($id = 0, $ti = "", $te = "" ,$u= "", $d="", $is=0)
        {
            $this->id = $id;
			$this->titre = $ti;
			$this->texte = $te;
            $this->username = $u;
            $this->date= $d;
			$this->idSujet = $is;
            
        }
    }

?>
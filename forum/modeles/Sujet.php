<?php
    class Sujet
    {
        public $id;
        public $titre;
        public $texte;
		public $username;
		public $date;
      

        public function __construct($id = 0, $ti = "", $te = "" ,$u= "", $d="")
        {
            $this->id = $id;
			$this->titre = $ti;
			$this->texte = $te;
            $this->username = $u;
            $this->date= $d;
			
            
        }
    }

?>
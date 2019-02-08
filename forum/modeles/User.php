<?php
    class User
    {
        public $id;
        public $username;
        public $mdp;
		public $banni;
		public $admin;
      

        public function __construct($id = 0, $u = "", $m = "" ,$b=0, $a=0)
        {
            $this->id = $id;
            $this->username = $u;
            $this->mdp= $m;
			$this->banni= $b;
			$this->admin= $a;
            
        }
    }

?>
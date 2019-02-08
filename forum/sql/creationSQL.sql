
CREATE TABLE IF NOT EXISTS  users(
        id Int,
        username Varchar (50) NOT NULL PRIMARY KEY,
        mdp      Varchar (255) NOT NULL,
		banni Boolean NOT NULL default 0,
		admin Boolean NOT NULL DEFAULT 0
);

CREATE TABLE IF NOT EXISTS  sujets(
        id Int  Auto_increment  PRIMARY KEY ,
        titre     Varchar (50) NOT NULL ,
        texte     Varchar (500) NOT NULL ,
        username    Varchar (50) NOT NULL,
		date	  Varchar (50) NOT NULL,
        FOREIGN KEY (username) REFERENCES users(username)
);

CREATE TABLE IF NOT EXISTS  reponses(
        id Int  Auto_increment  PRIMARY KEY ,
        titre     Varchar (50) NOT NULL ,
        texte     Varchar (500) NOT NULL ,
        username    Varchar (50) NOT NULL,
		date Varchar (50) NOT NULL,
		idSujet Int ,
	      FOREIGN KEY (username) REFERENCES  users(username),
	      FOREIGN KEY (idSujet) REFERENCES  sujets(id)
);


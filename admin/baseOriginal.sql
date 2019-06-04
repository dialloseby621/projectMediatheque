drop table gestionnaire;
drop table documents;
drop table emprunt;
drop table retour;
drop table reservation;
drop table livre;
drop table dvd;
drop table cd;
drop table revue;





create table Administrateur (
    idad int primary key DEFAULT 1,
    nom varchar(50) NOT NULL,
    prenom varchar(50) NOT NULL,
    email varchar(50) NOT NULL,
	addresse varchar(100) NOT NULL
);





create table demande(
             idd int primary key,         
             nom varchar(50) NOT NULL,
             prenom varchar(50) NOT NULL,
             email varchar(50) NOT NULL,
	         addresse varchar(100) NOT NULL,
	         datedemande timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);


create table adherant (
             ida int primary key,
             nom varchar(50) NOT NULL,
             prenom varchar(50) NOT NULL,
             mp varchar(18) DEFAULT '12345678' NOT NULL ,
             email varchar(20) NOT NULL,
	         addresse varchar(20) NOT NULL,
             nbrEmprunt int default 0 NOT NULL,
	         statut varchar(15) default  'A jour',
             dateinscription timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
             forfait int  default 0 not null,
             unique(ida, email)
);



create table gestionnaire (
             idg int primary key,
             nom varchar(100) NOT NULL,
             prenom varchar(100) NOT NULL,
             email varchar(200) NOT NULL,
             mp varchar(180) DEFAULT '12345678' NOT NULL ,
  	         unique(idg, email)
);

create table livre(
		    idlivre int primary key,
		    auteur varchar(100),
            code varchar(100) NOT NULL,
            ISBN varchar(20) NOT NULL
);

create table dvd(
		iddvd int primary key,
        nom varchar(10) NOT NULL,
        code varchar(100) NOT NULL,
     	duree varchar(20)
);

create table cd(
		idcd int primary key,
        code varchar(100) NOT NULL,
		nom varchar(100),
        classe varchar(200)
);

create table revue(
		 idr int primary key NOT NULL,
         code varchar NOT NULL,
         dateRevue date,
         numeroRevue int
);




create table emprunt(
		ide int  primary key,
		ida int not null,
        idd int not null,
		dateEmprunt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		dateRetour  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
                
);



create table reservation(
        idreser int primary key,
		ida int not null, foreign key (ida) references adherant ,
        idd int not null, foreign key (idd) references documents , 
        dateReservation date default CURDATE,
        delaiREservation date  default DATE_ADD(CURDATE , INTERVAL 3 DAY)
);

create table  Oeuvre(
              idd int primary key,
              titre varchar(12) NOT NULL,
              typed varchar(19) NOT NULL,
              idlivre int,
              idcd int, 
              iddvd int, 
              idr int 
             
);







ALTER TABLE emprunt ADD FOREIGN KEY (ida) REFERENCES adherant(ida);
ALTER TABLE emprunt ADD FOREIGN KEY (idd) REFERENCES oeuvre(idd);

ALTER TABLE oeuvre ADD FOREIGN KEY (idlivre) REFERENCES livre(idlivre);
ALTER TABLE oeuvre ADD FOREIGN KEY (idcd) REFERENCES cd(idcd);
ALTER TABLE oeuvre ADD FOREIGN KEY (iddvd) REFERENCES dvd(iddvd);
ALTER TABLE oeuvre ADD FOREIGN KEY (idr) REFERENCES revue(idr);


ALTER TABLE demande  MODIFY idd int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE emprunt  MODIFY ide int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE adherant  MODIFY ida int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE cd  MODIFY idcd int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE dvd  MODIFY iddvd int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE livre  MODIFY idlivre int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE gestionnaire  MODIFY idg int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;



INSERT INTO `administrateur` (`idad`, `nom`, `prenom`, `email`, `addresse`) VALUES ('1', 'Barry', 'Habibatou', 'hbarry@gmail.com', '64 rue de massy\r\n93400');
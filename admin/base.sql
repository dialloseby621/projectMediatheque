/*contraintes SQL et non SQL */

----Contraintes SQL

drop table demande cascade constraints;
drop table adherant cascade constraints;
drop table gestionnaire;
drop table documents;
drop table emprunt;
drop table retour;
drop table reservation;
drop table livre;
drop table dvd;
drop table cd;
drop table revue;
		
drop sequence seq_adherant;
drop sequence seq_demande;
drop sequence seq_gestionnaire;
drop sequence seq_documents;
drop sequence seq_emprunt;
drop sequence seq_retour;
drop sequence seq_reservation;

create sequence seq_adherant start with 1;
create sequence seq_demande start with 1;
create sequence seq_gestionnaire start with 1;
create sequence seq_documents start with 20;
create sequence seq_emprunt start with 1;
create sequence seq_retour start with 10;
create sequence seq_reservation start with 1;


--0 ordres tapés pour programmeur:
create table demande(
             idd int primary key,         
             nom varchar2(10) not null,
             prenom varchar2(10) not null,
             email varchar2(20) not null,
	        adrresse varchar2(20) not null,
	        datedemande date default sysdate
);

create table adherant (
             ida int primary key,
             nom varchar2(10) not null,
             prenom varchar2(10) not null,
             email varchar2(20) not null,
	         adrresse varchar2(20) not null,
             nbrEmprunt int default 0 not null, check (0<=nbreEmprunt and nbreEmprunt<=3),
	         statut string default  'Ajour',
             dateinscription date default CURDATE();
             forfait int  default 2000 not null, check (0<=forfait and forfait<=2000);
             unique(idc, email)
);


insert into adherant(ida, nom, prenom, email, adrresse, forfait) values (1, 'Amegandji', 'eddy', 'adji@gmail.com', 'stalrad', 'jeune');
insert into adherant(ida, nom, prenom, email, adrresse, forfait) values (2, 'mehmet', 'nicolas', 'met@u-psud.fr', 'staliad', 'jeune');
insert into adherant(ida, nom, prenom, email, adrresse, forfait) values (3, 'csouumou', 'hamala', 'c@gmail.com', 'stalirad', 'vieux');
 
create table gestionnaire (
             idb int primary,
             nom varchar2(10) not null,
             prenom varchar2(10) not null,
             email varchar2(20) not null,
  	         unique(idb, email)
);
create table livre(
		    idlivre int default 1 not nul
		    auteur varchar2(10),
            ISBN varchar2(20)
);

create table dvd(
		iddvdint int NOT NULL,
     	duree varchar(20)
);

create table cd(
		idcd int NOT NULL,
		nom varchar(10),
        classe int(20)
);

create table revue(
		 idr int NOT NULL,
         dateRevue date,
         numeroRevue int
);

create table documents(
              idd int primary key,
              titre varchar(12) NOT NULL,
              iddvd int, foreign key (idd) references dvd ,
              penalité int not null,
              dateAjout int not null,
              nbreExemplaire int default 0 NOT NULL,
              nbretotal int NULL
);

create table emprunt(
		ide int  primary key,
		ida int not null, foreign key (ida) references adherant ,
        idd int not null, foreign key (idd) references documents ,
		dateEmprunt date default CURDATE(),
		dateRetour  date default DATE_ADD(CURDATE , INTERVAL 14 DAY)
                
);
create table reservation(
        idreser int primary key,
		ida int not null, foreign key (ida) references adherant ,
        idd int not null, foreign key (idd) references documents , 
        dateReservation date default CURDATE,
        delaiREservation date  default DATE_ADD(CURDATE , INTERVAL 3 DAY)
);


ALTER TABLE demande  MODIFY idd int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
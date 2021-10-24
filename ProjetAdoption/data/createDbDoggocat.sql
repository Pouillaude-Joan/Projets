DROP TABLE  IF EXISTS  adresse;
DROP TABLE  IF EXISTS animal;
DROP TABLE  IF EXISTS  admin;
DROP TABLE  IF EXISTS carnet_de_sante;
DROP TABLE  IF EXISTS  client;
DROP TABLE  IF EXISTS gestionnaire;
DROP TABLE  IF EXISTS  adoption;
DROP TABLE  IF EXISTS vaccin;

DROP SEQUENCE  IF EXISTS  adresse;
DROP SEQUENCE  IF EXISTS animal;
DROP SEQUENCE  IF EXISTS  admin;
DROP SEQUENCE  IF EXISTS carnet_de_sante;
DROP SEQUENCE  IF EXISTS  client;
DROP SEQUENCE  IF EXISTS gestionnaire;
DROP SEQUENCE  IF EXISTS  adoption;
DROP SEQUENCE  IF EXISTS vaccin;

create table utilisateur 
(
id int not null, 
nom varchar(50), 
prenom varchar(50), 
mail varchar(50), 
tel numeric, 
mot_de_passe varchar(50)
);

create table adresse 
(
id int not null, 
rue varchar(50), 
num numeric, 
code_postal numeric, 
ville varchar(50), 
pays varchar(50), 
id_utilisateur int not null
);

create table animal 
(
id int not null, 
nom varchar(50), 
type varchar(50), 
race varchar(50), 
sexe varchar(50), 
age numeric);

create table admin 
(
id int not null, 
id_utilisateur int
);
create table carnet_de_sante 
(
id int not null, 
id_vaccin int not null, 
id_animal int not null
);

create table client 
(
id int not null, 
id_utilisateur int not null
);
create table gestionnaire 
(
id int not null,  
id_utilisateur int not null
);

create table adoption 
(
id int not null, 
id_animal int not null, 
id_utilisateur int not null
);

create table vaccin 
(
id int not null, 
date_debut date,
date_fin date
);


alter table adresse
add constraint PK_ADRESSE primary key (id);
alter table animal
add constraint PK_ANIMAL primary key (id);
alter table utilisateur
add constraint PK_UTILISATEUR primary key (id);
alter table admin
add constraint PK_ADMIN primary key (id);
alter table carnet_de_sante
add constraint PK_CARNET_DE_SANTE primary key (id);
alter table client
add constraint PK_CLIENT primary key (id);
alter table gestionnaire
add constraint PK_GESTIONNAIRE primary key (id);
alter table adoption
add constraint PK_ADOPTION primary key (id);
alter table vaccin
add constraint PK_VACCIN primary key (id);


CREATE SEQUENCE  IF NOT EXISTS  seq_adresse  INCREMENT  BY 1
    
    START  WITH 1 
    OWNED BY adresse.id;

CREATE SEQUENCE  IF NOT EXISTS  seq_animal  INCREMENT  BY 1
    
    START  WITH 1 
    OWNED BY animal.id;

CREATE SEQUENCE  IF NOT EXISTS  seq_admin  INCREMENT  BY 1
    
    START  WITH 1 
    OWNED BY admin.id;
   
CREATE SEQUENCE  IF NOT EXISTS  seq_client  INCREMENT  BY 1
    
    START  WITH 1 
    OWNED BY client.id;
   
CREATE SEQUENCE  IF NOT EXISTS  seq_utilisateur  INCREMENT  BY 1
    
    START  WITH 1 
    OWNED BY utilisateur.id;
   
CREATE SEQUENCE  IF NOT EXISTS  seq_carnet_de_sante  INCREMENT  BY 1
    
    START  WITH 1 
    OWNED BY carnet_de_sante.id;
   
CREATE SEQUENCE  IF NOT EXISTS  seq_vaccin  INCREMENT  BY 1
    
    START  WITH 1 
    OWNED BY vaccin.id;
   
CREATE SEQUENCE  IF NOT EXISTS  seq_gestionnaire  INCREMENT  BY 1
    
    START  WITH 1 
    OWNED BY gestionnaire.id;


insert into animal values (5001,'chat1', 'chat', 'européen', 'mâle', '5');
insert into animal values (5002,'chat2', 'chat', 'européen', 'mâle', '8');
insert into animal values (5003,'chat3', 'chat', 'maine Coon', 'femelle', '7');
insert into animal values (5004,'chat4', 'chat', 'persan', 'mâle', '2');
insert into animal values (5005,'chat5', 'chat', 'sacré de Birmanie ', 'femelle', '6');
insert into animal values (5006,'chat6', 'chat', 'chartreux', 'mâle', '8');
insert into animal values (5007,'chat7', 'chat', 'européen', 'femelle', '3');
insert into animal values (5008,'chat8', 'chat', 'persan', 'mâle', '2');
insert into animal values (5009,'chat9', 'chat', 'européen', 'femelle', '1');
insert into animal values (5010,'chat10', 'chat', 'maine Coon', 'mâle', '7');
insert into animal values (5011,'chien1', 'chien', 'Epagneul Breton', 'femelle', '10');
insert into animal values (5012,'chien2', 'chien', 'Affenpinscher', 'mâle', '13');
insert into animal values (5013,'chien3', 'chien', 'Levrier', 'femelle', '9');
insert into animal values (5014,'chien4', 'chien', 'Yorkshire', 'mâle', '3');
insert into animal values (5015,'chien5', 'chien', 'Chihuahua', 'femelle', '2');
insert into animal values (5016,'chien6', 'chien', 'Labrador', 'mâle', '5');
insert into animal values (5017,'chien7', 'chien', 'Jack Russell', 'femelle', '7');
insert into animal values (5018,'chien8', 'chien', 'Levrier', 'mâle', '9');
insert into animal values (5019,'chien9', 'chien', 'Affenpinscher', 'femelle', '12');
insert into animal values (5020,'chien10', 'chien', 'Epagneul Breton', 'mâle', '6');




alter table animal add photo VARCHAR(250);
update animal set photo = '../images/chat1.jpg' where nom = 'chat1';
update animal set photo = '../images/chat2.jpg' where nom = 'chat2';
update animal set photo = '../images/chat3.jpg' where nom = 'chat3';
update animal set photo = '../images/chat4.jpg' where nom = 'chat4';
update animal set photo = '../images/chat5.jpg' where nom = 'chat5';
update animal set photo = '../images/chat6.jpg' where nom = 'chat6';
update animal set photo = '../images/chat7.jpg' where nom = 'chat7';
update animal set photo = '../images/chat8.jpg' where nom = 'chat8';
update animal set photo = '../images/chat9.jpg' where nom = 'chat9';
update animal set photo = '../images/chat10.jpg' where nom = 'chat10';
update animal set photo = '../images/chien1.jpg' where nom = 'chien1';
update animal set photo = '../images/chien2.jpg' where nom = 'chien2';
update animal set photo = '../images/chien3.jpg' where nom = 'chien3';
update animal set photo = '../images/chien4.jpg' where nom = 'chien4';
update animal set photo = '../images/chien5.jpg' where nom = 'chien5';
update animal set photo = '../images/chien6.jpg' where nom = 'chien6';
update animal set photo = '../images/chien7.jpg' where nom = 'chien7';
update animal set photo = '../images/chien8.jpg' where nom = 'chien8';
update animal set photo = '../images/chien9.jpg' where nom = 'chien9';
update animal set photo = '../images/chien10.jpg' where nom = 'chien10';    


alter table animal add adopte VARCHAR(1);
update animal set adopte = 'n' where nom = 'chat1';
update animal set adopte = 'n' where nom = 'chat2';
update animal set adopte = 'n' where nom = 'chat3';
update animal set adopte = 'n' where nom = 'chat4';
update animal set adopte = 'n' where nom = 'chat5';
update animal set adopte = 'n' where nom = 'chat6';
update animal set adopte = 'n' where nom = 'chat7';
update animal set adopte = 'n' where nom = 'chat8';
update animal set adopte = 'n' where nom = 'chat9';
update animal set adopte = 'n' where nom = 'chat10';
update animal set adopte = 'n' where nom = 'chien1';
update animal set adopte = 'n' where nom = 'chien2';
update animal set adopte = 'n' where nom = 'chien3';
update animal set adopte = 'n' where nom = 'chien4';
update animal set adopte = 'n' where nom = 'chien5';
update animal set adopte = 'n' where nom = 'chien6';
update animal set adopte = 'n' where nom = 'chien7';
update animal set adopte = 'n' where nom = 'chien8';
update animal set adopte = 'n' where nom = 'chien9';
update animal set adopte = 'n' where nom = 'chien10';


alter table adoption add justificatif VARCHAR(250);
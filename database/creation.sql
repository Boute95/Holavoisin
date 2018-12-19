drop table if exists service;
drop table if exists objet;
drop table if exists utilisateur;


create table utilisateur(
id int AUTO_INCREMENT,
prenom VARCHAR(100),
nom VARCHAR(100),
mdp VARCHAR(100),
email VARCHAR(100),
imagePath VARCHAR(200),
constraint pk_utilisateur primary key(id)
) DEFAULT CHARSET=utf8;

create table service (
id int AUTO_INCREMENT,
nom VARCHAR(100),
description VARCHAR(1000),
prix NUMERIC(6,0),
localisation VARCHAR(100),
imagePath VARCHAR(200),
idVois int,
constraint pk_service primary key(id),
constraint fk_service_utilisateur foreign key(idVois) references utilisateur(id)
) DEFAULT CHARSET=utf8;

create table objet(
id int AUTO_INCREMENT,
nom VARCHAR(100),
description VARCHAR(1000),
typeVente VARCHAR(100) CHECK (typeVente IN('location', 'vente')),
prix NUMERIC(6,0),
localisation VARCHAR(100),
imagePath VARCHAR(200),
idVois int,
constraint pk_objet primary key(id),
constraint fk_objet_utilisateur foreign key(idVois) references utilisateur(id)
) DEFAULT CHARSET=utf8;

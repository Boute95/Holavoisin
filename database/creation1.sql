drop table if exists avis;
drop table if exists consommation;
drop table if exists objet;
drop table if exists service;
drop table if exists utilisateur;
drop table if exists categorie;

create table categorie(
id int AUTO_INCREMENT,
nom VARCHAR(100),
idPere int,
constraint pk_categorie primary key(id),
constraint fk_categorie_categorie foreign key (idPere) references categorie(id)
) DEFAULT CHARSET=utf8;

create table utilisateur(
id int AUTO_INCREMENT,
prenom VARCHAR(100),
nom VARCHAR(100),
mdp VARCHAR(100),
email VARCHAR(100) unique,
categorieSocio VARCHAR(100),
adresse VARCHAR(500),
portable NUMERIC(10,0),
sexe VARCHAR(10) check (sexe in('femme','homme')),
date_naissance date,
bibliographie VARCHAR(1000),
profession VARCHAR(100),
site_internet VARCHAR(100),
imagePath VARCHAR(200),
administrateur boolean,
constraint pk_utilisateur primary key(id)
) DEFAULT CHARSET=utf8;

create table service (
id int AUTO_INCREMENT,
nom VARCHAR(100),
description VARCHAR(1000),
prix NUMERIC(6,0),
localisation VARCHAR(100),
imagePath VARCHAR(200),
id_utilisateur int,
id_categorie int,
constraint pk_service primary key(id),
constraint fk_categorie_service foreign key (id_categorie) references categorie(id),
constraint fk_utilisateur_service foreign key (id_utilisateur) references utilisateur(id)
) DEFAULT CHARSET=utf8;

create table objet(
id int AUTO_INCREMENT,
nom VARCHAR(100),
description VARCHAR(1000),
typeVente VARCHAR(100),
prix_neuf NUMERIC(6,0),
localisation VARCHAR(100),
imagePath VARCHAR(200),
id_utilisateur int,
id_categorie int,
constraint pk_objet primary key(id),
constraint fk_categorie_objet foreign key (id_categorie) references categorie (id),
constraint fk_utilisateur_objet foreign key (id_utilisateur) references utilisateur (id)
) DEFAULT CHARSET=utf8;

create table consommation(
id_utilisateur int,
date_conso datetime,
prix_conso NUMERIC(6,2),
id_service int,
id_objet int,
constraint pk_consommation primary key (id_utilisateur,date_conso),
constraint pk_consommation_utilisateur foreign key (id_utilisateur) references utilisateur(id),
constraint fk_service_consommation foreign key (id_service) references service (id),
constraint fk_objet_consommation foreign key (id_objet) references objet (id)
) DEFAULT CHARSET=utf8;

create table avis(
id int AUTO_INCREMENT,
commentaire VARCHAR(1000),
note NUMERIC(1,1),
id_utilisateur int,
id_service int,
id_objet int,
date_consom datetime,
constraint pk_avis primary key(id),
constraint fk_utilisateur_avis foreign key (id_utilisateur) references utilisateur (id),
constraint fk_service_avis foreign key (id_service) references service (id),
constraint fk_objet_avis foreign key (id_objet) references objet (id),
constraint fk_consommation_avis foreign key (date_consom) references consommation (date_conso)
) DEFAULT CHARSET=utf8;

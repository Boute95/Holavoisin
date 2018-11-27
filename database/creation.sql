drop table if exists service;
drop table if exists utilisateur;
drop table if exists objet;

create table service (
       id int AUTO_INCREMENT,
       nom VARCHAR(100),
       description VARCHAR(1000),
       prix NUMERIC(6,0),
       localisation VARCHAR(100),
       imagePath VARCHAR(200),
       constraint pk_service primary key(id)
);

create table utilisateur(
       id int AUTO_INCREMENT,
       nom VARCHAR(100),
       mdp VARCHAR(100),
       email VARCHAR(100),
       imagePath VARCHAR(200),
       constraint pk_utilisateur primary key(id)
);

create table objet(
  id int AUTO_INCREMENT,
  nom VARCHAR(100),
  typeVente VARCHAR(100) CHECK (typeVente IN('location', 'vente')),
  prix NUMERIC(6,0),
  localisation VARCHAR(100),
  imagePath VARCHAR(200),
  constraint pk_objet primary key(id)
);

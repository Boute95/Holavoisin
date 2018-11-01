drop table if exists services;
drop table if exists utilisateur;

create table services(
       id int AUTO_INCREMENT,
       nom VARCHAR(100),
       description VARCHAR(1000),
       constraint pk_services primary key(id)
);

create table utilisateur(
       id int AUTO_INCREMENT,
       nom VARCHAR(100),
       mdp VARCHAR(100),
       email VARCHAR(100),
       constraint pk_utilisateur primary key(id) 
);

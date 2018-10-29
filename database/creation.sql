drop table if exists services;
drop table if exists utilisateur;

create table services(
       id NUMERIC(6,0),
       nom VARCHAR(100),
       description VARCHAR(1000)
);

create table utilisateur(
       id NUMERIC(6,0),
       nom VARCHAR(100),
       mdp VARCHAR(100),
       email VARCHAR(100)       
);


insert into utilisateur values(
default,
'Alexis',
'Breton',
MD5('1234'),
'alexis.breton@etu.umontpellier.fr',
'./uploads/utilisateurs/leonardo-dicaprio.jpg');

insert into utilisateur values(
default,
'Robert',
'De Niro',
MD5('1234'),
'alexis.breton@etu.umontpellier.fr',
'./uploads/utilisateurs/taxidriver.jpg');

insert into objet values(
default,
'iPhone5',
'iPhone5 bon état, quelques rayures sur l écran et sur la coque',
'vente',
200,
'Montpellier',
'./uploads/propositions/objets/1.jpg',
2);

insert into objet values(
default,
'Vélo de ville',
'Vélo de ville Décathlon très pratique pour se balader en ville, pneus, chaine et freins en bon état.',
 'vente',
 250,
 'Montpellier',
 './uploads/propositions/objets/2.jpg',
 1);
 
insert into objet values(
default,
'HP Probook 6470b',
'Core i5 3e génération, HDD 500Gb, 8Gb de RAM, Windows 10. La carrosserie est abimée mais il reste parfaitement fonctionnel',
 'vente',
 180,
 'Montpellier',
 './uploads/propositions/objets/3.jpg',
 1);


insert into service values(
default,
'Aide aux devoirs mathématiques',
'Étudiant en licence de mathématiques, je propose une aide aux devoirs à domicile sur cette matière jusqu au lycée',
 10,
 'Paris',
 './uploads/propositions/services/1.jpg',
 1);
 
insert into service values(
default,
'Ménage',
'Services de nettoyage à domicile',
 15,
 'Montpellier',
 './uploads/propositions/services/2.jpg',
 1);
 

CREATE TABLE info_jeu (
	idCard integer ,
	id serial PRIMARY KEY
);


-- drop table info_jeu;

SELECT * FROM info_jeu

CREATE TABLE info_jeu (
	idCard integer ,
	id serial PRIMARY KEY
);

drop table info_jeu

SELECT DISTINCT idcard FROM info_jeu

SELECT COUNT( idcard) as total FROM info_jeu

SELECT COUNT(Where idcard = )   FROM info_jeu

SELECT COUNT(DISTINCT idcard) FROM info_jeu GROUP BY idcard;

SELECT <barre>DISTINCT</barre> prenom,
  COUNT(prenom) AS nbpre,
  FROM tablemembres
  GROUP BY prenom;
  
  SELECT idcard, COUNT(*) AS occurence FROM info_jeu GROUP BY idcard ORDER BY occurence DESC;
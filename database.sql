CREATE TABLE users(
	id int unsigned auto_increment,
    nome varchar(255) not null,
    cognome varchar(255) not null,
    username varchar(16) not null unique,
    email varchar(255) not null unique,
    password varchar(255) not null,
    citta varchar(255) not null,
    cap int(5) not null,
    indirizzo varchar(255) not null,
    cellulare int(10) not null unique,
    PRIMARY KEY(id)
);

CREATE TABLE prodotti(
	id int unsigned auto_increment,
    nome varchar(255) not null,
    img varchar(255) not null,
    prezzo float not null,
    taglia float not null,
    id_categorie int not null,
    PRIMARY KEY(id)
    /* Foreign key id_categorie con id_categoria di categorie */
);

CREATE TABLE categorie(
    id_categoria int unsigned auto_increment,
    nome varchar(255) not null,
    img varchar(255) not null,
    PRIMARY KEY(id_categoria)
);

CREATE TABLE evidenza(
    id_prodotto int unsigned auto_increment,
    img varchar(255) not null,
    nome varchar(255) not null,
    prezzo float not null,
    taglia float not null,
    PRIMARY KEY(id_prodotto)
);

CREATE TABLE carrello(
    userid int,
    id_prodotto int,
    img varchar(255) not null,
    nome varchar(255) not null,
    prezzo float not null,
    taglia float not null,

    INDEX ind_user_id(userid)
    /* FOREIGN key userid e idprodotto con id users e id prodotti*/
);

INSERT INTO categorie(nome, img) VALUES ("Dunk low", "images/dunk_low.png");
INSERT INTO categorie(nome, img) VALUES ("Jordan 1", "images/jordan_high.png");
INSERT INTO categorie(nome, img) VALUES ("New Balance 550", "images/newbalance_550.png");


INSERT INTO evidenza(img, nome, prezzo, taglia) VALUES ("images/dunk_low.png", "Dunk low Black and White", "109.99", "42");
INSERT INTO evidenza(img, nome, prezzo, taglia)  VALUES ("images/jordan_high.png", "Jordan 1 High Lost and Found", "180.00", "45.5");
INSERT INTO evidenza(img, nome, prezzo, taglia)  VALUES ("images/newbalance_550.png", "New Balance 550 White Green", "150.00", "43");


/* Inserimento tabella prodotti */
INSERT INTO prodotti (nome, img, prezzo, taglia, id_categorie)
VALUES ("Dunk low Black & White", "images/dunk_low.png", "109.99", "42", "1");

INSERT INTO prodotti (nome, img, prezzo, taglia, id_categorie)
VALUES ("Jordan 1 High Lost and Found", "images/jordan_high.png", "180.00", "45.5", "2");

INSERT INTO prodotti (nome, img, prezzo, taglia, id_categorie)
VALUES ("Jordan 1 Taxi", "images/taxi.png", "180.00", "42.5", "2");

INSERT INTO prodotti (nome, img, prezzo, taglia, id_categorie)
VALUES ("New Balance 550 White Green", "images/newbalance_550.png", "150.00", "43", "3");

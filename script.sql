CREATE TABLE utilisateur(
    id_utilisateur SERIAL PRIMARY KEY,
    login    VARCHAR(255) NOT NULL,
    email    VARCHAR(255) NOT NULL,
    nom      VARCHAR(255) NOT NULL,
    prenom   VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,   
    valide   TINYINT NOT NULL DEFAULT 0,
    token    VARCHAR(64) DEFAULT NULL,
    UNIQUE (email),
    UNIQUE (login)
);

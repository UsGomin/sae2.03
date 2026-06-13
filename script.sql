CREATE TABLE utilisateur(
    id_utilisateur SERIAL PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

ALTER TABLE utilisateur ADD CONSTRAINT unique_email UNIQUE (email);
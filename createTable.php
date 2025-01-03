<?php
include_once './db.php';

$query = [
    "CREATE TABLE IF NOT EXISTS utenti (
        id int(11) NOT NULL AUTO_INCREMENT,
        username varchar(20) NOT NULL,
        password varchar(70) NOT NULL,
        mail varchar(100) NOT NULL,
        PRIMARY KEY (id),
        UNIQUE (username)
    )",

    "CREATE TABLE IF NOT EXISTS prodotti (
        id int(11) NOT NULL AUTO_INCREMENT,
        nome varchar(40) NOT NULL,
        descr varchar(100) NOT NULL,
        prezzo decimal(5,2) NOT NULL,
        PRIMARY KEY (id),
        UNIQUE (nome)
    )",

    "CREATE TABLE IF NOT EXISTS ordini (
        id int(11) NOT NULL AUTO_INCREMENT,
        idutente int(11) NOT NULL,
        data date NOT NULL default CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        unique (idutente, data),
        FOREIGN KEY (idutente) REFERENCES utenti (id)
    )",

    "CREATE TABLE IF NOT EXISTS dettagli (
        id int(11) NOT NULL AUTO_INCREMENT,
        idordine int(11) NOT NULL,
        idprodotto int(11) NOT NULL,
        qta int(11) NOT NULL,
        check (qta > 0),
        PRIMARY KEY (id),
        unique (idordine, idprodotto),
        FOREIGN KEY (idordine) REFERENCES ordini (id),
        FOREIGN KEY (idprodotto) REFERENCES prodotti (id)
    )"
];

foreach ($query as $q) {
    $con->query($q);
}

?>
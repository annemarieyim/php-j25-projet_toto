<?php

// je me connecte à la DB
$dsn='mysql:host=localhost; dbname=tablepdo; charset=utf8';
$pdo= new PDO($dsn, 'root', 'yluredewittig');
// si on travaille sur la db de Ben mettre dbname=formation
//et son mot de passe new PDO($dsn, 'root', 'totowf3');

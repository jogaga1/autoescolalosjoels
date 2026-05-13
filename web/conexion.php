<?php

$host = "mysql-8001.dinaserver.com";
$user = "joel";
$password = "Pizxas08#";
$database = "preguntas";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión");
}

?>
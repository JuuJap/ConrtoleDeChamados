<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "controle_chamados";

$conn = new mysqli(
    $host,
    $user,
    $password,
    $database
);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

?>
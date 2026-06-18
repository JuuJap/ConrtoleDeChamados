<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php");
    exit();
}

require_once "../config/conexao.php";

$id = $_GET["id"];

$sql = "SELECT * FROM chamados WHERE id = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);
$stmt->execute();

$chamado = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Detalhes do Chamado</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

    <h2>Detalhes do Chamado</h2>

    <a href="listar.php" class="btn btn-secondary mb-3">
        Voltar
    </a>

    <div class="card">

        <div class="card-body">

            <p><strong>Usuário:</strong> <?= $chamado["nome_usuario"] ?></p>

            <p><strong>Departamento:</strong> <?= $chamado["departamento"] ?></p>

            <p><strong>E-mail:</strong> <?= $chamado["email"] ?></p>

            <p><strong>Telefone:</strong> <?= $chamado["telefone"] ?></p>

            <p><strong>Equipamento:</strong> <?= $chamado["equipamento"] ?></p>

            <p><strong>Número:</strong> <?= $chamado["numero_equipamento"] ?></p>

            <p><strong>Status:</strong> <?= $chamado["status"] ?></p>

            <p><strong>Descrição:</strong></p>

            <div class="border p-3 bg-light">
                <?= nl2br($chamado["descricao_problema"]) ?>
            </div>

        </div>

    </div>

</div>

</body>
</html>
<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php");
    exit();
}

require_once "../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome_usuario"];
    $departamento = $_POST["departamento"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $equipamento = $_POST["equipamento"];
    $numero = $_POST["numero_equipamento"];
    $problema = $_POST["descricao_problema"];

    $sql = "INSERT INTO chamados
    (nome_usuario, departamento, email, telefone, equipamento, numero_equipamento, descricao_problema)
    VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sssssss",
        $nome,
        $departamento,
        $email,
        $telefone,
        $equipamento,
        $numero,
        $problema
    );

    if ($stmt->execute()) {
        $sucesso = "Chamado cadastrado com sucesso!";
    } else {
        $erro = "Erro ao cadastrar chamado.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Novo Chamado</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

    <h2>Novo Chamado</h2>

    <a href="dashboard.php" class="btn btn-secondary mb-3">
        Voltar
    </a>

    <?php if(isset($sucesso)): ?>
        <div class="alert alert-success">
            <?= $sucesso ?>
        </div>
    <?php endif; ?>

    <?php if(isset($erro)): ?>
        <div class="alert alert-danger">
            <?= $erro ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Nome do Usuário</label>
                <input type="text"
                       name="nome_usuario"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Departamento</label>
                <input type="text"
                       name="departamento"
                       class="form-control"
                       required>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>E-mail</label>
                <input type="email"
                       name="email"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Telefone</label>
                <input type="text"
                       name="telefone"
                       class="form-control"
                       required>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Equipamento</label>
                <input type="text"
                       name="equipamento"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Número do Equipamento</label>
                <input type="text"
                       name="numero_equipamento"
                       class="form-control"
                       required>
            </div>

        </div>

        <div class="mb-3">

            <label>Descrição do Problema</label>

            <textarea
                name="descricao_problema"
                class="form-control"
                rows="5"
                required></textarea>

        </div>

        <button
            type="submit"
            class="btn btn-primary">
            Registrar Chamado
        </button>

    </form>

</div>

</body>
</html>
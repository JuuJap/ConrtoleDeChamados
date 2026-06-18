<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php");
    exit();
}

require_once "../config/conexao.php";

$id = $_GET["id"] ?? 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $status = $_POST["status"];

    $sql = "UPDATE chamados SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $id);

    if ($stmt->execute()) {
        header("Location: listar.php");
        exit();
    }
}

$sql = "SELECT * FROM chamados WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$chamado = $resultado->fetch_assoc();

if (!$chamado) {
    die("Chamado não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Alterar Status</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

    <h2>Alterar Status do Chamado #<?= $chamado["id"] ?></h2>

    <a href="listar.php" class="btn btn-secondary mb-3">
        Voltar
    </a>

    <div class="card">

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status" class="form-select">

                        <option value="Aberto"
                            <?= $chamado["status"] == "Aberto" ? "selected" : "" ?>>
                            Aberto
                        </option>

                        <option value="Em Andamento"
                            <?= $chamado["status"] == "Em Andamento" ? "selected" : "" ?>>
                            Em Andamento
                        </option>

                        <option value="Concluído"
                            <?= $chamado["status"] == "Concluído" ? "selected" : "" ?>>
                            Concluído
                        </option>

                    </select>

                </div>

                <button class="btn btn-primary">
                    Salvar Alteração
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>
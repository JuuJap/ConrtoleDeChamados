<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php");
    exit();
}

require_once "../config/conexao.php";

$total = $conn->query("SELECT COUNT(*) as total FROM chamados")
              ->fetch_assoc()["total"];

$abertos = $conn->query("SELECT COUNT(*) as total FROM chamados WHERE status='Aberto'")
                ->fetch_assoc()["total"];

$andamento = $conn->query("SELECT COUNT(*) as total FROM chamados WHERE status='Em Andamento'")
                  ->fetch_assoc()["total"];

$concluidos = $conn->query("SELECT COUNT(*) as total FROM chamados WHERE status='Concluído'")
                   ->fetch_assoc()["total"];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">

        <span class="navbar-brand">
            Controle de Chamados
        </span>

        <div>
            <span class="text-white me-3">
                Bem-vindo, <?= $_SESSION["usuario"] ?>
            </span>

            <a href="../logout.php" class="btn btn-danger btn-sm">
                Sair
            </a>
        </div>

    </div>
</nav>

<div class="container mt-4">

    <h2>Painel Principal</h2>

    <div class="row mt-4">

        <div class="col-md-3">
            <div class="card border-primary shadow-sm">
                <div class="card-body text-center">
                    <h6>Total</h6>
                    <h2><?= $total ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-danger shadow-sm">
                <div class="card-body text-center">
                    <h6>Abertos</h6>
                    <h2><?= $abertos ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-warning shadow-sm">
                <div class="card-body text-center">
                    <h6>Em Andamento</h6>
                    <h2><?= $andamento ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-success shadow-sm">
                <div class="card-body text-center">
                    <h6>Concluídos</h6>
                    <h2><?= $concluidos ?></h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-4">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-body text-center">

                    <h5>Novo Chamado</h5>

                    <p>Cadastrar uma ocorrência.</p>

                    <a href="cadastrar.php" class="btn btn-primary">
                        Abrir
                    </a>

                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-body text-center">

                    <h5>Consultar Chamados</h5>

                    <p>Visualizar registros.</p>

                    <a href="listar.php" class="btn btn-success">
                        Abrir
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
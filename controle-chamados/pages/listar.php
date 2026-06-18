<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php");
    exit();
}

require_once "../config/conexao.php";

$sql = "SELECT * FROM chamados ORDER BY data_abertura DESC";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Consultar Chamados</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

    <h2>Chamados Registrados</h2>

    <a href="dashboard.php" class="btn btn-secondary mb-3">
        Voltar
    </a>

    <div class="table-responsive">

        <table class="table table-bordered table-striped table-hover align-middle">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>Equipamento</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>

            <?php while($chamado = $resultado->fetch_assoc()): ?>

                <tr>

                    <td><?= $chamado["id"] ?></td>

                    <td><?= $chamado["nome_usuario"] ?></td>

                    <td><?= $chamado["equipamento"] ?></td>

                    <td>
                        <?php
                        if($chamado["status"] == "Aberto"){
                            echo '<span class="badge bg-danger">Aberto</span>';
                        }
                        elseif($chamado["status"] == "Em Andamento"){
                            echo '<span class="badge bg-warning text-dark">Em Andamento</span>';
                        }
                        else{
                            echo '<span class="badge bg-success">Concluído</span>';
                        }
                        ?>
                    </td>

                    <td><?= $chamado["data_abertura"] ?></td>

                    <td>

                        <a
                            href="visualizar.php?id=<?= $chamado['id'] ?>"
                            class="btn btn-info btn-sm">
                            Ver
                        </a>

                        <a
                            href="atualizar_status.php?id=<?= $chamado['id'] ?>"
                            class="btn btn-warning btn-sm">
                            Status
                        </a>

                    </td>

                </tr>

            <?php endwhile; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>
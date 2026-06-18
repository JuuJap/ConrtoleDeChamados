<?php
session_start();
require_once "config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $senha = hash('sha256', $_POST["senha"]);

    $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {

        $usuario = $resultado->fetch_assoc();

        $_SESSION["usuario"] = $usuario["nome"];
        $_SESSION["id"] = $usuario["id"];

        header("Location: pages/dashboard.php");
        exit();

    } else {
        $erro = "E-mail ou senha inválidos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login - Controle de Chamados</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-5">

<div class="card shadow">

<div class="card-header text-center">
<h3>Controle de Chamados</h3>
</div>

<div class="card-body">

<?php if(isset($erro)): ?>
<div class="alert alert-danger">
    <?= $erro ?>
</div>
<?php endif; ?>

<form method="POST">

<div class="mb-3">
<label>E-mail</label>
<input
type="email"
name="email"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Senha</label>
<input
type="password"
name="senha"
class="form-control"
required>
</div>

<button
type="submit"
class="btn btn-primary w-100">
Entrar
</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>
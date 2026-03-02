<?php
session_start();

$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if ($usuario === "admin" && $senha === "1234") {
        $_SESSION["usuario"] = $usuario;
        header("Location: index.php");
        exit();
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="login">
<h1>Login Bloco de Notas</h1><br/><br/><br/>
<form method="POST">
    <input type="text" name="usuario" placeholder="Usuário" required>
    <br/><br/>
    <input type="password" name="senha" placeholder="Senha" required>
    <br/><br/><br/><br/>
    <button type="submit">Entrar</button>
</form>
<p style="color:red;"><?= $erro ?></p>
</div>
</body>
</html>
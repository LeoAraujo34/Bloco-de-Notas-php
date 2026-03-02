<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

$arquivo = "notas.txt";
if (file_exists($arquivo)){
    $notas = file($arquivo, FILE_IGNORE_NEW_LINES);
    $notas = array_filter($notas, function($linha){
    return trim($linha) !== "";
    });
} else {
    $notas = [];
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Bloco de Notas</title>
    <link rel="stylesheet" href="bloco.css">
</head>
<body>
<div class="container">
    <h1>Bloco de Notas</h1>
    <form action="salvar.php" method="POST">
        <textarea name="nota" placeholder="Digite aqui sua nota..." required></textarea>
        <button type="submit">Adicionar</button>
    </form>
    <?php if (!empty($notas)): ?>
        <ul class="lista">
        <?php foreach ($notas as $index => $nota): ?>
            <li>
                <span><?php echo htmlspecialchars($nota); ?></span>
                <a class="btn-excluir" href="apagar.php?id=<?php echo $index; ?>" onclick="return confirm('Tem certeza que deseja excluir esta nota?');">Excluir
                </a>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif;?>
    <br/><br/><br/><br/><br/><button id="btn_sair"><a href="logout.php">Sair</a></button>
</div>
</body>
</html>
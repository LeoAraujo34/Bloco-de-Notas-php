<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $arquivo = "notas.txt";
    $nota = trim($_POST["nota"]);

    if (!empty($nota)){
        $nota = htmlspecialchars($nota);
        file_put_contents($arquivo, $nota . PHP_EOL, FILE_APPEND);
    }
    header("Location: index.php");
    exit();
}
<?php
$arquivo = "notas.txt";
if (isset($_GET["id"]) && file_exists($arquivo)) {
    $notas = file($arquivo, FILE_IGNORE_NEW_LINES);
    $id = (int) $_GET["id"];

    if (isset($notas[$id])) {
        unset($notas[$id]);
        file_put_contents($arquivo, implode(PHP_EOL, $notas) . PHP_EOL);
    }
}
header("Location: index.php");
exit();

<?php

require "conexao.php";

$nome = $_POST["jogador"];
$pontos = (int) $_POST["pontos"];

$sql = "INSERT INTO pontuacoes (jogador, pontos)
        VALUES (:jogador, :pontos)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ":jogador" => $nome,
    ":pontos" => $pontos
]);

echo "Pontuação salva!";

?>

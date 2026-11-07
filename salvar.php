


<?php

header("Content-Type: text/plain; charset=utf-8");

// Importa a conexão com o banco
require_once __DIR__ . "/conexao.php";

// Verifica o método de envio
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Método não permitido.");
}

try {

    // Recebe os dados
    $nome = trim($_POST["jogador"] ?? "");
    $pontos = filter_var(
        $_POST["pontos"] ?? null,
        FILTER_VALIDATE_INT
    );

    // Valida o nome
    if ($nome === "") {
        http_response_code(400);
        exit("Digite o nome do jogador.");
    }

    // Valida a pontuação
    if ($pontos === false || $pontos === null || $pontos < 0) {
        http_response_code(400);
        exit("Pontuação inválida.");
    }

    // Prepara o cadastro
    $sql = "INSERT INTO pontuacoes (jogador, pontos)
            VALUES (:jogador, :pontos)";

    $stmt = $pdo->prepare($sql);

    // Salva no MySQL
    $stmt->execute([
        ":jogador" => $nome,
        ":pontos" => $pontos
    ]);

    echo "Pontuação salva com sucesso!";

} catch (PDOException $erro) {

    error_log($erro->getMessage());

    http_response_code(500);
    echo "Erro ao salvar pontuação no banco de dados.";

}



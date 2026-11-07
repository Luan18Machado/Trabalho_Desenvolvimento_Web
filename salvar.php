

<?php

    // Configura o PDO para apresentar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se os dados vieram do formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Recebe os dados
        $nome = trim($_POST['jogador'] ?? '');
        $pontos = $_POST['pontos'] ?? '';

        // Verifica se os campos estão preenchidos
        if ($nome === '' || $pontos === '') {
            die("Erro: preencha todos os campos!");
        }

        // Valida a pontuação
        $pontos = filter_var($pontos, FILTER_VALIDATE_INT);

        if ($pontos === false || $pontos < 0) {
            die("Erro: pontuação inválida!");
        }

        // Prepara o comando SQL
        $sql = "INSERT INTO pontuacoes (jogador, pontos)
                VALUES (:jogador, :pontos)";

        $stmt = $pdo->prepare($sql);

        // Executa o cadastro
        $stmt->execute([
            ":jogador" => $nome,
            ":pontos" => $pontos
        ]);

        // Mensagem de sucesso
        echo "Pontuação salva com sucesso!";

    } else {

        echo "Acesse esta página através do formulário.";

    }

} catch (PDOException $e) {

    echo "Erro ao acessar o banco de dados: " . $e->getMessage();

}


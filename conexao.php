
<?php

$servidor = "localhost";
$banco = "flappy_bird";
$usuario = "root";
$senha = "";

try {

    $pdo = new PDO(
        "mysql:host=$servidor;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexão com MySQL realizada com sucesso!";

} catch (PDOException $erro) {

    echo "Erro na conexão: " . $erro->getMessage();

}

?>


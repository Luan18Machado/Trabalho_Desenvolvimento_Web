
<?php

$servidor = "localhost";
$banco = "flappy_bird";
$usuario = "root";
$senha = "";

require_once "conexao.php";
try {

    $pdo = new PDO(
        "mysql:host=$servidor;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   

} catch (PDOException $erro) {

    echo "Erro na conexão: " . $erro->getMessage();

}

?>


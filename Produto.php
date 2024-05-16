<?php
// Conexão com o banco de dados SQLite
$db = new SQLite3('produtos_novos.db');

// Criando a tabela 'produtos' se ela não existir
$db->exec('CREATE TABLE IF NOT EXISTS produtos (
    id INTEGER PRIMARY KEY,
    cliente TEXT NOT NULL,
    nome TEXT NOT NULL,
    quantidade INTEGER NOT NULL,
    preco REAL NOT NULL,
    data_entrada DATE NOT NULL,
    data_alteracao DATE NULL
)');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = $_POST["cliente"];
    $nome = $_POST["nome"];
    $quantidade = $_POST["quantidade"];
    $preco = $_POST["preco"];
    $data_entrada = $_POST["data_entrada"];
    $data_alteracao = null; // Inicializa a data de alteração como nula

    // Verifique se algum campo foi alterado
    if ($cliente != $_POST["cliente"] || $nome != $_POST["nome"] || $quantidade != $_POST["quantidade"] || $preco != $_POST["preco"]) {
        $data_alteracao = date("Y-m-d"); // Atualize a data de alteração apenas se houver alterações
    }

    // Inserindo dados na tabela 'produtos'
    $stmt = $db->prepare('INSERT INTO produtos (cliente, nome, quantidade, preco, data_entrada, data_alteracao)
        VALUES (:cliente, :nome, :quantidade, :preco, :data_entrada, :data_alteracao)');
    $stmt->bindValue(':cliente', $cliente, SQLITE3_TEXT);
    $stmt->bindValue(':nome', $nome, SQLITE3_TEXT);
    $stmt->bindValue(':quantidade', $quantidade, SQLITE3_INTEGER);
    $stmt->bindValue(':preco', $preco, SQLITE3_FLOAT);
    $stmt->bindValue(':data_entrada', $data_entrada, SQLITE3_TEXT);
    $stmt->bindValue(':data_alteracao', $data_alteracao, SQLITE3_TEXT);
    $stmt->execute();

    // Redirecionamento após inserção
    header("Location: tabela_produtos.php");
    exit;
}
?>

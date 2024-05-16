<?php
$db = new SQLite3('produtos_novos.db');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $cliente = $_POST["cliente"];
    $nome = $_POST["nome"];
    $quantidade = $_POST["quantidade"];
    $preco = $_POST["preco"];
    $data_alteracao = $_POST["data_alteracao"];

    // Atualizar dados na tabela 'produtos'
    $stmt = $db->prepare('UPDATE produtos SET cliente= :cliente, nome= :nome, quantidade= :quantidade, preco= :preco, data_alteracao= :data_alteracao WHERE id = :id');
    $stmt->bindValue(':cliente', $cliente, SQLITE3_TEXT);
    $stmt->bindValue(':nome', $nome, SQLITE3_TEXT);
    $stmt->bindValue(':quantidade', $quantidade, SQLITE3_INTEGER);
    $stmt->bindValue(':preco', $preco, SQLITE3_FLOAT);
    $stmt->bindValue(':data_alteracao', $data_alteracao, SQLITE3_TEXT);
    $stmt->bindValue(':id', $id, SQLITE3_TEXT);
    $stmt->execute();
    header('Location: tabela_produtos.php');
    exit();
} else {
    header('Location: tabela_produtos.php');
    exit();
}
?>

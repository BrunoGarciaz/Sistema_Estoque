<?php
if(isset($_POST['excluir_id']) && !empty($_POST['excluir_id'])) {

    $db = new SQLite3('produtos_novos.db');
    
    $id = $_POST['excluir_id'];

    $stmt = $db->prepare('DELETE FROM produtos WHERE id = :id');
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->execute();

    header('Location: tabela_produtos.php');
    exit();
} else {
    header('Location: tabela_produtos.php');
    exit();
}
?>

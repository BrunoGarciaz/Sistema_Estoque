<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        background-image: linear-gradient(to right, rgb(15%, 27%, 48%), rgb(12%, 34%, 55%));
        text-decoration-color: white;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        background-color: white;
        color: black;
    }
    .title-color {
        color: white;
        font-style: italic;
    }
    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        font-family: Verdana;
    }
    th {
        background-color: #4682B4;
        color: black;
    }
    .produto-nome {
        font-weight: bold;
    }
    .titulo {
        font-weight: bold;
    }
    .cadastro-cliente-btn {
        transition: background-color 0.3s;
        border-radius: 20px;
        position: absolute;
        top: 20px;
        right: 20px;
        z-index: 999;
        border: 2px solid black;
    }
    .cadastro-cliente-btn:hover {
        background-color: #666;
    }
    .verificar-produtos {
        transition: background-color 0.3s;
        border-radius: 20px;
        position: absolute; 
    }
    .voltar-link {
        color: white;
        left: 85%;
        position: absolute;
        top: 5%;
        
    }
    .btnatualizar{
        border-color: #4682B4;
        color: white;
        background-color: #4682B4;
        
    }
</style>

<a href= "index.php" style='
  position: absolute;
  top: 5%;
  left: 1150px;
  color: rgb(231,231,231); font-family: Georgia; font-size: 17px; font-style: italic;'>Voltar para o inicio</a>

<div class="container">
<table>
    <tr>
        <br><br><br><br><br>
        <th>ID</th>
        <th>Cliente</th>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Preço</th>
        <th>Data de Entrada</th>
        <th>Data de alteracao</th>
        <th>Ações</th> <!-- Adicionando uma coluna para as ações -->
    </tr>
</div>
  

<?php
$db = new SQLite3('produtos_novos.db');
// Consulta para selecionar todos os produtos
$query = 'SELECT * FROM produtos';

// Executa a consulta
$result = $db->query($query);

// Loop através dos resultados e exibe cada produto
while ($row = $result->fetchArray()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['cliente'] . "</td>";
    echo "<td>" . $row['nome'] . "</td>";
    echo "<td>" . $row['quantidade'] . "</td>";
    echo "<td>" . $row['preco'] . "</td>";
    echo "<td>" . $row['data_entrada'] . "</td>";
    echo "<td>" . $row['data_alteracao'] . "</td>";
    echo "<td>
          <form action='formulario_atualizacao.php' method='POST'>
          <input type='hidden' name='id' value='" . $row['id'] . "'>
          <input type='submit' class='btnatualizar' name='adicionar' value='Atualizar Produto'>
        </form>
        <form action='excluir.php' method='POST'>
          <input type='hidden' name='excluir_id' value='" . $row['id'] . "'>
          <input type='submit' class='btnatualizar' name='excluir' value='Excluir'>
        </form>
        </td>";
    echo "</tr>";
}
?>

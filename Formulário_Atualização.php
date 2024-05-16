<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Atualizar Produto</title>

<style>
body{
font-family: Arial, Helvetica, sans-serif;
background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(19, 54, 65));
}
.box{
color: white;
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%,-50%);
background-color: rgba(0, 0, 0, 0.6);
padding: 25px;
border-radius: 10px;
width: 25%;
}
fieldset{
border: 3px solid rgb(68, 0, 255);
}
legend{
border: 3px solid blueviolet;
padding: 10px;
text-align: center;
background-color: solid blue;
border-radius: 8px;
}
.inputBox{
position: relative;
}
.inputUser{
background: none;
border: none;
border-bottom: 1px solid white;
outline: none;
color: white;
font-size: 15px;
width: 100%;
letter-spacing: 2px;
}
.labelInput{
position: absolute;
top: 0px;
left: 0px;
pointer-events: none;
transition: .5s;
}
.inputUser:focus ~ .labelInput,
.inputUser:valid ~ .labelInput{
top: -20px;
font-size: 12px;
color: dodgerblue;
}
#data_entrada{
border: none;
padding: 8px;
border-radius: 10px;
outline: none;
font-size: 15px;
}
#submit{
background-image: linear-gradient(to right,rgb(14, 92, 197), rgb(90, 20, 220));
width: 100%;
margin-top: 0px;
border: 10px;
padding: 20px;
color: white;
font-size: 15px;
cursor: pointer;
border-radius: 10px;
text-align: center;
}

#submit:hover{
background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
}
</style>            
</head>
<body>
<a href="tabela_produtos.php" style='color: white; left: 85%; position: absolute; top: 5%;'>Voltar para a lista</a>
<?php
// Verifique se o ID do produto foi passado através do método POST
if(isset($_POST['id'])) {
$id = $_POST['id'];

// Conexão com o banco de dados SQLite
$db = new SQLite3('produtos_novos.db');

// Consulta para selecionar o produto com base no ID
$stmt = $db->prepare('SELECT * FROM produtos WHERE id = :id');
$stmt->bindValue(':id', $id, SQLITE3_INTEGER);
$result = $stmt->execute();
$row = $result->fetchArray();

// Verifique se o produto foi encontrado
if($row) {
?>
<div class="box">
<form action="atualizar.php" method="post">
<fieldset>
<legend><b>Sistema Estoque</b></legend>
<br>
<!-- Campo hidden para enviar o ID do produto -->
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<br>
<div class="inputBox">
<input type="text" class="inputUser" id="cliente" name="cliente" value="<?php echo $row['cliente']; ?>"><br><br>
<label for="cliente" class="labelInput">Cliente:</label>
</div>
<br>
<div class="inputBox">
<input type="text" class="inputUser" id="nome" name="nome" value="<?php echo $row['nome']; ?>"><br><br>
<label for="nome" class="labelInput">Nome do Produto:</label>
</div>
<br>
<div class="inputBox">
<input type="number" class="inputUser" id="quantidade" name="quantidade" value="<?php echo $row['quantidade']; ?>"><br><br>
<label for="quantidade" class="labelInput">Quantidade:</label>
</div>
<br>
<div class="inputBox">
<input type="text" class="inputUser" id="preco" name="preco" value="<?php echo $row['preco']; ?>"><br><br>
<label for="preco" class="labelInput">Preço:</label>
</div>
<br>
<div class="inputBox">
<label for="data_alteracao">Data de Alteraçao:</label>
<input type="date" name="data_alteracao" id="data_alteracao" value="<?php echo $row['data_alteracao']; ?>">
<br><br>
</div>
<br>
<input type="submit" class='submit' name='submit' id='submit' value="Atualizar Produto">
  
</fieldset>
</form>
</div>
<?php
} else {
echo "Produto não encontrado.";
}
} else {
echo "ID do produto não especificado.";
}
?>
</body>            
</html>

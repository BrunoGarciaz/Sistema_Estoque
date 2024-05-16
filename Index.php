<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | ESTOQUE</title>
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
            background-color: solid indigo;
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
    <div class="box">
        <form action="produto.php" method="POST">
        
            <fieldset>
                <legend><b>Sistema Estoque</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="cliente" id="cliente" class="inputUser" required>
                    <label for="cliente" class="labelInput">Cliente</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="quantidade" id="quantidade" class="inputUser" required>
                    <label for="quantidade" class="labelInput">Quantidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="preco" step="0.01" id="preco" class="inputUser" required>
                    <label for="preco" class="labelInput">Preço</label>
                </div>
                <br><br>
                <label for="data_entrada"><b>Data Entrada:</b></label>
                <input type="date" name="data_entrada" id="data_entrada" required>
                <br><br><br>
                 <input type="submit" name="submit" id="submit"><br>
            </fieldset>
        </form>
    </div>
    <a href='tabela_produtos.php' style='color: whitesmoke; 
        left: 5%; 
        position: absolute; 
        top: 5%; 
        font-family: Georgia; 
        font-size: 17px; 
        font-style: italic;'>Ver Produtos </a>
</body>
</html>

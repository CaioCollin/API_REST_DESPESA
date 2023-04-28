<?php

require 'conexao.php';

$id_despesa = $_POST['id_despesa'];
$descricao = $_POST['descricao'];
$despesa_DATA = $_POST['despesa_DATA'];
$pagamento = $_POST['pagamento'];
$valor = $_POST['valor'];
$categoria = $_POST['categoria'];


$sql = "update controladorgastos set descricao ='$descricao' ,despesa_DATA = '$despesa_DATA' , pagamento = '$pagamento' , valor = '$valor', categoria = '$categoria' where id_despesa = $id_despesa";                               

$result = mysqli_query($con, $sql);

if ($result == true) {
    echo "Alterado com Sucesso";
} else {
    echo "Erro ao Alterar";
}
?>
<a href="listar_despesas.php"> VOLTAR PARA LISTA </a>
        
            
<?php

require 'conexao.php';

$valor = $_POST["valor"];
$descricao = $_POST["descricao"];
$despesa_DATA = $_POST["despesa_DATA"];
$tipoPagamento = $_POST['pagamento'];
$categoria = $_POST['categoria'];


$sql = "insert into controladorgastos (valor,descricao,despesa_DATA,pagamento,categoria) values('$valor' ,'$descricao','$despesa_DATA','$tipoPagamento','$categoria')";

$result = mysqli_query($con, $sql);

if ($result == true) {
    echo "Cadastrado com Sucesso";
} else {
    echo "Erro ao Cadastrar";
}

?>
<br><br>
<a href="listar_despesas.php">LISTAR</a><br>
<a href="despesamesVigente.php">DESPESAS DO MES VIGENTE</a>
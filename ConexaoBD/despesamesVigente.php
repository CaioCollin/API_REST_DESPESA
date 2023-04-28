<?php
require 'conexao.php';
echo "<br> DESPESAS DO MÊS VIGENTE <br><br><hr>";
$mes_atual = date('m');
$ano_atual = date('Y');

// Execute uma consulta SQL para selecionar os registros do mês atual
$query = "SELECT * FROM controladorgastos WHERE MONTH(despesa_DATA) = $mes_atual AND YEAR(despesa_DATA) = $ano_atual";
$resultado = mysqli_query($con, $query);

// Exiba os registros do mês atual - exibir ID / e as demais informção
while ($registro = mysqli_fetch_assoc($resultado)) {

    $id_tarefa = $registro['id_despesa'];
    $valor = $registro['valor'];
    $descricao = $registro['descricao'];
    $despesa_DATA = $registro['despesa_DATA'];
    $tipoPagamento = $registro['pagamento'];
    $categoria = $registro['categoria'];

    echo
    "<br>Código :" . $id_tarefa . "<br>" .
    "Descrição :" . $descricao . "<br>" .
    "Data : " . $despesa_DATA . "<br>" .
    "Pagamento :" . $tipoPagamento . "<br>" .
    "Valor :" . $valor . "<br>" .
    "CEP :" . $categoria . "<br><br><hr>";
    ?>
    <small><a href="viaCep.php?id=<?php echo $id_tarefa ?>" style="color: green;" >EXIBIR ENDEREÇO</a> - </small>
    <small><a href="excluir_despesas.php?id=<?php echo $id_tarefa ?>" style="color: red;">EXCLUIR DESPESAS</a> - </small>
    <small><a href="frm_despesasAlterar.php?id=<?php echo $id_tarefa ?>" style="color: green;">ALTERAR DESPESAS</a></small><hr>
    <?php
}
?>


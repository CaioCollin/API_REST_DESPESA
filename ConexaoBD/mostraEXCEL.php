<?php

require './conexao.php';

$sql = "SELECT * FROM controladorgastos ";
$result = mysqli_query($con, $sql);

header('Content-type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename=arquivo.csv');

$resultado = fopen("php://output", 'w');

fprintf($resultado, chr(0xEF).chr(0xBB).chr(0xBF));

$cabecalho = ['id_despesa', 'valor', 'descricao', 'despesa_DATA', 'pagamento', 'categoria'];
fputcsv($resultado, $cabecalho, ';');

while ($dados = mysqli_fetch_assoc($result)) {
    $id_tarefa = $dados['id_despesa'];
    $valor = $dados['valor'];
    $descricao = $dados['descricao'];
    $despesa_DATA = date('d/m/Y', strtotime($dados['despesa_DATA']));
    $tipoPagamento = $dados['pagamento'];
    $categoria = $dados['categoria'];
    
    $linha = [$id_tarefa, $valor, $descricao, $despesa_DATA, $tipoPagamento, $categoria];
    fputcsv($resultado, $linha , ';');
}

fclose($resultado);

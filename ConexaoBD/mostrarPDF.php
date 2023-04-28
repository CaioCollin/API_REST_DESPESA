<?php

include './conexao.php';

$sql = "SELECT * FROM controladorgastos ORDER BY id_despesa DESC;";

$result = mysqli_query($con, $sql);

$html = "<table>";
$html .= "<tr>";
$html .= "<th>ID</th>";
$html .= "<th>Descrição</th>";
$html .= "<th>Valor</th>";
$html .= "<th>Data</th>";
$html .= "<th>Pagamento</th>";
$html .= "<th>Categoria</th>";
$html .= "</tr>";
while ($dados = mysqli_fetch_assoc($result)) {
    $id_tarefa = $dados['id_despesa'];
    $valor = $dados['valor'];
    $descricao = $dados['descricao'];
    $despesa_DATA = $dados['despesa_DATA'];
    $tipoPagamento = $dados['pagamento'];
    $categoria = $dados['categoria'];
    

    $html .= "<tr>";
    $html .= "<td>". $id_tarefa ."</td>";
    $html .= "<td>". $descricao ."</td>";
    $html .= "<td>". $valor ."</td>";
    $html .= "<td>". $despesa_DATA ."</td>";
    $html .= "<td>". $tipoPagamento ."</td>";
    $html .= "<td>". $categoria ."</td>"; 
    $html .= "</tr>";
}

$html .= "</table>"; 

// CSS
$css = "
table {
    border-collapse: collapse;
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    font-family: Arial, sans-serif;
    font-size: 14px;
}
th, td {
    padding: 10px;
    text-align: left;
    vertical-align: top;
    border: 1px solid #ddd;
}
th {
    background-color: #f2f2f2;
    font-weight: bold;
}
tr:nth-child(even) {
    background-color: #f9f9f9;
}";

use Dompdf\Dompdf;

require '../dompdf/autoload.inc.php';
$dompdf = new Dompdf();

$html_with_css = "<html><head><style>" . $css . "</style></head><body>" . $html . "</body></html>";

$dompdf->loadHtml($html_with_css);
$dompdf->set_option('isHtml5ParserEnabled', true);

$dompdf->set_option('defaultFont', 'sans');

$dompdf->setPaper('A4', 'portrait');

$dompdf->getOptions()->setIsPhpEnabled(true);

$dompdf->render();

$dompdf->stream();

?>

<?php
require 'conexao.php';
$sql = "select * from controladorgastos";

$result = mysqli_query($con, $sql);

echo '<br>LISTA GERAL DE DESPESAS <br><br>';
?>
<small><a href="mostrarPDF.php" style="color:orange">GERAR PDF</a></small><hr>
<small><a href="mostraEXCEL.php" style="color:green">GERAR EXCEL</a></small><hr>
<?php

// traz todas informação do Banco = controladorgastos  
while ($dados = mysqli_fetch_assoc($result)) {
    $id_tarefa = $dados['id_despesa'];
    $valor = $dados['valor'];
    $descricao = $dados['descricao'];
    $despesa_DATA = $dados['despesa_DATA'];
    $tipoPagamento = $dados['pagamento'];
    $categoria = $dados['categoria'];
    
    echo
    "<br>Código :" . $id_tarefa . "<br>" .
    "Valor :" . $valor . "<br>" .
    "Descrição :" . $descricao . "<br>" .
    "Data : " . $despesa_DATA . "<br>".
    "Pagamento :" . $tipoPagamento ."<br>".
    "CEP :" .$categoria . "<br><br>"; 
    
    ?>
<small><a href="viaCep.php?id=<?php echo $id_tarefa?>" >EXIBIR ENDEREÇO</a> - </small>
<small><a href="excluir_despesas.php?id=<?php echo $id_tarefa?>" >EXCLUIR DESPESAS</a> - </small>
<small><a href="frm_despesasAlterar.php?id=<?php echo $id_tarefa?>" >ALTERAR DESPESAS</a></small><hr>


<?php
}
?>
 
<br><a href="frm_despesas.html"> FORMULÁRIO DE CADASTRO DE DESPESAS </a><br>

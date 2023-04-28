<?php
require 'conexao.php';

$id_desp = $_GET['id'];

$sql = "select * from controladorgastos where id_despesa = $id_desp";

$result = mysqli_query($con, $sql);

$dados = mysqli_fetch_assoc($result);

$id_despesa = $dados['id_despesa'];
$descricao = $dados['descricao'];
$despesa_DATA = $dados['despesa_DATA'];
$pagamento = $dados['pagamento'];
$valor = $dados['valor'];
$categoria = $dados['categoria'];
?>

<br><h2>ALTERAR DESPESAS</h2>
<small><a href="frm_despesas.html">VOLTAR PARA O CADASTRO</a></small>
<br><br><hr>
<form action="alterar_despesas.php" method="POST">

    <label for="id_despesa"> Código: </label> 
    <input type="text" readonly id="id_despesa" name="id_despesa" value="<?php echo $id_despesa ?>"> <br><br>

    <label for="descricao"> descricao: </label>    
    <input type="text" id="descricao" name="descricao" value="<?php echo $descricao ?>"><br><br>

    <label for="despesa_DATA"> Data: </label> 
    <input type="date" id="despesa_DATA" name="despesa_DATA" required value="<?php echo $despesa_DATA ?>"><br><br>

    <label for="pagamento">Forma de Pagamento:</label>
    <select name="pagamento">
        <option value="DINHEIRO"<?php if ($pagamento == 'DINHEIRO') { echo ' selected'; } ?>>DINHEIRO</option>
        <option value="DÉBITO"<?php if ($pagamento == 'DÉBITO') { echo ' selected'; } ?>>DÉBITO</option>
        <option value="CRÉDITO"<?php if ($pagamento == 'CRÉDITO') { echo ' selected'; } ?>>CRÉDITO</option>
        <option value="PIX"<?php if ($pagamento == 'PIX') { echo ' selected'; } ?>>PIX</option>
    </select>
    <br><br>

    <label for="valor"> Valor: </label>    
    <input type="text" name="valor" value="<?php echo $valor ?>"><br><br>

    <label for="categoria"> CEP: </label>   
    <input type="text" name="categoria" value="<?php echo $categoria ?>"><br><br>


    <input type="submit" value="ALTERAR DESPESA">

</form>

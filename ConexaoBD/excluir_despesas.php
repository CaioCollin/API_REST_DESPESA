<?php
require 'conexao.php';

$id_despasa = $_GET["id"];

$sql = "delete from controladorgastos where  id_despesa = $id_despasa";

$result = mysqli_query($con, $sql);

if ($result == true) {
    echo "Excluido com Sucesso";
} else {
    echo "Erro ao excluir";
}
?>

<a href="listar_despesas.php">Voltar</a>

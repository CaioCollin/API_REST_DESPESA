<?php

require 'conexao.php';
$id_desp = $_GET["id"];
$sql = "select * from controladorgastos where id_despesa=$id_desp";

$result = mysqli_query($con, $sql);

echo "<br>LISTA DE CONSULTA DE ENDEREÇO ";

?>
<small><a href="frm_despesas.html">VOLTAR PARA O CADASTRO</a></small><br><br><hr>
<?php
while ($dados = mysqli_fetch_assoc($result)) {
    $id_despasa = $dados['id_despesa'];
    $categoria = $dados['categoria'];

    echo "<br>CÓDIGO : " . $id_despasa . "<br>".
         "CEP : " . $categoria . "<br>";
    
    $cep = "$categoria"; // Insira aqui o CEP desejado

    $url = "https://viacep.com.br/ws/{$cep}/json/";
    $endereco = json_decode(file_get_contents($url));

    if (isset($endereco->erro)) {
        echo "CEP inválido!";
    } else {
        echo $listarEndereco = "RUA : {$endereco->logradouro} <br>BAIRRO : {$endereco->bairro} <br>LOCALIDADE : {$endereco->localidade} / {$endereco->uf} <br><br><hr>";
    }
}
?>


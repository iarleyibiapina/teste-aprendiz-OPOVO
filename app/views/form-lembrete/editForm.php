<?php
require '../../data/conexao.php';

// pegando dados
$resultado = array();

try{
    $sql = "SELECT * FROM opovo.lembrete WHERE id_lembrete = :id_lembrete";

    $execucao = $pdo->prepare($sql);

    $dados = array(
        ':id_lembrete' => $_GET['id'],
    );
    $execucao->execute($dados);

    if($execucao->rowCount() == 1){
        $resultado = $execucao->fetchAll();
        $resultado = $resultado[0];
    } else {
        die("falha");
    }
} catch (PDOException $error){
    header("Location: ./painelLembretes.php?erroTrazerDados");
    die($error->getMessage());
}

// testes
// var_dump($resultado);
// print_r($resultado);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $resultado['titulo'];?></title>
</head>
<body>
    <form action="../../model/processType.php?id=<?php echo $resultado['id_lembrete'];?>" method="post">
        <label for="titulo" >Titulo</label>
        <input type="text" name="titulo" value="<?php echo $resultado['titulo'];?>" autofocus require maxlength="50">
        <label for="descricao">Descricao</label>
        <input type="text" name="descricao" value="<?php echo $resultado['descricao'];?>" require maxlength="50">
        <button type="submit" name="type-process" value="edit">Enviar</button>
    </form>
    <a href="../painelLembretes.php">Voltar</a>

</body>
</html>
<?php
require '../../data/conexao.php';

$resultado = array();

try{
    $sql = "SELECT * FROM opovo.lembrete    WHERE id_lembrete = :id_lembrete";

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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $resultado['titulo'];?></title>
</head>
<body>
    <form action="../../model/processType.php?id_lembrete=<?php echo $resultado['id_lembrete'];?>" method="post">
        <label for="titulo">titulo</label>
        <input type="text" name="titulo" value="<?php echo $resultado['titulo'];?>" placeholder="titulo" readonly>
        <label for="descricao">descricao</label>
        <input type="text" name="descricao" value="<?php echo $resultado['descricao'];?>" placeholder="descricao" readonly>
        <button type="submit" name="type-process" value="remove">Enviar</button>
    </form>
    <a href="../painelLembretes.php">Voltar</a>

</body>
</html>
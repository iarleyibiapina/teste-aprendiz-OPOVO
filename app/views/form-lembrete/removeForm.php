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
    <link rel="stylesheet" href="../../src/style/body.css">
    <link rel="stylesheet" href="../../src/style/allBtn.css">
</head>
<body>
    <header class="header-remove">
        <h1>Excluir lembrete</h1>
    </header>
    <div class="form">
    <form class="form-content" action="../../model/processType.php?id_lembrete=<?php echo $resultado['id_lembrete'];?>" method="post">
        <label for="titulo"><strong>Titulo</strong></label>
        <input type="text" name="titulo" value="<?php echo $resultado['titulo'];?>" placeholder="Titulo" readonly>
        <label for="descricao"><strong>Descrição</strong></label>
        <input type="text" name="descricao" value="<?php echo $resultado['descricao'];?>" placeholder="Descrição" readonly>
        <div class="buttons">
            <a class="btn btn-return" href="../painelLembretes.php">Voltar</a>
            <button class="btn btn-remove" type="submit" name="type-process" value="remove" style="margin-top: 0;"><strong>Excluir</strong></button>
        </div>
    </form>
    </div>
</body>
</html>
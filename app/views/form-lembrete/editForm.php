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
    <link rel="stylesheet" href="../../src/style/body.css">
    <link rel="stylesheet" href="../../src/style/allBtn.css">
</head>
<body>
    <header class="header-create">
        <h1>Editar lembrete:</h1>
    </header>
    <div class="form">
    <form class="form-content" action="../../model/processType.php?id=<?php echo $resultado['id_lembrete'];?>" method="post">
        <label for="titulo" ><strong>Titulo</strong></label>
        <input type="text" name="titulo" value="<?php echo $resultado['titulo'];?>" autofocus require maxlength="50">
        <label for="descricao"><strong>Descrição</strong></label>
        <input type="text" name="descricao" value="<?php echo $resultado['descricao'];?>" require maxlength="50">
        <div class="buttons">
            <a class="btn btn-return" href="../painelLembretes.php">Voltar</a>
            <button class="btn btn-send" type="submit" name="type-process" value="edit">Enviar</button>
        </div>
    </form>
    </div>

</body>
</html>
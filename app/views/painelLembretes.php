<?php
require '../data/conexao.php';

// pegando dados
try{
    $sql = "SELECT * FROM opovo.lembrete";
    $execucao = $pdo->prepare($sql);
    if($execucao->execute()){
        $duvidas = $execucao->fetchAll();
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
        <title>Document</title>
    </head>
    <body>
        <a href="./form-lembrete/createForm.php">Criar</a>
        <a href="../../index.php">Voltar para pagina inicial</a>
        <?php foreach($duvidas as $coluna){ ?>
            <hr>
            <ul>
        <h1><?php echo $coluna['titulo']?></h1>
        <p><?php echo $coluna['descricao']?></p>
    </ul>
    <a href="./form-lembrete/editForm.php?<?php echo "id=".$coluna['id_lembrete']?>">Editar</a>
    <a href="./form-lembrete/removeForm.php?<?php echo "id=".$coluna['id_lembrete']?>">Excluir</a>
    <hr>
    <?php } ?>
</body>
</html>
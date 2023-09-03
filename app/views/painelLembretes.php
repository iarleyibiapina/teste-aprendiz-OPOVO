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

// deletando todos os dados
if(isset($_GET['deletar_tudo'])){
    try{
    $sql = "DELETE FROM opovo.lembrete";
    $execucao = $pdo->prepare($sql);
     if($execucao->execute()){
        header("Location: ./painelLembretes.php?todosDadosApagados");
     };
        
    } catch (PDOException $error){
        header("Location: ./painelLembretes.php?erroApagarTodosDados");        
        die($error->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lembretes criados</title>
        <link rel="stylesheet" href="../src/style/allBtn.css">
        <link rel="stylesheet" href="../src/style/body.css">
    </head>
    <body>
    <header class="header-create">
        <h1>Aqui está os lembretes criados</h1>
    </header>
    <div class="nav-btn">
        <a class="btn" href="./form-lembrete/createForm.php">Criar novos lembretes</a>
        <a class="btn" href="../../index.php">Voltar para pagina inicial</a>
        <a class="btn btn-removeAll" href="" onclick="alterar_url('?deletar_tudo=true')">Excluir todos os lembretes criados</a>
    </div>

    <section class="created-lembretes">
        <?php foreach($duvidas as $coluna){ ?>
        
        <div class="container-lembrete">
        <hr>
            <div class="text-content">
                <ul>
                    <h1><?php echo $coluna['titulo']?></h1>
                    <p><?php echo $coluna['descricao']?></p>
                </ul>
            </div>
            <div class="buttons">
                <a class="btn btn-edit" href="./form-lembrete/editForm.php?<?php echo "id=".$coluna['id_lembrete']?>">Editar</a>
                <a class="btn btn-remove" href="./form-lembrete/removeForm.php?<?php echo "id=".$coluna['id_lembrete']?>">Excluir</a>
            </div>
        <hr>    
        </div>
        <?php } ?>
    </section>

    <script src="../src/js/painelLembretes.js"></script>
</body>
</html>
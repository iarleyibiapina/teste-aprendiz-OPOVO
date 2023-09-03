<?php
if(!empty($_POST)){
    require '../data/conexao.php';
    // pegando o value do submit do formulario
    switch($_POST['type-process']){
        case 'create':
           try{
            // preparando consulta com PDO
                $sql = "INSERT INTO opovo.lembrete(titulo, descricao) VALUES (:titulo, :descricao)";

                $execucao = $pdo->prepare($sql);

                $dados = array(
                    ':titulo' => $_POST['titulo'],
                    ':descricao' => $_POST['descricao']
                );
            
                if($execucao->execute($dados)){
                    // sucesso ao enviar dados
                    header("location: ../views/painelLembretes.php?dadosInserido");
                } 
            } catch (PDOException $error){
                // erro ao enviar dados
                header("Location: ../views/painelLembretes.php?errorTryCreateDados");
                die($error->getMessage());
            } 
            break;
        case 'edit':
                try{
                $sql = "UPDATE opovo.lembrete SET titulo = :titulo, descricao = :descricao WHERE id_lembrete = :id_lembrete";
            
                $execucao = $pdo->prepare($sql);
                // pega id do lembrete, que foi enviado pela url.
                $dados = array(
                    ':id_lembrete' => $_GET['id'],
                    ':titulo' => $_POST['titulo'],
                    ':descricao' => $_POST['descricao']
                );

                    print_r($dados);
                    $execucao->execute($dados);
                    
                if($execucao->execute($dados)){
                    header("location: ../views/painelLembretes.php?dadosAlterado");

                } 
            } catch (PDOException $error){
                header("Location: ../views/painelLembretes.php?errorTryEditDados");
                die($error->getMessage());
            } 
            break;
        case 'remove':
                try{
                $sql = "DELETE FROM opovo.lembrete WHERE id_lembrete = :id_lembrete";
            
                $execucao = $pdo->prepare($sql);
                // pega id do lembrete, que foi enviado pela url.
                $dados = array(
                    ':id_lembrete' => $_GET['id_lembrete'],
                );
            
                if($execucao->execute($dados)){
                    header("location: ../views/painelLembretes.php?dadosRemovido");
                } 
            } catch (PDOException $error){
                header("Location: ../views/painelLembretes.php?errorTryRemoveDados");
                die($error->getMessage());
            } 
            break;
        // se o tipo value não for encontrado
        default: 
        header('location: ../views/painelLembretes.php?errorSubmitType');
        break;
    }
    // caso inputs vazios
} else {
    header('location: ../views/painelLembretes.php?errorEmptyInputs');
}
?>
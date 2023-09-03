<?php
if(!empty($_POST)){
    require '../data/conexao.php';
    switch($_POST['type-process']){
        case 'create':
           try{
                $sql = "INSERT INTO opovo.lembrete(titulo, descricao) VALUES (:titulo, :descricao)";

                $execucao = $pdo->prepare($sql);

                $dados = array(
                    ':titulo' => $_POST['titulo'],
                    ':descricao' => $_POST['descricao']
                );
            
                if($execucao->execute($dados)){
                    header("location: ../views/painelLembretes.php?inserido");
                } 
            } catch (PDOException $error){
                header("Location: ../views/painelLembretes.php?errorTryCreate");
                die($error->getMessage());
            } 
            break;
        case 'edit':
                try{
                $sql = "UPDATE opovo.lembrete SET titulo = :titulo, descricao = :descricao WHERE id_lembrete = :id_lembrete";
            
                $execucao = $pdo->prepare($sql);
            
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
                header("Location: ../views/painelLembretes.php?errorTryEdit");
                die($error->getMessage());
            } 
            break;
        default: 
        header('location: ../views/painelLembretes.php?errorSubmitType');
        break;
    }
} else {
    header('location: ../views/painelLembretes.php');
}
?>
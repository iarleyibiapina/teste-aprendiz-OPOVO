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
        default: 
        header('location: ../views/painelLembretes.php?errorSubmitType');
        break;
    }
} else {
    header('location: ../views/painelLembretes.php');
}
?>
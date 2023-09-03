<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Lembrete</title>
    <link rel="stylesheet" href="../../src/style/body.css">
    <link rel="stylesheet" href="../../src/style/allBtn.css">
</head>
<body>
    <header class="header-create">
        <h1>Criar novos lembretes:</h1>
    </header>
    <div class="form">
    <form class="form-content" action="../../model/processType.php" method="post">
        <label for="titulo"><strong>Titulo</strong></label>
        <input type="text" name="titulo" placeholder="Titulo" required maxlength="50" autofocus>
        <label for="descricao"><strong>Descrição</strong></label>
        <input type="text" name="descricao" placeholder="Descrição" required maxlength="200">
        <div class="buttons">
            <a class="btn btn-return" href="../painelLembretes.php">Voltar</a>
        <button class="btn btn-send" type="submit" name="type-process" value="create"><strong>Enviar</strong></button>
        </div>
    </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Lembrete</title>
</head>
<body>
    <form action="../../model/processType.php" method="post">
        <label for="titulo">titulo</label>
        <input type="text" name="titulo" placeholder="titulo" required maxlength="50" autofocus>
        <label for="descricao">descricao</label>
        <input type="text" name="descricao" placeholder="descricao" required maxlength="200">
        <button type="submit" name="type-process" value="create">Enviar</button>
    </form>
    <a href="../painelLembretes.php">Voltar</a>
</body>
</html>
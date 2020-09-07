<?php
session_start();

$_SESSION['logado'] = $_COOKIE['logado'];
if (!$_SESSION['logado']) {
    header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>

<body>
    <h1>Conectado com sucesso</h1>
    <a href="sair.php"><button>Sair</button></a>
</body>

</html>
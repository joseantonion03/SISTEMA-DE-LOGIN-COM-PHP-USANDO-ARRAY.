<?php
//AUTHOR: José Antônio
//INSTAGRAM: https://www.instagram.com/jose.antonion/
//GITHUB: https://github.com/joseantonion03/
//TÍTULO: SISTEMA DE LOGIN COM PHP, USANDO ARRAYS.
session_start();

unset($_SESSION['error']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $email = $_POST['emailUS'];
    $senha = $_POST['senhaUS'];

    $bancoDeDados = [
        [
            'nome' => "admin",
            'email' => "admin@login.com",
            'senha' => "admin",
            'cidade' => "Carinhanha",
            'idade' => 18,
            'sexo' => 'M'
        ],
        [
            'nome' => "João",
            'email' => "joao@login.com",
            'senha' => "joao",
            'cidade' => "São Paulo",
            'idade' => 25,
            'sexo' => 'M'
        ],
        [
            'nome' => "Alice",
            'email' => "alice@login.com",
            'senha' => "alice",
            'cidade' => "Rio de Janeiro",
            'idade' => 19,
            'sexo' => 'F'
        ]
    ];

    foreach ($bancoDeDados as $dados) {
        $emailValidado = $email == $dados['email'];
        $senhaValidado = $senha == $dados['senha'];

        if ($emailValidado && $senhaValidado) {
            setcookie('logado', 1, time() + 60 * 60 * 60);
            $_SESSION['logado'] = 'true';
            header('location: perfil.php');
        } elseif (!$email || !$senha) {
            $_SESSION['error'] = 'Informe os dados solicitados';
        } else {
            $_SESSION['error'] = 'E-mail ou senha inválida';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/CSS/style.css">
</head>

<body>
    <div class="container">
        <form action="#" method="post">
            <h2>Login</h2>
            <input type="email" placeholder="Email" name="emailUS">
            <input type="password" placeholder="Senha" name="senhaUS">
            <input type="submit" value="Logar">
            <div class="erros">
                <?php if (!empty($_SESSION['error'])) : ?>
                    <p><?= $_SESSION['error'] ?></p>
                <?php endif ?>
            </div>
        </form>
    </div>
</body>

</html>
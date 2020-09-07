<?php
session_start();
unset($_COOKIE['logado']);
unset($_SESSION['logado']);
setcookie('logado', null);
session_destroy();
header('location: index.php');

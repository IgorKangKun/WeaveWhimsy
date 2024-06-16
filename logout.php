<?php
session_start(); // Acede à sessão
// Destroi todas as variáveis de sessão
session_unset();
// Destroi a sessão
session_destroy();
// Redireciona para a página de login
header("Location: WeaveWhimsy.html");
 exit();
?>
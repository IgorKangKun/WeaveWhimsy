<?php
// Estabelece uma conexão com o servidor de base de dados
$connection = mysqli_connect("localhost", "root", "");

// Seleciona a base de dados pretendida
$db = mysqli_select_db($connection, "loginww");

 session_start();// Inicializa a sessão

 // lê a variável de sessão para confirmar se existe na base de dados
$user=$_SESSION['login_user'];

// Query SQL para recolher toda a informação de um utilizador específico
$resultado=mysqli_query($connection, "select username from utilizadores where username='$user'");
 $linha = mysqli_fetch_array($resultado);
 $utilizadorLogado =$row['username'];

 if(!isset($utilizadorLogado)){
 mysqli_close($connection); // Fecha a conexão à BD
 header('Location: profile.php'); // Redireciona para a página inicial
 }
?>
<?php
session_start();
$error = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
        $error = "Utilizador ou password inválido(s)";
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        // Estabelece a conexão com o SGBD - MySQL
        $connection = mysqli_connect("localhost", "root", "", "loginww");

        // Verifica a conexão
        if ($connection === false) {
            die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
        }

        // Para proteger contra injeção de SQL por motivos de segurança, usa prepared statements
        $stmt = $connection->prepare("SELECT password FROM utilizadores WHERE username=? AND email=?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();

        // Verifica se o usuário existe
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($hashed_password);
            $stmt->fetch();
            // Verifica a senha
            if (password_verify($password, $hashed_password)) {
                $_SESSION['login_user'] = $username; // Inicializa a sessão
                header("location: profile.php"); // Redireciona para outra página
            } else {
                $error = "Username, Email or Password is invalid";
            }
        } else {
            $error = "Username, Email or Password is invalid";
        }

        // Fecha a declaração e a conexão
        $stmt->close();
        mysqli_close($connection);
    }
}
?>
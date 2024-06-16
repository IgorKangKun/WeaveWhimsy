<?php
session_start(); // Inicia a sessão para armazenar variáveis de sessão

$error = ''; // Variável para armazenar mensagens de erro

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
        $error = "Utilizador, Email ou password inválido(s)";
    } else {
        // Coleta os dados do formulário
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        // Estabelece a conexão com o SGBD - MySQL
        $connection = new mysqli("localhost", "root", "", "loginww");

        // Verifica se a conexão foi estabelecida
        if ($connection->connect_error) {
            die("Conexão falhou: " . $connection->connect_error);
        }

        // Sanitiza os dados recebidos
        $username = $connection->real_escape_string($username);
        $password = $connection->real_escape_string($password);
        $email = $connection->real_escape_string($email);

        // Hashea a senha antes de armazenar
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insere os dados na tabela `utilizadores`
        $query = "INSERT INTO utilizadores (username, password, email) VALUES ('$username', '$hashed_password', '$email')";
        if ($connection->query($query) === TRUE) {
            // Registro bem-sucedido, inicializa a sessão
            $_SESSION['login_user'] = $username;
            header("location: profile.php"); // Redireciona para a página de perfil
        } else {
            $error = "Erro: " . $query . "<br>" . $connection->error;
        }

        // Fecha a conexão
        $connection->close();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeaveWhimsy-Login</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  
  <section class="vh-100" style="background-color: #fce5ca;">
    <nav class="navbar navbar-expand-lg bg-black">

      <div class="container-fluid col-11">
          <h1 class="titulo" href="">Weave</br>Whimsy</h1>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon  c-risco"></span>
          </button>
          <div class="collapse navbar-collapse d-flex justify-content-end" >
              <i class="fa-regular fa-heart"></i>
              <i class="fa-solid fa-bag-shopping"></i>
              <a href="login.php"><i class="fa-solid fa-circle-user"></i></a>
          </div>
          
      </div>
  </nav>
  <form action="registo_User.php" method="post">
        <label for="username">Nome de Usuário:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Registrar">
    </form>
    <div>
        <?php echo $error; ?>
    </div>
  </section>
</body>
</html>
<?php
include('conexao.php'); // Inclui o script de login feito anteriormente
if(isset($_SESSION['login_user'])){ 
    header("location: profile.php");
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
            <div id="login">
                <h2>Formulário de Login</h2>
                <form action="login.php" method="post">
                    <label>UserName :</label><br>
                    <input id="name" name="username" placeholder="username" type="text"><br>
                    <label>Email:</label><br>
                    <input id="email" type="email" name="email" id="email"><br>
                    <label>Password :</label><br>
                    <input id="password" name="password" placeholder="**********"type="password"><br>
                    <input name="submit" type="submit" value=" Login ">
                    <span><?php echo $error; ?></span>
                </form>
                <b id="Regitar"><a href="registo_User.php">Registar</a></b>
            </div>
  </section>
</body>
</html>
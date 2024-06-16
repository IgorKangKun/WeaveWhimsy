<?php
session_start(); // Continua a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['login_user'])) {
    header("location: login.php"); // Redireciona para a página de login se não estiver logado
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Página Principal</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Cards.css"></div>
    </head>
    <body>
        
    <script src="/JAVASCRIPT/WeaveWhimsy.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <section class="vh-100" style="background-color: #fce5ca;">
    <nav class="navbar navbar-expand-lg bg-black">
    
        <div class="container-fluid col-11">
          <h1 class="titulo" href="">Weave</br>Whimsy</h1>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon  c-risco"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-center" id="navbarNav" >
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a aria-current="page" href="WeaveWhimsy.html">Home</a>  
                    </li>
                    <li class="nav-item">
                        <a href="#NewArrival">NewArrival</a>
                    </li>
                    <li class="nav-item dropdown justify-content-center">
                        <a class="nav-item dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#Clothes">Clothes</a>
                        <ul  class="dropdown-menu bg-transparent">
                            <li class="nav-item"> <a href="Streetwear.html">Streetwear</a></li>
                            <li class="nav-item"><a href="Rich.html">Rich</a></li>
                            <li class="nav-item"><a href="Family.html">Family</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
          <div class="collapse navbar-collapse d-flex justify-content-end" >
              <i class="fa-regular fa-heart"></i>
              <i class="fa-solid fa-bag-shopping"></i>
              <abbr title="Logout"><a href="logout.php"><i class="fa-solid fa-circle-user"></i></a></abbr>
            </div>
          
        </div>
  </nav>
  <div id="profile" style="font-size: 50px;">
      <?php  // Exibe uma mensagem de boas-vindas
      echo "Bem-vindo, " . $_SESSION['login_user']; ?>
  </div>
  </section>
    </body>
</html>
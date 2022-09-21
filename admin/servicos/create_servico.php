<?php
require_once('../../database.php');
if (isset($_POST) & !empty($_POST)) {
  $servicos['nome'] = $database->sanitize($_POST['nome']);
  $servicos['descricao'] = $database->sanitize($_POST['descricao']);
  $servicos['valor'] = $database->sanitize($_POST['valor']);

  $res = $database->create('tb_servicos', $servicos);
  if ($res) {
    header('location: index.php');
    //echo "Successfully inserted data";
  } else {
    echo "failed to insert data";
  }
}
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
  <!-- PAGE INFO -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>seudoguinhoTop</title>

  <!-- ÍCONES -->
  <link rel="stylesheet" href="../../assets/fonts/style.css" />

  <!-- SWIPER -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

  <!-- STYLES -->
  <link rel="stylesheet" href="../../style.css" />

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" />

  <!-- JQUERY -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>

<body>
  <header id="custom-header">
    <nav id="custom-nav" class="custom-container">
      <a class="custom-logo" href="#">seudoguinho<span>TOP</span> </a>
      <!-- menu -->
      <div class="custom-menu">
        <ul class="custom-grid">
          <li>
            <a href="#home" class="custom-title">Início</a>
          </li>
          <li>
            <a href="#about" class="custom-title">Sobre</a>
          </li>
          <li>
            <a href="#services" class="custom-title">Serviços</a>
          </li>
          <li>
            <a href="#testimonials" class="custom-title">Depoimentos</a>
          </li>
          <li>
            <a href="#contact" class="custom-title">Contato</a>
          </li>
        </ul>
      </div>
      <div class="custom-toggle icon-menu"></div>
      <div class="custom-toggle icon-close"></div>
    </nav>
  </header>
  <br />
  <hr />

  <div class="container">
    <!-- criando a área central -->
    <main class="container text-center">
      <br />
      <hr />
      <h1 class="text-center">Cadastrar novo Serviço</h1>
      <hr />
      <!-- iniciando o formulário -->
      <form action="create_servico.php" id="formCadastroServico" method="post" class="needs-validation" novalidate>
        <div class="container">
          <div class="col-md-12">
            <div class="form-row justify-content-center align-items-center">
              <div class="form-group col-md-4">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" id="inputNome" name="nome" required>
                <div class="valid-tooltip">
                  Looks good!
                </div>
              </div>
              <div class="form-group col-md-2">
                <label for="inputValor">Valor</label>
                <input type="text" class="form-control" id="inputValor" name="valor">
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-row justify-content-center align-items-center">
              <div class="form-group col-md-6">
                <label for="inputDescricao">Descrição do Serviço</label>
                <textarea class="form-control" id="inputDescricao" name="descricao" required rows="6"></textarea>
                <div class="valid-tooltip">
                  Looks good!
                </div>
              </div>
            </div>
          </div>
          <hr />
          <div class="row">
            <div class="col-md-12" style="text-align:right;">
              <a href="index.php" class="btn btn-secondary">Voltar</a>
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </div>
        </div>
      </form>
      <!-- finalizando o formulário -->
      <hr />
      <br />
    </main>
  </div>


  <!-- SWIPER -->
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <!-- scrollreveal -->
  <script src="https://unpkg.com/scrollreveal"></script>

  <script src="../../main.js"></script>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>

</html>
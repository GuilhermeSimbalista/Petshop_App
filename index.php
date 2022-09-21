<?php
require_once('database.php');
$servicos = $database->read('tb_servicos');
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
  <link rel="stylesheet" href="./assets/fonts/style.css" />

  <!-- SWIPER -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

  <!-- STYLES -->
  <link rel="stylesheet" href="style.css" />

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

  <main>
    <section class="custom-section" id="home">
      <div class="custom-container custom-grid">
        <div class="custom-image">
          <img src="https://images.unsplash.com/photo-1518914781460-a3ada465edec?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="Veterinário com filhote de cachorro no colo" />
        </div>
        <div class="custom-text">
          <h1>Cuidados essenciais para seu pet</h1>
          <p>
            Um petshop localizado em várias cidades do país, especialista nos
            melhores cuidados para seus amigos de 4 patas
          </p>
          <a class="custom-button" href="#staticBackdrop" data-toggle="modal" data-target="#staticBackdrop">Agendar um horário</a>
        </div>
      </div>

      <!-- Início do nosso modal para o agendamento -->
      <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold" id="staticBackdropLabel">Agendamento</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="create_form" action="create_agenda.php" method="post">
                <div>
                  <!-- futuramente vamos trocar o input abaixo -->
                  <!-- por um select -->
                  <label for="tipo-servico" data-error="wrong" data-succes="right">Tipo de Serviço</label>
                  <select name="tipo-servico" id="tipo-servico">
                    <?php if ($servicos) : ?>
                      <?php foreach ($servicos as $servico) : ?>
                        <option value="<?php echo $servico['id']; ?>">
                          <?php echo $servico['nome'] . " - Valor: R$ " . $servico['valor']; ?>
                        </option>
                      <?php endforeach; ?>
                    <?php else : ?>
                      <option>Não foi possível obter os dados do banco!</option>
                    <?php endif; ?>
                  </select>
                </div>
                <div>
                  <label for="data" data-error="wrong" data-succes="right">Data</label>
                  <input type="date" id="data" name="data" class="form-control validate">
                </div>
                <div>
                  <label for="hora" data-error="wrong" data-succes="right">Hora</label>
                  <input type="time" id="hora" name="hora" class="form-control validate">
                </div>
                <div>
                  <label for="cliente" data-error="wrong" data-succes="right">Nome do Cliente</label>
                  <input type="text" id="cliente" name="cliente" class="form-control validate">
                </div>
                <div>
                  <label for="nome-animal" data-error="wrong" data-succes="right">Nome do Animal</label>
                  <input type="text" id="nome-animal" name="nome-animal" class="form-control validate">
                </div>
                <div>
                  <label for="tipo-animal" data-error="wrong" data-succes="right">Tipo do Animal</label>
                  <select name="tipo-animal" id="tipo-animal">
                    <option value="Cachorro">Cachorro</option>
                    <option value="Gato">Gato</option>
                    <option value="Coelho">Coelho</option>
                    <option value="Galinha">Galinha</option>
                    <option value="Ornitorrinco">Ornitorrinco</option>
                  </select>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button id="insere_agenda" type="submit" name="insere_agenda" class="btn btn-primary">Agendar</button>
              <!-- script to check form submission -->
            </div>
          </div>
        </div>
      </div>
      <!-- Fim do nosso modal para o agendamento -->

    </section>
    <div class="divider-1"></div>

    <section class="custom-section" id="about">
      <div class="custom-container custom-grid">
        <div class="custom-image">
          <img src="https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1471&q=80" alt="Mulher dando banho em um cachorro" />
        </div>
        <div class="custom-text">
          <h2 class="custom-title">Sobre nós</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Necessitatibus deleniti perferendis vel molestiae soluta, quaerat
            beatae dicta ducimus praesentium architecto harum dolorum
            distinctio illo earum assumenda itaque. Omnis, quam repellat.
          </p>
          <br />
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Necessitatibus deleniti perferendis vel molestiae soluta, quaerat
            beatae dicta ducimus praesentium architecto harum dolorum
            distinctio illo earum assumenda itaque. Omnis, quam repellat.
          </p>
          <br />
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Necessitatibus deleniti perferendis vel molestiae soluta, quaerat
            beatae dicta ducimus praesentium architecto harum dolorum
            distinctio illo earum assumenda itaque. Omnis, quam repellat.
          </p>
        </div>
      </div>
    </section>

    <div class="divider-2"></div>

    <section class="custom-section" id="services">
      <div class="custom-container custom-grid">
        <header>
          <h2 class="custom-title">Serviços</h2>
          <p>
            Com menos de 05 anos no mercado, o
            <strong>seudoguinho<span>Top</span></strong> já conquistou
            clientes e donos em todos os estados do país graças aos seus
            cuidados e tratamentos exclusivos
          </p>
        </header>
        <div class="custom-cards custom-grid">
          <div class="custom-card">
            <i></i>
            <h3>Serviço Veterinário</h3>
            <p>
              Todo o acompanhamento veterinário necessário para a saúde do seu
              pet
            </p>
          </div>
          <div class="custom-card">
            <i></i>
            <h3>Banho e tosa</h3>
            <p>
              Profissionais altamente qualificados e experientes para deixar o
              visual do seu pet mais que caprichado
            </p>
          </div>
          <div class="custom-card">
            <i></i>
            <h3>Tratamentos</h3>
            <p>
              O <strong>seudoguinho<span>Top</span></strong> conta com uma
              ampla linha de produtos (medicamentos, cosméticos, brinquedos)
              para que seu pet possa ter o melhor do melhor
            </p>
          </div>
        </div>
      </div>
    </section>
    <div class="divider-1"></div>
    <section class="custom-section" id="testimonials">
      <div class="custom-container swiper">
        <header>
          <h2 class="custom-title">Depoimentos de quem já passou por aqui</h2>
        </header>
        <div class="testimonials swiper-container">
          <div class="swiper-wrapper">
            <div class="testimonial swiper-slide">
              <blockquote>
                <p>
                  <span>&ldquo;</span>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Rerum blanditiis saepe nam excepturi explicabo ipsa error
                  ipsam neque
                </p>
                <cite>
                  <img src="" alt="Foto de Cliente A" />
                  Wanessa Souza
                </cite>
              </blockquote>
            </div>

            <div class="testimonial swiper-slide">
              <blockquote>
                <p>
                  <span>&ldquo;</span>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Rerum blanditiis saepe nam excepturi explicabo ipsa error
                  ipsam neque
                </p>
                <cite>
                  <img src="" alt="Foto de Cliente B" />
                  Franciele Venega
                </cite>
              </blockquote>
            </div>

            <div class="testimonial swiper-slide">
              <blockquote>
                <p>
                  <span>&ldquo;</span>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Rerum blanditiis saepe nam excepturi explicabo ipsa error
                  ipsam neque
                </p>
                <cite>
                  <img src="" alt="Foto de Cliente C" />
                  Valeska Fabris
                </cite>
              </blockquote>
            </div>
          </div>
          <!-- If we need pagination -->
          <div class="swiper-pagination"></div>
        </div>
      </div>
      <div class="custom-container custom-grid">
        <div class="custom-text">
          <a class="custom-button" href="">Deixar Depoimento</a>
        </div>
      </div>
    </section>

    <div class="divider-2"></div>

    <section class="custom-section" id="contact">
      <div class="custom-container custom-grid">
        <div class="custom-text">
          <h2 class="custom-title">Entre em contato com a gente!</h2>
          <p>
            Entre em contato com a <strong>seudoguinho<span>Top</span></strong>, queremos tirar suas dúvidas, ouvir suas críticas e sugestões
          </p>
          <a href="https://api.whatsapp.com/send?phone=+5547988379508&text=Oi! Gostaria de agendar um horário" class="custom-button" target="_blank">
            <i class="icon-whatsapp"></i>
            Entrar em contato
          </a>
        </div>
        <div class="custom-links">
          <ul class="custom-grid">
            <li><i class="icon-phone"></i> 11 99845-6754</li>
            <li><i class="icon-map-pin"></i> R. Amauri Souza, 346</li>
            <li><i class="icon-mail"></i> contato@seudoguinhotop.com</li>
          </ul>
        </div>
      </div>
    </section>

    <div class="divider-1"></div>
  </main>

  <footer class="custom-section">
    <div class="custom-container custom-grid">
      <div class="brand">
        <a href="#home" class="logo logo-alt">
          seudoguinho<span>TOP</span>
        </a>
        <p>&#169; 2022 seudoguinhoTop</p>
        <p>Todos os direitos reservados.</p>
      </div>
      <div class="social">
        <a href="https://instagram.com" target="_blank">
          <i class="icon-instagram"></i>
        </a>
        <a href="https://facebook.com" target="_blank">
          <i class="icon-facebook"></i>
        </a>
        <a href="https://youtube.com" target="_blank">
          <i class="icon-youtube"></i>
        </a>
      </div>
    </div>
  </footer>

  <a href="#home" class="back-to-top">
    <i class="icon-arrow-up"></i>
  </a>


  <!-- SWIPER -->
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <!-- scrollreveal -->
  <script src="https://unpkg.com/scrollreveal"></script>

  <script src="main.js"></script>

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
  <script>
    $(document).on('click', '#insere_agenda', function() {
      var dataForm = $('#create_form').serialize();
      $.ajax({
        data: dataForm,
        type: "post",
        url: "create_agenda.php",
        success: function(response) {
          alert('Dados Salvos!');
          //alert(response);
        }
      });

    });
  </script>
</body>

</html>
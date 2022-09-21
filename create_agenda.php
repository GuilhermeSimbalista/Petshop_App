<?php
require_once('database.php');

if (isset($_POST) & !empty($_POST)) {
  $tipoServico = $_POST['tipo-servico'];
  $data = $database->sanitize($_POST['data']);
  $hora = $database->sanitize($_POST['hora']);
  $nomeCliente = $database->sanitize($_POST['cliente']);
  $nomeAnimal = $database->sanitize($_POST['nome-animal']);
  $tipoAnimal = $database->sanitize($_POST['tipo-animal']);

  $res = $database->create_agenda($tipoServico, $data, $hora, $nomeCliente, $nomeAnimal, $tipoAnimal);
  if ($res) {
    echo "Dados inseridos com sucesso!";
  } else {
    echo "Falha ao salvar dados!";
  }
}

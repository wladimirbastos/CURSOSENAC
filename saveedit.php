<?php 

session_start();
include_once "conexao.php";

if(isset($_POST["update"])){
  $id = $_POST["id"];
  $nome = $_POST["nome"];
  $escolaridade = $_POST["escolaridade"];
  $serie = $_POST["serie"];
  $email = $_POST["email"];
  $data_nasc = $_POST["data_nasc"];
  $telefone = $_POST["telefone"];
  $matricula = $_POST["matricula"];

  $sql = "UPDATE alunos SET nome = '$nome', email = '$email', serie = '$serie', matricula = '$matricula', data_nasc = '$data_nasc', escolaridade = '$escolaridade', telefone = '$telefone' WHERE id = '$id'";

  $resultado = $conexao->query($sql);
 
}

header("Location:sistema.php");

?>
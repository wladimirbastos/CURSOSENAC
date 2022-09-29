<?php

if(isset($_POST["submit"])){

  include_once "conexao.php";

  $nome = $_POST["nome"];
  $nivel = $_POST["nivel"];
  $data_admissao = $_POST["data_admissao"];
  $genero = $_POST["genero"];
  $disciplina = $_POST["disciplina"];

  $sql = "INSERT INTO professores (nome, nivel, data_admissao, genero, disciplina)
  VALUES ('$nome', '$nivel', '$data_admissao', '$genero', '$disciplina')";

  $resultado = $conexao->query($sql);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <title>Document</title>
  <style>
    .topo{
      color: orange;
      justify-content:center;
      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
    main {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 80vh;
    }

  </style>
</head>
<body>

<header class="navbar navbar-expand-xl navbar-light bg-light topo">
  <h1>CADASTRO DE PROFESSORES</h1>
</header>

<main>
  <section class="box">
  <form action="cad_prof.php" method="POST">
  <div class="row mb-3">
    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="nome">
    </div>
  </div>
  <div class="row mb-3">
    <label for="nivel" class="col-sm-2 col-form-label">Nível</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="inputPassword3" name="nivel">
    </div>
  </div>
  <div class="row mb-3">
    <label for="data_admissao" class="col-sm-3 col-form-label">Data de admissão</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputPassword3" name="data_admissao">
    </div>
  </div>
  <fieldset class="row mb-3 gen">
    <legend class="col-form-label col-sm-2 pt-0">Genero</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="genero" id="gridRadios1" value="m" checked="">
        <label class="form-check-label" for="gridRadios1">
          M
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="genero" id="gridRadios2" value="f">
        <label class="form-check-label" for="gridRadios2">
          F
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="genero" id="gridRadios2" value="outro">
        <label class="form-check-label" for="gridRadios2">
          Outro
        </label>
      </div>
    </div>
  </fieldset>
  <div class="row mb-3">
    <!-- <div class="col-sm-2 offset-sm-2"> -->
      <label for="disciplina" class="col-sm-2 col-form-label">Disciplina</label>
        <select id="disciplina" name="disciplina" >
          <option value="null">Escolha uma das disciplinas</option>
          <option value="portugues">Português</option>
          <option value="matematica">Matemática</option>
          <option value="historia">História</option>
          <option value="geografia">Geografia</option>
        </select>
    <!-- </div> -->
  </div>
  <button type="submit" name="submit" class="btn btn-primary">CADASTRAR</button>
  <?php
  
  if(!empty($resultado)){
    echo "Seus dados foram enviados com sucesso!";
  }
  ?>
</form>
  </section>
</main>


</body>
</html>
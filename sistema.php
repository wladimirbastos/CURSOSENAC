<?php

session_start();
include_once "conexao.php";

if(isset($_SESSION['login']) and isset($_SESSION['senha'])){

$login = ucfirst($_SESSION['login']);

}else{
  header('Location:login.php');
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
}

if(!empty($_GET["search"])){
  $search = $_GET["search"];
  $sql = "SELECT * FROM alunos WHERE nome LIKE '%$search%' ORDER BY nome ASC";
}else{
  $sql = "SELECT * FROM alunos ORDER BY nome ASC";
}

$resultado = $conexao->query($sql);

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
    header h1{
      font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
      font-weight: 600;
      color: goldenrod;
      /* margin-right: 500px; */
    }
header form{
  display: flex;
  gap: 2px;

}
    .topo {
      color: white;
      padding: 5px 20px;
    }

    body {
      height: 100vh;

    }

    .box {
      background: rgba(0, 0, 0, 0.5);
      border-radius: 10px;
      padding: 20px;
      width: auto;
      display: flex;
      justify-content: space-around;
      color: white;
    }

.table{
  color: white;
}

    main {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 80vh;
    }
  </style>
</head>

<body class="bg-primary bg-gradient text-white">

  <header class="navbar bg-dark navbar-dark topo">
    <img src="imagens/hulk.svg" alt="hulk">
    <h1>SISTEMA DE CADASTRO ESCOLAR - 2022 <br> 
  <?php
  echo "Bem vindo ".$login;  
  ?>
  </h1>

  <div>
  <form class="form-inline" action="sistema.php" method="GET">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-warning my-2 my-sm-0" type="submit" name="submit">Search</button>
  </form>
</div>

    <a href="sair.php"><button class="btn btn-danger">SAIR</button></a>
    
  </header>
  <main>
    <section class="box">
          <table class="table">
        <thead class="thead-dark">
          <tr>
            <!-- <th scope="col">Id</th> -->
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Serie</th>
            <th scope="col">Matricula</th>
            <th scope="col">Nascimento</th>
            <th scope="col">Escolaridade</th>
            <th scope="col">Telefone</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while($alunos = mysqli_fetch_assoc($resultado)){
            echo "<tr>";
            // echo "<td>".$alunos['id']."</td>";
            echo "<td>".ucfirst($alunos['nome'])."</td>";
            echo "<td>".$alunos['email']."</td>";
            echo "<td>".$alunos['serie']."</td>";
            echo "<td>".$alunos['matricula']."</td>";
            echo "<td>".$alunos['data_nasc']."</td>";
            echo "<td>".$alunos['escolaridade']."</td>";
            echo "<td>".$alunos['telefone']."</td>";
            echo "</tr>";
          }
          
          
          ?>

        </tbody>
      </table>
    </section>
  </main>
</body>

</html>
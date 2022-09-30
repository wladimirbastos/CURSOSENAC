<?php

session_start();
include_once "conexao.php";

$sql = "SELECT * FROM professores ORDER BY nome ASC";
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
      color: yellow;
      margin-right: 500px;
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
    <h1>SISTEMA DE CADASTRO ESCOLAR - 2022 <br> 
  </h1>
  </header>
  <main>
    <section class="box">
          <table class="table">
        <thead class="thead-dark">
          <tr>
            <!-- <th scope="col">Id</th> -->
            <th scope="col">Nome</th>
            <th scope="col">Nível</th>
            <th scope="col">Admissão</th>
            <th scope="col">Genero</th>
            <th scope="col">Disciplina</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while($professores = mysqli_fetch_assoc($resultado)){
            echo "<tr>";
            // echo "<td>".$alunos['id']."</td>";
            echo "<td>".ucfirst($professores['nome'])."</td>";
            echo "<td>".$professores['nivel']."</td>";
            echo "<td>".$professores['data_admissao']."</td>";
            echo "<td>".$professores['genero']."</td>";
            echo "<td>".$professores['disciplina']."</td>";
            echo "</tr>";
          }
          
          ?>

        </tbody>
      </table>
    </section>
  </main>
</body>

</html>
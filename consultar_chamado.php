<!--Incluindo o scrip de validação de autenticação que está na página validador_acesso.php; -->
<?php require_once 'validador_acesso.php' ?>
<?php

  //chamados
  $chamados = array();

  // abrir o arquivo.txt
  $arquivo = fopen('../../app_help_desk/arquivo.txt', 'r');

  //enquanto ouver registros ou linhas a serem recurados
  while( !feof($arquivo) ){ //feof() retorna verdadeiro caso ela encontra o final do arquivo se não retorna falso... e o while espera por verdadeiro que assim ele continua a repetição->  testa pelo fim de um arquivo-- precorre o arquivo até que ela encontre a ultima linha vazia.
                            //espera como parametro apenas a referencia do arquivo aberto.
    //linhas
    $registro = fgets($arquivo); //feof() posiciona o cursos no começo da linha e o fgets() pega oque estiver escrito naquela linha até encontrar a quebra de linha ai ele sai
    $chamados[] = $registro;
  }

  //fechar o arquivo aberto
  fclose($arquivo);
  //..
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>
    
    <!--Incluindo o menu navbar que está em  navbar.php; -->
    <?php require_once 'navbar.php' ?>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

              <!--percorrendo o array para montar os cards com os chamados repetindo quantas vezes for necessário-->
              <?php foreach( $chamados as $chamado ) { ?>
                
                
                <?php
                  //explode criar um novo array com base em um caracter que no nosso caso concatenamos os dados do chamado com #
                  $chamado_dados = explode('#', $chamado);

                  //verificar se o perfil é de adm ou usuário
                  if($_SESSION['perfil_id'] == 2){
                    //controle de visualização -> só exibir o chamado se foi criado pelo user
                    if($_SESSION['id'] != $chamado_dados[0]){ //verifica se o id do user da sessão é diferente do id do usuario que abriu o chamado
                      continue;
                    }
                  }

                  //verificar se o total de indices do array é menor que 3, se for está faltando alguma informação... então damos um continue para ele pular a criação de mais um card
                  if( count($chamado_dados) < 3){
                    continue;
                  }
                ?>

                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"> <?=$chamado_dados[1]?> </h5>
                    <h6 class="card-subtitle mb-2 text-muted"> <?=$chamado_dados[2]?> </h6>
                    <p class="card-text"> <?=$chamado_dados[3]?> </p>
                  </div>
                </div>
              
              <?php } ?> 
              <!--Fim-->

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
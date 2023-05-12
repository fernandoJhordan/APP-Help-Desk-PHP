<?php

    session_start();
    
    //trabalhando na montagem do texto
    //replace para verificar cada indice se possui o caracter # se tiver substitui por - porque usamos o # para separar os indice no texto que vamos criar para o txt
    $titulo     = str_replace('#', '-', $_POST['titulo'] );
    $categoria  = str_replace('#', '-', $_POST['categoria'] );
    $descricao  = str_replace('#', '-', $_POST['descricao'] );

    //implode('#', $_POST);

    // criando o texto que será escrito no arquivo.txt concatenando os indices e separando por # para acessar as posições depois
    $text = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL; //PHP_EOL para quebrar a linha a cada chamado escrito no arquivo


    //gerando arquivo txt com a função fopen() qu espera dois parametros 1° nome do arquivo 
    //2° se queremos abrir o arquivo, apenas ler o arquivo se queremos posicionar o cursor para escrever no arquivo 
    //passamos o parametro que abre o arequivo para escrita assim como na doc em php.net e pesquisar pela função fopen
    
    //abrindo o arquivo
    $arquivo = fopen('../../app_help_desk/arquivo.txt', 'a');

    // fwrite espera dois parametros 1° a referencia do arquivo aberto que queremos escrever no caso $arquivo 
    // e o segundo é oque queremos escrever no arquivo
    //escrevendo o texto
    fwrite($arquivo, $text);

    //fclose para fechar o arquivo que foi aberto e ele espera como parametro a referencia do arquivo que foi aberto...
    //fechando o arquivo
    fclose($arquivo);

    //echo $text;

    header('Location: abrir_chamado.php');

?>
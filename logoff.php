<?php

    session_start();
    /*
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    
    //remover indices do array de sessão
    //unset() remover indice de qualquer array

    unset($_SESSION['x']); //remover o indice apenas se existir assim não dando erro

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';


    //destruir a variavel de sessão
    //session_destroy()

    session_destroy(); //será destruida 
    //logo após forçar um redirecionamento de modo a forçar uma nova requisição para assim efetivamente as variaveis de sessão não estarem mais disponiveis

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    */

    session_destroy();
    header('Location: index.php');

?>
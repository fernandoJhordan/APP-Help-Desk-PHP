<?php
    session_start();

    //esclamação para retorna true se não existir o indice autenticado na global session
    if(!isset( $_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
        header('Location: index.php?login=erro2');
    }


?>
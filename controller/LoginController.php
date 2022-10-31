<?php
    include_once('../model/contas.php');

    if (!isset($_SESSION)) {
        session_start();
    }



    $conta =  new Contas($_GET['usuario'], $_GET['password']);
    $conta->logar();





?>
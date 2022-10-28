<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    die("É necessário estar logado para acessar esta pagina
            <p><a  href=\"../index.php\" >Entrar</a></p");
}

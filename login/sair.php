<?php

// Inicia a sessão
session_start();

// Destrói a sessão atual
session_destroy();

header('location:login.php');

?>

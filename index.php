<?php
    include('php/bdd.php');
    $bdd = mysqli_connect(SERVER, USER, PASS, DB);
    mysqli_set_charset($bdd, 'utf8');
    include('php/header.php');
    include('php/cover.php');
    include('php/concept.php');
    include('php/menu.php');
    include('php/map.php');
    include('php/footer.php');
?>
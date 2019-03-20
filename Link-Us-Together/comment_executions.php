<?php
    session_start();
    if($_SESSION['username']==null){header("Location: log in.html");}
    require_once 'comment.php';

    $C = new comment();
    $C->insert_com();
?>
<?php

session_start();
if($_SESSION['username']==null){header("Location: log in.html");}//isset

session_unset();

session_destroy();

header("Location: log in.html?logedOut");

?>
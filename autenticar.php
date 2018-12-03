<?php
    if(!isset($_SESSION['login'])){
        header('location: formLogin.php?error=2');
    }

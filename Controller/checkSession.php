<?php

    session_start();
if (!isset($_SESSION['adminId']) || $_SESSION['adminId'] == ''){
    header("Location: http://localhost/PlanetDEV/View/login.php");
}
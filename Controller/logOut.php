<?php
session_start();
session_destroy();
header("location: http://localhost/PlanetDEV/View/login.php");
<?php
global $link;
$server = "localhost";
$user = "root";
$pass ="";
$db = "checkitnotes";
$link = mysqli_connect($server, $user, $pass);

mysqli_connect($server, $user, $pass) or die("faiFed to open database.");
mysqli_select_db($link,$db) or die("Database not found.");
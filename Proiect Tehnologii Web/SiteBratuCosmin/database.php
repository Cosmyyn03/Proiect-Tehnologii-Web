<?php
$hostName="localhost";  // Numele gazdei MySQL
$dbUser = "root";  // Numele utilizatorului MySQL
$dbPassword= "";   // Parola utilizatorului MySQL
$dbName = "login_register";  // Numele bazei de date
$conn=mysqli_connect($hostName, $dbUser, $dbPassword, $dbName); 
// Conectarea la baza de date
if(!$conn){    // Verificarea conexiunii
    die("Something went wrong;");  
}

?>
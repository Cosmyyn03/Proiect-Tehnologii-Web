<?php

// Începe sesiunea
session_start();

// Inițializează variabila $logged_in cu false
$logged_in = false;

// Verifică dacă există un utilizator conectat
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $logged_in = true;  // Setează $logged_in la true dacă utilizatorul este conectat
}

// Setează header-ul de răspuns pentru a specifica tipul de conținut JSON
header('Content-Type: application/json');

// Convertește array-ul într-un string JSON și îl afișează
echo json_encode(array('logged_in' => $logged_in));
?>


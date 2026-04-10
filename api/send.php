<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$data = json_decode(file_get_contents("php://input"), true);

$imie = trim($data["imie"]);
$nazwisko = trim($data["nazwisko"]);
$email = trim($data["email"]);
$Tematkomentarz = trim($data["Tematkomentarz"]);
$komentarz = trim($data["komentarz"]);

if (!$data || $imie === "" || $nazwisko === "" || $email === "" || $Tematkomentarz === "" || $komentarz === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("bledne dane");
}
    $linia = $imie."|".$nazwisko."|".$email."|".$Tematkomentarz. "|" .$komentarz."\n";

    file_put_contents("dane.txt",$linia,FILE_APPEND);
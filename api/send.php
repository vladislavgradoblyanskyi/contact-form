<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$data = json_decode(file_get_contents("php://input"), true);

$imie = $data["imie"];
$nazwisko = $data["nazwisko"];
$email = $data["email"];
$komentarz = $data["komentarz"];

$linia = $imie."|".$nazwisko."|".$email."|".$komentarz."\n";

file_put_contents("dane.txt",$linia,FILE_APPEND);
<?php
$host = "localhost";
$dbname = "ExcellentTaste";
$user = "root";
$password = "";
try{

    $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);

} catch(PDOException $ex){

    echo "Verbinding mislukt: $ex";
}

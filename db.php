<?php

$host='localhost';
$dbName='school';
$username='root';
$password='';

try {

    $conn= new PDO("mysql:host=$host;dbname=$dbName" , $username , $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

    echo 'connected '; 
} catch(PDOException $e ) {
    echo 'connection failed' . $e->getMessage();
    
}


<?php
  $host = 'localhost';
  $dbname = 'shoesstore';
  $username = 'root';

  try{
    $pdo = new PDO("mysql: host=$host; dbname=$dbname; chraset=utf8", $username);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    

  
  }catch(PDOException $e){

  die("erreur:" . $e->getMessage());
  }

?>


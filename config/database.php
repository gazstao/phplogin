<?php 

$host = '127.0.0.1';
$dbname = 'login_system';
$username = 'login_user';
$password = 'SenhaForteAqui';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    die("Erro na conexão: " . $e->getMessage());
}

?>
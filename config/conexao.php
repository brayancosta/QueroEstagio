<?php
// Configurações do banco de dados
$host = "localhost"; // Altere para o host do seu banco de dados, caso não seja 'localhost'
$dbname = "quero"; // Altere para o nome do seu banco de dados
$username = "root"; // Altere para o seu nome de usuário do banco de dados
$password = ""; // Altere para a sua senha do banco de dados

// Criar a conexão com o banco de dados
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
?>

<?php
// Defina suas credenciais de banco de dados
$servername = "localhost";
$username = "administrador"; // seu usuário
$password = "senha"; // sua senha
$dbname = "loja"; // seu banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Conexão bem-sucedida!";
?>

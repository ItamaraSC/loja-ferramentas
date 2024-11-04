<?php
// Configurações de conexão
$host = "localhost";       // Servidor
$usuario = "administrador"; // Usuário do banco de dados
$senha = "senha";           // Senha do banco de dados
$database = "loja";         // Nome do banco de dados

// Criar conexão
$conn = new mysqli($host, $usuario, $senha, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
echo "Conexão bem-sucedida!";
?>

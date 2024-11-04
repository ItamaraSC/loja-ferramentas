<?php
// login.php
$mensagem = ""; // Mensagem para feedback

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['Gmail']);
    $senha = htmlspecialchars($_POST['Senha']);

    // Conectar ao banco de dados (substitua os valores conforme sua configuração)
    $conn = new mysqli("localhost", "root", "", "loja");

    // Verifique a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Verificar se o usuário existe
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        // Verifica a senha (assumindo que a senha foi armazenada como hash)
        if (password_verify($senha, $usuario['senha'])) {
            // Login bem-sucedido, redirecionar ou definir sessão
            // session_start();
            // $_SESSION['usuario_id'] = $usuario['id'];
            // header("Location: index.html"); // Redireciona para a página inicial
            $mensagem = "Login bem-sucedido!";
        } else {
            $mensagem = "Senha incorreta!";
        }
    } else {
        $mensagem = "Usuário não encontrado!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&display=swap" rel="stylesheet">
    <title>Ferramentas Home</title>
    <link rel="icon" href="logo.ico">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <header>
        <h1 class="subtitulo">Ferramentas</h1>
        <div class="header-container">
            <nav class="menu">
                <a href="index.html">Home</a>
                <a href="produtos.html">Produtos</a>
                <a href="cadastro.html">Cadastro</a>
                <a href="login.html">Login</a>
            </nav>
            <a href="carrinho.html">
                <img src="img/carrinho-compras.png" alt="Carrinho de Compras" class="carrinho">
            </a>
        </div>
    </header>
    
    <div>
        <section id="login" style="text-align: center;">
            <h1>Login</h1>
            <?php if ($mensagem) : ?>
                <p><?php echo $mensagem; ?></p>
            <?php endif; ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="Gmail">E-mail:</label>
                    <input type="text" id="Gmail" name="Gmail" required>
                </div>
                <div class="form-group">
                    <label for="Senha">Senha:</label>
                    <input type="password" id="Senha" name="Senha" required>
                </div>
                <div class="form-group">
                    <button type="submit">Logar</button>
                </div>
            </form>
        </section>

        <section id="cadastro" style="text-align: center;">
            <h1>Cadastro</h1>
            <form action="cadastrar.php" method="post">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
                <div class="form-group">
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
        </section>
    </div>

    <footer>
        <p>&copy; Trabalho HTML/CSS/JS/PHP e Banco de Dados.</p>
    </footer>
</body>
</html>

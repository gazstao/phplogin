<?php

$mensagem = '';
$tipoMensagem ='';

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    require 'config/database.php';

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(":email",$email);
    $stmt->execute();

    if ($stmt->rowCount() > 0){
        $mensagem = "Erro: E-mail já cadastrado!";
        $tipoMensagem = "danger";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":password",$password);

        if ($stmt->execute()){
            $mensagem = "Cadastro realizado com sucesso! <a href='index.php' class='alert-link'>Fazer login</a>";
            $tipoMensagem = "success";
        } else {
            $mensagem = "Ocorreu um erro ao cadastrar, tente novamente!";
            $tipoMensagem = "danger";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Usuário</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <p></p>
    
    <!-- Exibir a mensagem de erro se houver -->
<?php if (!empty($mensagem)): ?>
        <div class="alert alert-<?php echo $tipoMensagem; ?> text-center" style="max-width: 400px; margin: auto;">
            <?php echo $mensagem; ?>
        </div><p></p>
<?php endif; ?>

    <div class="container">
    <form method="POST" class="p-4 border rounded shadow-sm bg-light" style="max-width: 400px; margin: auto;">
    <h2 class="text-center mb-4">Registro de Usuário</h2>

    <div class="mb-3">
        <label class="form-label">Nome:</label>
        <input type="text" name="name" class="form-control" placeholder="Digite seu nome" required>
    </div>

    <div class="mb-3">
        <label class="form-label">E-mail:</label>
        <input type="email" name="email" class="form-control" placeholder="Digite seu e-mail" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Senha:</label>
        <input type="password" name="password" class="form-control" placeholder="Digite sua senha" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
    </form>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


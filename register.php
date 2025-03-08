<?php

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    require 'config/database.php';

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(":email",$email);
    $stmt->execute();

    if ($stmt->rowCount() > 0){
        echo "Erro: E-mail já cadastrado!";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":password",$password);

        if ($stmt->execute()){
            echo "Cadastro realizado com sucesso! <a href='index.php'>Fazer login</a>";
        } else {
            echo "Erro ao cadastrar!";
        }
    }
}
?>

<form method="POST">
    <label>Nome:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Senha:</label>
    <input type="password" name="password" required>

    <button type="submit">Cadastrar</button>
</form>

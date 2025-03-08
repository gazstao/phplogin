Secure Login System - PHP & MySQL

Este projeto implementa um sistema de login seguro usando PHP e MySQL.

🚀 Tecnologias Utilizadas

PHP 7+

MySQL/MariaDB

Apache2 (ou Nginx)

PDO para conexão segura com o banco de dados

📌 Funcionalidades

✅ Cadastro de usuários com hashing seguro de senhas (password_hash)
✅ Login protegido contra ataques de força bruta
✅ Proteção contra CSRF (Cross-Site Request Forgery)
✅ Logout seguro
✅ Sessões seguras para autenticação

⚙️ Instalação

1️⃣ Clonar o repositório
'''
git clone https://github.com/seuusuario/seu-repositorio.git
cd seu-repositorio
'''
2️⃣ Configurar o Banco de Dados

Execute os seguintes comandos no MySQL:
'''
CREATE DATABASE login_system;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE login_attempts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    attempts INT DEFAULT 0,
    last_attempt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
'''
3️⃣ Configurar a Conexão com o Banco

Edite o arquivo config/database.php e ajuste as credenciais:
'''
<?php
$host = 'localhost';
$dbname = 'login_system';
$username = 'login_user';
$password = 'SuaSenhaForte';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
'''
4️⃣ Executar o Servidor

Se estiver usando Apache:

```
sudo systemctl restart apache2
```

Se quiser rodar com PHP embutido:

'''
php -S localhost:8000
'''

Acesse http://localhost:8000/index.php

🔒 Melhorias Futuras


💡 Contribuições são bem-vindas! Faça um fork, contribua e envie um Pull Request! 😃

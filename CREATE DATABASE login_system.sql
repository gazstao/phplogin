CREATE DATABASE login_system;

CREATE USER 'login_user'@'localhost' IDENTIFIED BY 'SenhaForteAqui';

GRANT ALL PRIVILEGES ON login_system.* TO 'login_user'@'localhost';

FLUSH PRIVILEGES;
EXIT;

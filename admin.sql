CREATE TABLE admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO admin_users (username, password) VALUES
('admin', 'password_hash'); -- Note: Replace 'password_hash' with the hashed password


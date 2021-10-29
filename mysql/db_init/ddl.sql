# change database
USE zend_db;

# 'users' table
DROP TABLE IF EXISTS users;
CREATE TABLE users (
    user_id INT(10) NOT NULL AUTO_INCREMENT,
    user_email VARCHAR(100) UNIQUE NOT NULL,
    user_password VARCHAR(100) NOT NULL,
    PRIMARY KEY(user_id)
);
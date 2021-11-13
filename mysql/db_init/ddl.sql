# change database
USE zend_db;

# initialize tables
DROP TABLE IF EXISTS tasks;
DROP TABLE IF EXISTS users;

# 'users' table
CREATE TABLE users (
    user_id INT(10) NOT NULL AUTO_INCREMENT,
    user_email VARCHAR(100) UNIQUE NOT NULL,
    user_password VARCHAR(100) NOT NULL,
    PRIMARY KEY(user_id)
);

# 'tasks' table

CREATE TABLE tasks (
    task_id INT(10) NOT NULL AUTO_INCREMENT,
    user_id INT(10) NOT NULL,
    task_title VARCHAR(50) NOT NULL,
    task_content VARCHAR(400),
    task_status VARCHAR(20),
    PRIMARY KEY(task_id),
    FOREIGN KEY fk_tasks_users(user_id) REFERENCES users(user_id)
);
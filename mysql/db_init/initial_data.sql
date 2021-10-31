USE zend_db;

INSERT INTO users (user_email, user_password) VALUES ('user@example.com', 'password');

INSERT INTO tasks (user_id, task_title, task_content) VALUES (1, 'Test Title 1', 'Test Content 1');
USE zend_db;

INSERT INTO users (user_email, user_password) VALUES ('user@example.com', 'password');

INSERT INTO tasks (user_id, task_title, task_content) VALUES (1, 'Test Title 1', 'Test Content 1');
INSERT INTO tasks (user_id, task_title, task_content) VALUES (1, 'Test Title 2', 'Test Content 2');
INSERT INTO tasks (user_id, task_title, task_content) VALUES (1, 'Test Title 3', 'Test Content 3');
INSERT INTO tasks (user_id, task_title, task_content) VALUES (1, 'Test Title 4', 'Test Content 4');
INSERT INTO tasks (user_id, task_title, task_content) VALUES (1, 'Test Title 5', 'Test Content 5');
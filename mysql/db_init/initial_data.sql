USE zend_db;

INSERT INTO users (user_email, user_password) VALUES ('user@example.com', '$2y$10$f47F0Xw4rB8GmtHO3J/jwus1yoyWnPvnc394kqwqKkS3UkKytfxr2');

INSERT INTO tasks (user_id, task_title, task_content, task_status) VALUES (1, 'Test Title 1', 'Test Content 1', 'To do');
INSERT INTO tasks (user_id, task_title, task_content, task_status) VALUES (1, 'Test Title 2', 'Test Content 2', 'To do');
INSERT INTO tasks (user_id, task_title, task_content, task_status) VALUES (1, 'Test Title 3', 'Test Content 3', 'In progress');
INSERT INTO tasks (user_id, task_title, task_content, task_status) VALUES (1, 'Test Title 4', 'Test Content 4', 'Done');
INSERT INTO tasks (user_id, task_title, task_content, task_status) VALUES (1, 'Test Title 5', 'Test Content 5', 'Done');
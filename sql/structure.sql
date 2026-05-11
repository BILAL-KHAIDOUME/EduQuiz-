CREATE DATABASE eduquiz;

USE eduquiz;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('teacher','student')
);

CREATE TABLE quizzes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    description TEXT,
    access_code VARCHAR(20) UNIQUE,
    time_limit INT,
    max_attempts INT,
    teacher_id INT,
    FOREIGN KEY (teacher_id) REFERENCES users(id)
);

CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    quiz_id INT,
    question_text TEXT,
    FOREIGN KEY (quiz_id) REFERENCES quizzes(id)
);

CREATE TABLE choices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question_id INT,
    choice_text VARCHAR(255),
    is_correct BOOLEAN,
    FOREIGN KEY (question_id) REFERENCES questions(id)
);

CREATE TABLE attempts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    quiz_id INT,
    student_id INT,
    score DECIMAL(5,2),
    FOREIGN KEY (quiz_id) REFERENCES quizzes(id),
    FOREIGN KEY (student_id) REFERENCES users(id)
);

CREATE TABLE answers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    attempt_id INT,
    question_id INT,
    choice_id INT,
    FOREIGN KEY (attempt_id) REFERENCES attempts(id),
    FOREIGN KEY (question_id) REFERENCES questions(id),
    FOREIGN KEY (choice_id) REFERENCES choices(id)
);

INSERT INTO users (name, email, password, role)
VALUES
('Ayoub', 'ayoub@gmail.com', '123456', 'teacher'),
('Sara', 'sara@gmail.com', '123456', 'student');

INSERT INTO quizzes (title, description, access_code, time_limit, max_attempts, teacher_id)
VALUES
('PHP Quiz', 'Quiz sur PHP', 'PHP101', 30, 3, 1);

INSERT INTO questions (quiz_id, question_text)
VALUES
(1, 'PHP signifie quoi ?'),
(1, 'Quelle fonction sert a afficher un texte ?');

INSERT INTO choices (question_id, choice_text, is_correct)
VALUES
(1, 'Hypertext Preprocessor', 1),
(1, 'Private Home Page', 0),
(1, 'Programming Home Page', 0),

(2, 'echo', 1),
(2, 'print_r', 0),
(2, 'scanf', 0);

INSERT INTO attempts (quiz_id, student_id, score)
VALUES
(1, 2, 15.00);

INSERT INTO answers (attempt_id, question_id, choice_id)
VALUES
(1, 1, 1),
(1, 2, 4);
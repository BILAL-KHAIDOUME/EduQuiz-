-- Active: 1778664580360@@127.0.0.1@3306@eduquiz

CREATE DATABASE eduquiz;
USE eduquiz;
DROP DATABASE eduquiz;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('teacher', 'student') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE quizzes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    teacher_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    access_code VARCHAR(20) UNIQUE NOT NULL,
    time_limit INT DEFAULT 0,
    max_attempts INT DEFAULT 1,
    status ENUM('draft', 'published', 'closed') DEFAULT 'draft',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_quiz_teacher
    FOREIGN KEY (teacher_id)
    REFERENCES users(id)
    ON DELETE CASCADE
);

CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    quiz_id INT NOT NULL,
    question_text TEXT NOT NULL,
    points INT DEFAULT 1,

    CONSTRAINT fk_question_quiz
    FOREIGN KEY (quiz_id)
    REFERENCES quizzes(id)
    ON DELETE CASCADE
);

CREATE TABLE choices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question_id INT NOT NULL,
    choice_text VARCHAR(255) NOT NULL,
    is_correct BOOLEAN DEFAULT FALSE,

    CONSTRAINT fk_choice_question
    FOREIGN KEY (question_id)
    REFERENCES questions(id)
    ON DELETE CASCADE
);

CREATE TABLE results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    quiz_id INT NOT NULL,
    score DECIMAL(5,2) DEFAULT 0,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    attempt_number INT DEFAULT 1,
    passed BOOLEAN DEFAULT FALSE,

    CONSTRAINT fk_result_student
    FOREIGN KEY (student_id)
    REFERENCES users(id)
    ON DELETE CASCADE,

    CONSTRAINT fk_result_quiz
    FOREIGN KEY (quiz_id)
    REFERENCES quizzes(id)
    ON DELETE CASCADE
);

CREATE TABLE answers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    result_id INT NOT NULL,
    question_id INT NOT NULL,
    choice_id INT NOT NULL,
    is_correct BOOLEAN DEFAULT FALSE,

    CONSTRAINT fk_answer_result
    FOREIGN KEY (result_id)
    REFERENCES results(id)
    ON DELETE CASCADE,

    CONSTRAINT fk_answer_question
    FOREIGN KEY (question_id)
    REFERENCES questions(id)
    ON DELETE CASCADE,

    CONSTRAINT fk_answer_choice
    FOREIGN KEY (choice_id)
    REFERENCES choices(id)
    ON DELETE CASCADE
);
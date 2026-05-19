-- ── Run this file in phpMyAdmin or MySQL CLI ──
-- Creates the database and tables for EduQuiz

CREATE DATABASE IF NOT EXISTS eduquiz CHARACTER SET utf8 COLLATE utf8_general_ci;
USE eduquiz;

-- Quizzes table
CREATE TABLE IF NOT EXISTS quizzes (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    title       VARCHAR(255)  NOT NULL,
    description TEXT,
    access_code VARCHAR(20)   NOT NULL UNIQUE,
    -- seconds; 0 means no time limit
    time_limit  INT           NOT NULL DEFAULT 0
);

-- Questions table
CREATE TABLE IF NOT EXISTS questions (
    id      INT AUTO_INCREMENT PRIMARY KEY,
    quiz_id INT          NOT NULL,
    text    TEXT         NOT NULL,
    FOREIGN KEY (quiz_id) REFERENCES quizzes(id) ON DELETE CASCADE
);

-- Answers table
CREATE TABLE IF NOT EXISTS answers (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    question_id INT     NOT NULL,
    text        TEXT    NOT NULL,
    is_correct  TINYINT NOT NULL DEFAULT 0,
    FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE
);
INSERT INTO users (name, email, password, role)
VALUES
('Ayoub Teacher', 'teacher@eduquiz.com', '123456', 'teacher'),
('Ahmed Student', 'student@eduquiz.com', '123456', 'student');

INSERT INTO quizzes (
    teacher_id,
    title,
    description,
    access_code,
    time_limit,
    max_attempts,
    status
)
VALUES (
    1,
    'PHP Basics Quiz',
    'Quiz about PHP fundamentals',
    'PHP2026',
    30,
    3,
    'published'
);

INSERT INTO questions (
    quiz_id,
    question_text,
    points
)
VALUES
(1, 'What does PHP stand for ?', 2),
(1, 'Which symbol is used for variables in PHP ?', 2);

INSERT INTO choices (
    question_id,
    choice_text,
    is_correct
)
VALUES
(1, 'Personal Home Page', TRUE),
(1, 'Private Hypertext Processor', FALSE),
(1, 'Programming HTML Page', FALSE),

(2, '#', FALSE),
(2, '$', TRUE),
(2, '&', FALSE);

INSERT INTO results (
    student_id,
    quiz_id,
    score,
    attempt_number,
    passed
)
VALUES (
    2,
    1,
    4,
    1,
    TRUE
);

INSERT INTO answers (
    result_id,
    question_id,
    choice_id,
    is_correct
)
VALUES
(1, 1, 1, TRUE),
(1, 2, 5, TRUE);

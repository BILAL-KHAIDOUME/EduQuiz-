-- ── Sample data for testing ──
-- Run AFTER structure.sql

USE eduquiz;

-- ══════════════════════════════════════════
--  QUIZ 1 : HTML
-- ══════════════════════════════════════════

INSERT INTO quizzes (title, description, access_code, time_limit)
VALUES ('Quiz HTML – Module 1', 'Les bases du HTML', 'HTML01', 600);

SET @quiz1 = LAST_INSERT_ID();

-- Question 1
INSERT INTO questions (quiz_id, text)
VALUES (@quiz1, 'Quelle balise HTML est utilisée pour créer un hyperlien ?');
SET @q1 = LAST_INSERT_ID();

INSERT INTO answers (question_id, text, is_correct) VALUES
(@q1, '<link>',  0),
(@q1, '<a>',     1),
(@q1, '<href>',  0),
(@q1, '<url>',   0);

-- Question 2
INSERT INTO questions (quiz_id, text)
VALUES (@quiz1, 'Quelle balise est utilisée pour afficher une image ?');
SET @q2 = LAST_INSERT_ID();

INSERT INTO answers (question_id, text, is_correct) VALUES
(@q2, '<picture>', 0),
(@q2, '<src>',     0),
(@q2, '<img>',     1),
(@q2, '<image>',   0);

-- Question 3
INSERT INTO questions (quiz_id, text)
VALUES (@quiz1, 'Quelle balise définit le titre principal d\'une page ?');
SET @q3 = LAST_INSERT_ID();

INSERT INTO answers (question_id, text, is_correct) VALUES
(@q3, '<h6>',    0),
(@q3, '<title>', 0),
(@q3, '<h1>',    1),
(@q3, '<body>',  0);

-- ══════════════════════════════════════════
--  QUIZ 2 : CSS
-- ══════════════════════════════════════════

INSERT INTO quizzes (title, description, access_code, time_limit)
VALUES ('Quiz CSS – Module 2', 'Les bases du CSS', 'CSS02', 300);

SET @quiz2 = LAST_INSERT_ID();

-- Question 4
INSERT INTO questions (quiz_id, text)
VALUES (@quiz2, 'Quelle propriété CSS change la couleur du texte ?');
SET @q4 = LAST_INSERT_ID();

INSERT INTO answers (question_id, text, is_correct) VALUES
(@q4, 'font-color',  0),
(@q4, 'text-color',  0),
(@q4, 'color',       1),
(@q4, 'foreground',  0);

-- Question 5
INSERT INTO questions (quiz_id, text)
VALUES (@quiz2, 'Comment centrer un bloc avec Flexbox ?');
SET @q5 = LAST_INSERT_ID();

INSERT INTO answers (question_id, text, is_correct) VALUES
(@q5, 'align: center',           0),
(@q5, 'justify-content: center', 1),
(@q5, 'text-align: center',      0),
(@q5, 'margin: auto',            0);
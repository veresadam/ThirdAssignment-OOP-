<?php

$databaseCreationQuery = "CREATE DATABASE Quiz";

$usrTableQuery =
    "CREATE TABLE user (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(50)
)";

$quizTableQuery =
    "CREATE TABLE quiz (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50)
)";

$questionTableQuery =
    "CREATE TABLE question (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        quiz_id INT(11) UNSIGNED FOREIGN KEY REFERENCES quiz(id),
        question VARCHAR(255),
        answer VARCHAR(255)
)";

$scoresTableQuery =
    "CREATE TABLE scores (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT(11) UNSIGNED FOREIGN KEY REFERENCES user(id),
        quiz_id INT(11) UNSIGNED FOREIGN KEY REFERENCES quiz(id),
        score TINYINT,
)";

$populateQuizTable = "INSERT INTO quiz ('name') VALUES ('OOP'), ('Quick Maffs')";

$populateQuestionTable = "INSERT INTO question (quiz_id, question, answer) VALUES 
(1, 'What does OOP stand for?', 'Object Oriented Programming'),
(1, 'What is considered the \"blueprint\" of an object?', 'The Class'), 
(1, 'What is responsible for setting up a new object?', 'The Constructor'), 
(2, '2+2=', '4'), (2, '2+2-1=', '3'), (2, '(sqrt(9))^3', '27')";

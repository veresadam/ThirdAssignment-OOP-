#! /usr/bin/env php
<?php
require_once "Quiz.php";
require_once "User.php";
require_once "Question.php";
require_once "questions.php";
require_once "Database.php";

function mainFunction() {


    $connection = new Database();
    $pdo = $connection->getConnection();
    echo "Greetings to the quiz machine! Please enter your E-mail: ";
    $mail = fgets(STDIN);
    $user = new User($mail, $pdo);
    echo "Please choose one from the following quizzes:
            1. OOP
            2. Quick Maffs\n";
    $quizName = fgets(STDIN);
    $quiz = new Quiz(trim($quizName), $pdo);

    foreach ($quiz->getQuestions() as $question) {
        echo $question->getQuestion() . PHP_EOL;
        $answer = fgets(STDIN);
        $user->setQuizAnswers($answer);
    }
    $quiz->setCurrentScore($user);
    $score = $quiz->getCurrentScore();
    echo "Yer score on the current quiz is : " . $score . PHP_EOL;


}

mainFunction();
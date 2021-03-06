<?php

class Quiz
{
    protected $id;
    protected $title;
    protected $questions = [];
    protected $score;

    public function __construct($quizName, $pdo)
    {
        try {
            $stmt = $pdo->query("SELECT id FROM quiz WHERE name = {$pdo->quote($quizName)}");
            $this->id = $stmt->fetch();
            $this->title = $quizName;
            $this->setQuestions($pdo);
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            die();
        }
    }

    /**
     * @return mixed
     */
    public function getQuiz()
    {
        return $this->title;
    }

    public function setQuestions($pdo)
    {
        $stmt = $pdo->query("SELECT * FROM question WHERE quiz_id ={$pdo->quote($this->id['id'])}");
        while ($row = $stmt->fetch()) {
            $this->questions[] = new Question($row['question'], $row['answer']);
        }
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function setCurrentScore($user)
    {
        $this->score = 0;
        $userAnswers = $user->getQuizAnswers();
        for ($i = 0; $i < count($this->questions); $i++) {
            if ($userAnswers[$i] === $this->questions[$i]->getAnswer()) {
                $this->score++;
            }
        }
    }

    public function getCurrentScore()
    {
        return $this->score;
    }
}
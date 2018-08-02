<?php

class User
{
    protected $email;
    protected $quizAnswers = [];

    /**
     * @return mixed
     */
    public function __construct($mail, $pdo)
    {
        $sql = "INSERT INTO users (email) VALUES (?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute($mail);
        $this->email = $mail;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param array $quizAnswers
     */
    public function setQuizAnswers($quizAnswer)
    {
        $this->quizAnswers[] = $quizAnswer;
    }

    /**
     * @return array
     */
    public function getQuizAnswers()
    {
        return $this->quizAnswers;
    }
}
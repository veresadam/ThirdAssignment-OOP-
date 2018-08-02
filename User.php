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
        $pdo->exec("INSERT INTO user (`email`) VALUES ({$pdo->quote($mail)})");
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
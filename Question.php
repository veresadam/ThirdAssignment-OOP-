<?php
/**
 * Created by PhpStorm.
 * User: adamveres
 * Date: 30.07.2018
 * Time: 17:04
 */

class Question
{
    protected $id;
    protected $question;
    protected $answer;

    public function __construct($question, $answer)
    {
        $this->question = $question;
        $this->answer = $answer;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->answer;
    }
}
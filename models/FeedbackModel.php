<?php

class Feedback
{
    private $idfeedback;
    private $nome;
    private $feedback;

    public function __construct($nome, $feedback, $idfeedback = null)
    {
        $this->nome = $nome;
        $this->feedback = $feedback;
        $this->idfeedback = $idfeedback;
    }

    public function getIdfeedback()
    {
        return $this->idfeedback;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getFeedback()
    {
        return $this->feedback;
    }
}

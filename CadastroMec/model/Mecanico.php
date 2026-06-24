<?php

class Mecanico
{
    private $id;
    private $nome;
    private $especialidade;
    private $telefone;

    public function __construct($nome, $especialidade, $telefone, $id = null)
    {
        $this->nome = $nome;
        $this->especialidade = $especialidade;
        $this->telefone = $telefone;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEspecialidade()
    {
        return $this->especialidade;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }
}

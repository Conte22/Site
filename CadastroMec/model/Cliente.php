<?php

class Cliente
{
    private $id;
    private $nome;
    private $cep;
    private $cidade;
    private $bairro;
    private $rua;

    public function __construct($nome, $cep, $cidade, $bairro, $rua, $id = null)
    {
        $this->nome = $nome;
        $this->cep = $cep;
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->rua = $rua;
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

    public function getCep()
    {
        return $this->cep;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function getRua()
    {
        return $this->rua;
    }
}

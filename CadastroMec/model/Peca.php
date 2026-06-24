<?php

class Peca
{
    private $id;
    private $nome;
    private $precoVenda;
    private $estoque;

    public function __construct($nome, $precoVenda, $estoque, $id = null)
    {
        $this->nome = $nome;
        $this->precoVenda = $precoVenda;
        $this->estoque = $estoque;
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

    public function getPrecoVenda()
    {
        return $this->precoVenda;
    }

    public function getEstoque()
    {
        return $this->estoque;
    }
}

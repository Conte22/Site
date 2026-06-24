<?php

class OrdemServico
{
    private $id;
    private $veiculo;
    private $ano;
    private $defeito;
    private $preco;
    private $clienteId;

    public function __construct($veiculo, $ano, $defeito, $preco, $clienteId = null, $id = null)
    {
        $this->veiculo = $veiculo;
        $this->ano = $ano;
        $this->defeito = $defeito;
        $this->preco = $preco;
        $this->clienteId = $clienteId;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getVeiculo()
    {
        return $this->veiculo;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function getDefeito()
    {
        return $this->defeito;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function getClienteId()
    {
        return $this->clienteId;
    }
}

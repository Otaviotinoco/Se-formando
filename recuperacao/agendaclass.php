<?php

class Usuario {
    private $id;
    private $nome;
    private $cep;
    private $rua;
	private $bairro;
	private $cidade;
	private $uf;
  private $sobrenome;
    private $email;
    private $telefone;
    private $imagem;
    private $apelido;
    private $senha;



    public function __construct($id, $nome, $sobrenome, $cep ,$rua ,$bairro ,$cidade ,$uf, $email, $telefone, $imagem, $login, $senha) {
        $this->id = $id;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->apelido = $apelido;
        $this->cep = $cep;
        $this->rua = $rua;
		$this->bairro = $bairro;
		$this->cidade = $cidade;
		$this->uf = $uf;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->imagem = $imagem;
        $this->senha = $senha;

    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getSobrenome() {
        return $this->sobrenome;
    }

    function getApelido() {
        return $this->apelido;
    }

    function getCep() {
        return $this->cep;
    }


    function getEmail() {
        return $this->email;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getImagem() {
        return $this->imagem;
    }


    function getSenha() {
        return $this->senha;
    }

	function getRua() {
        return $this->rua;
    }

	function getBairro() {
        return $this->bairro;
    }

	function getCidade() {
        return $this->cidade;
    }

	function getuf() {
        return $this->uf;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }


    function setCep($cep) {
        $this->cep = $cep;
    }



    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setApelido($apelido) {
        $this->apelido = $apelido;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setRua($rua) {
        $this->rua = $rua;
    }

	function setBairro($bairro) {
        $this->bairro = $bairro;
    }

	function setCidade($cidade) {
        $this->cidade = $cidade;
    }

	function setuf($uf) {
        $this->uf = $uf;
    }

}

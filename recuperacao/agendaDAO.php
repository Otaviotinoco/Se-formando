<?php

require_once 'agendaclass.php';
require_once 'bancodedados.php';

class agendaDAO {
    private $bd;

    public function __construct($bd){
        $this->bd = $bd;
    }


    public function leUsuario(){
        $select = 'SELECT * FROM usuario ORDER by id';
        $result = $this->bd->executaSelecao($select);
        $listaUsuario = array();
        while($dados = $result->fetch_array()){


            $id = $dados['id'];
            $nome = $dados['nome'];
            $sobrenome = $dados['sobrenome'];
      			$cep = $dados['cep'];
            $rua = $dados['rua'];
			      $bairro = $dados['bairro'];
			      $cidade = $dados['cidade'];
			      $estado = $dados['uf'];
            $email = $dados['email'];
            $telefone = $dados['telefone'];
            $imagem = $dados['imagem'];
            $apelido = $dados ['apelido'];
            $senha = $dados['senha'];

            $usuario = new Usuario($id,$nome, $sobrenome, $cep, $email, $telefone, $imagem, $apelido, $senha, $rua, $bairro, $cidade, $uf);
            $listaUsuario[] = $usuario;
        }
        return $listaUsuario;
    }





    public function adicionaUsuario($usuario){
          $insert = 'INSERT INTO usuario VALUES(NULL, ?, ?, ?, ?, ?, ?, ? ,? ,? ,? ,? ,?)';
          $statement = $this->bd->preparaStatement($insert);
          $nome = $usuario->getNome();
          $sobrenome= $usuario->getSobrenome();
          $rua = $rua->getRua();
          $bairro = $bairro->getbairro();
          $cidade = $cidade->getcidade();
          $uf = $uf->getuf();
          $cep = $usuario->getCep();
          $email = $usuario->getEmail();
          $telefone = $usuario->getTelefone();
          $imagem = $usuario->getimagem();
          $apelido = $usuario->getapelido();
          $senha = $usuario->getSenha();
          $statement->bind_param('ssssssssssss',$nome,$rua ,$uf ,$cidade ,$bairro,  $sobrenome, $cep, $email, $telefone, $imagem, $apelido, $senha);
          return $statement->execute();
      }


       public function fazApelido($apelido, $senha){
            $select = 'SELECT * FROM usuarios WHERE apelido = ? AND senha = ?';
            $statement = $this->bd->preparaStatement($select);
            $statement->bind_param('ss', $apelido, $senha);
            $statement->execute();
            $resultado = $statement->get_result();
            if($resultado){
                $listaUsuario = array();
                while($dados = $resultado->fetch_array()){
                    $id = $dados['id'];
                    $nome = $dados['nome'];
                    $sobrenome = $dados['sobrenome'];
                    $rua = $dados['rua'];
                    $bairro = $dados['bairro'];
                    $cidade = $dados['cidade'];
                    $uf = $dados['uf'];
                    $cep = $dados['cep'];
                    $email = $dados['email'];
                    $telefone = $dados['telefone'];
                    $imagem = $dados['imagem'];
                    $apelido = $dados['apelido'];
                    $senha = $dados['senha'];
                    $usuario = new usuario($id, $nome, $sobrenome, $cep, $email, $telefone, $imagem, $apelido, $senha, $rua , $bairro , $cidade , $uf);
                    $listaUsuario[] = $usuario;
                }
            return $listaUsuario;
            }
    }

}

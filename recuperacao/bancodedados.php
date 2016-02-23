<?php

class BancoDeDados {
    const HOST = 'localhost';
    const USUARIO = 'root';
    const SENHA = '';
    const BANCO = 'usuarios';

    private $mysqli;

    public function __construct() {
        $this->mysqli = new mysqli(self::HOST, self::USUARIO, self::SENHA, self::BANCO);
        if ($this->mysqli->connect_error) {
            echo 'Falha na conexão: ' . $this->mysqli->connect_error;
            exit();
        }
    }


    public function getMysqli() {
        return $this->mysqli;
    }





    public function executaSelecao($comando) {
        $result = $this->mysqli->query($comando);
        if (!$result) {
            echo 'Erro ao executar seleção: ' . $this->mysqli->error;
        }
        return $result;
    }


    public function executaAtualizacao($comando) {
        $success = $this->mysqli->query($comando);
        if (!$success) {
            echo 'Erro ao executar atualização: ' . $this->mysqli->error;
        }
        return $success;
    }

  public function preparaStatement($comando) {
        $statement = $this->mysqli->prepare($comando);
        if (!$statement) {
            echo 'Erro ao preparar statement: ' . $this->mysqli->error;
        }
        return $statement;
    }

    public function getErro() {
        return $this->mysqli->error;
    }

    public function fecha() {
        $this->mysqli->close();
    }
}

?>

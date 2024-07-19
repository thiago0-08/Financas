<?php

class Database {
    private $driver;
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $port;
    private $con;

    function __construct(){
        $this->driver = "mysql";
        $this->host = "localhost";
        $this->dbname = "test"; // Atualize para o nome  do banco 
        $this->username = "root"; // Usuário do MySQL
        $this->password = ''; // Senha do MySQL (se nao tiver senha deixa vazio msm)
        $this->port = 3306; // Porta do MySQL 
    }
    
    function getConexao(){
        try{
            $dsn = "$this->driver:host=$this->host;dbname=$this->dbname;port=$this->port";
            $this->con = new PDO($dsn, $this->username, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->con;
        } catch (PDOException $e) {
            echo 'Erro de conexão: ' . $e->getMessage();
            exit(); // Encerra o script se a conexão falhar
        }
    }    
}
?>

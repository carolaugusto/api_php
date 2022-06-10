<?php
class Usuario
{
    private $conn;

    private $db_table = "usuarios";
    public $id;
    public $nome;
    public $sobrenome;
    public $cpf_cnpj;
    public $idade;
    public $sexo;
    public $email;
    public $cep;
    public $logradouro;
    public $numero;
    public $complemento;
    public $bairro;
    public $cidade;
    public $estado;
    public $senha;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function createU()
    {
        $sqlQuery = "INSERT INTO
                        " . $this->db_table . "
                    SET
                    nome :nome;
                    sobrenome :sobrenome;
                    cpf-cnpj :cpf_cnpj;
                    idade :idade;
                    sexo :sexo;
                    email :email;
                    cep :cep;
                    logradouro :logradouro;
                    numero :numero;
                    complemento :complemento;
                    bairro :bairro;
                    cidade :cidade;
                    estado :estado;
                    senha :senha";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->sobrenome = htmlspecialchars(strip_tags($this->sobrenome));
        $this->cpf_cnpj = htmlspecialchars(strip_tags($this->cpf));
        $this->idade = htmlspecialchars(strip_tags($this->idade));
        $this->sexo = htmlspecialchars(strip_tags($this->sexo));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->cep = htmlspecialchars(strip_tags($this->cep));
        $this->logradouro = htmlspecialchars(strip_tags($this->logradouro));
        $this->numero = htmlspecialchars(strip_tags($this->numero));
        $this->complemento = htmlspecialchars(strip_tags($this->idade));
        $this->bairro = htmlspecialchars(strip_tags($this->bairro));
        $this->cidade = htmlspecialchars(strip_tags($this->cidade));
        $this->estado = htmlspecialchars(strip_tags($this->estado));
        $this->senha = htmlspecialchars(strip_tags($this->senha));

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":sobrenome", $this->sobrenome);
        $stmt->bindParam(":cpf_cnpj", $this->cpf_cnpj);
        $stmt->bindParam(":idade", $this->idade);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":cep", $this->cep);
        $stmt->bindParam(":logradouro", $this->logradouro);
        $stmt->bindParam(":numero", $this->numero);
        $stmt->bindParam(":complemento", $this->complemento);
        $stmt->bindParam(":cidade", $this->cidade);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":senha", $this->senha);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function updateU()
    {
        $sqlQuery = "UPDATE
                        " . $this->db_table . "
                    SET
                    nome :nome;
                    sobrenome :sobrenome;
                    cpf-cnpj :cpf_cnpj;
                    idade :idade;
                    sexo :sexo;
                    email :email;
                    cep :cep;
                    logradouro :logradouro;
                    numero :numero;
                    complemento :complemento;
                    bairro :bairro;
                    cidade :cidade;
                    estado :estado;
                    senha :senha;
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->sobrenome = htmlspecialchars(strip_tags($this->sobrenome));
        $this->cpf_cnpj = htmlspecialchars(strip_tags($this->cpf));
        $this->idade = htmlspecialchars(strip_tags($this->idade));
        $this->sexo = htmlspecialchars(strip_tags($this->sexo));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->cep = htmlspecialchars(strip_tags($this->cep));
        $this->logradouro = htmlspecialchars(strip_tags($this->logradouro));
        $this->numero = htmlspecialchars(strip_tags($this->numero));
        $this->complemento = htmlspecialchars(strip_tags($this->idade));
        $this->bairro = htmlspecialchars(strip_tags($this->bairro));
        $this->cidade = htmlspecialchars(strip_tags($this->cidade));
        $this->estado = htmlspecialchars(strip_tags($this->estado));
        $this->senha = htmlspecialchars(strip_tags($this->senha));

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":sobrenome", $this->sobrenome);
        $stmt->bindParam(":cpf_cnpj", $this->cpf_cnpj);
        $stmt->bindParam(":idade", $this->idade);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":cep", $this->cep);
        $stmt->bindParam(":logradouro", $this->logradouro);
        $stmt->bindParam(":numero", $this->numero);
        $stmt->bindParam(":complemento", $this->complemento);
        $stmt->bindParam(":cidade", $this->cidade);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":senha", $this->senha);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getU(){
        $sqlQuery = "SELECT *  FROM " . $this->db_table ;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
    function deleteU()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}

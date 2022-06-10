<?php
class Produto
{
    private $conn;

    private $db_table = "produto";
    public $id;
    public $produto;
    public $quantidade;
    public $preco;
    public $data_plantio;
    public $data_colheita;
    public $validade;
    public $categoria;
    public $tecnica;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function createP()
    {
        $sqlQuery = "INSERT INTO
                        " . $this->db_table . "
                    ( `nome_produto`, `quantidade`, `preco`, `data_plantio`, `data_colheita`, `validade_dias`, `categoria`, `tecnica`) VALUES";


        $stmt = $this->conn->prepare($sqlQuery);
        $this->produto = htmlspecialchars(strip_tags($this->produto));
        $this->quantidade = htmlspecialchars(strip_tags($this->quantidade));
        $this->preco = htmlspecialchars(strip_tags($this->preco));
        $this->data_plantio = htmlspecialchars(strip_tags($this->data_plantio));
        $this->data_colheita = htmlspecialchars(strip_tags($this->data_colheita));
        $this->validade = htmlspecialchars(strip_tags($this->validade));
        $this->categoria = htmlspecialchars(strip_tags($this->categoria));
        $this->tecnica = htmlspecialchars(strip_tags($this->tecnica));

        $stmt->bindParam(":nome_produto", $this->produto);
        $stmt->bindParam(":quantidade", $this->quantidade);
        $stmt->bindParam(":preco", $this->preco);
        $stmt->bindParam(":data_plantio", $this->data_plantio);
        $stmt->bindParam(":data_colheita", $this->data_colheita);
        $stmt->bindParam(":validade", $this->validade);
        $stmt->bindParam(":categoria", $this->categoria);
        $stmt->bindParam(":tenica", $this->tecnica);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getP()
    {
        $sqlQuery = "SELECT  * FROM " . $this->db_table;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function updateP()
    {
        $sqlQuery = "UPDATE
                        " . $this->db_table . "
                    SET
                        nome_produto = :produto, 
                        quantidade = :quantidade, 
                        preco = :preco, 
                        data_plantio = :data_plantio, 
                        data_colheita = :data_colheita,
                        validade = :validade,
                        categoria = :categoria,
                        tecnica = :tecnica
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->produto = htmlspecialchars(strip_tags($this->produto));
        $this->quantidade = htmlspecialchars(strip_tags($this->quantidade));
        $this->preco = htmlspecialchars(strip_tags($this->preco));
        $this->data_plantio = htmlspecialchars(strip_tags($this->data_plantio));
        $this->data_colheita = htmlspecialchars(strip_tags($this->data_colheita));
        $this->validade = htmlspecialchars(strip_tags($this->validade));
        $this->categoria = htmlspecialchars(strip_tags($this->categoria));
        $this->tecnica = htmlspecialchars(strip_tags($this->tecnica));

        $stmt->bindParam(":nome_produto", $this->produto);
        $stmt->bindParam(":quantidade", $this->quantidade);
        $stmt->bindParam(":preco", $this->preco);
        $stmt->bindParam(":data_plantio", $this->data_plantio);
        $stmt->bindParam(":data_colheita", $this->data_colheita);
        $stmt->bindParam(":validade", $this->validade);
        $stmt->bindParam(":categoria", $this->categoria);
        $stmt->bindParam(":tenica", $this->tecnica);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getSingleP()
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table . " WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->produto = $dataRow['nome_produto'];
        $this->quantidade = $dataRow['quantidade'];
        $this->preco = $dataRow['preco'];
        $this->data_plantio = $dataRow['data_plantio'];
        $this->data_colheita = $dataRow['data_colheita'];
        $this->validade = $dataRow['validade_dias'];
        $this->categoria = $dataRow['categoria'];
        $this->tecnica = $dataRow['tecnica'];
    }
}

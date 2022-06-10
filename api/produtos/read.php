<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../class/produto.php';
require_once '../vendor/autoload.php';

$database = new Conectar();
$db = $database->getConnection();

$items = new Produto($db);

$stmt = $items->getP();
$itemCount = $stmt->rowCount();


echo json_encode($itemCount);

if ($itemCount > 0) {

    $produtos = array();
    $produtos["body"] = array();
    $produtos["itemCount"] = $itemCount;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "produto" => $nome_produto,
            "quantidade" => $name,
            "preco" => $preco,
            "data_plantio" => $data_plantio,
            "data_colheita" => $data_colheira,
            "validade" => $valide,
            "categoria" => $categoria,
            "tecnica" => $tecnica
        );

        array_push($produtos["body"], $e);
    }
    echo json_encode($produtos);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "Registro não encontrado")
    );
}

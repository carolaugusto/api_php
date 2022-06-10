<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../class/produto.php';
require_once '../vendor/autoload.php';

$database = new Conectar();
$db = $database->getConnection();

$item = new Produto($db);

$data = json_decode(file_get_contents("php://input"));

$item->id = $data->id;
$item->nome_produto = $data->nome_produto;
$item->quantidade = $data->quantidade;
$item->preco = $data->preco;
$item->data_plantio = $data->data_plantio;
$item->data_colheita = $data->data_colheita;
$item->validade = $data->validade;
$item->categoria = $data->categoria;
$item->tecnica = $data->tecnica;

if ($item->createP()) {
    echo 'Cadastro realizado com sucesso';
} else {
    echo 'Falha no cadastro';
}

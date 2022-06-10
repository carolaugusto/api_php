<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../class/usuarios.php';
require_once '../vendor/autoload.php';

$database = new Conectar();
$db = $database->getConnection();

$item = new Usuario($db);

$data = json_decode(file_get_contents("php://input"));

$item->id = $data->id;

$item->nome = $data->nome;
$item->sobrenome = $data->sobrenome;
$item->cpf_cnpj = $data->cpf_cnpj;
$item->idade = $data->idade;
$item->sexo = $data->sexo;
$item->email = $data->email;
$item->cep = $data->cep;
$item->logradouro = $data->logradouro;
$item->numero = $data->numero;
$item->complemento = $data->complemento;
$item->bairro = $data->bairro;
$item->cidade = $data->cidade;
$item->estado = $data->estado;
$item->senha = $data->senha;

if ($item->updateU()) {
    echo json_encode("Dados cadastrais atualizados com sucesso!");
} else {
    echo json_encode("Falha ao atualizar os dados cadastrais");
}

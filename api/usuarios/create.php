<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//include_once '../config/database.php';
include_once '../class/usuarios.php';
require_once '../vendor/autoload.php';

$db = "agrow";
$dbuser = "root";
$dbpassword = "";
$dbhost = "localhost";

$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $db);

$item = new Usuario($link);

$data = json_decode(file_get_contents("php://input"));

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
$item->cidade = $data->cidade;
$item->estado = $data->estado;
$item->senha = $data->senha;

if ($item->createU()) {
    echo 'Cadastro realizado com sucesso';
} else {
    echo 'Falha no cadastro';
}

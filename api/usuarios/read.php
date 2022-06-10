<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once '../config/database.php';
require_once '../class/usuarios.php';
require_once '../vendor/autoload.php';

$database = new Conectar();
$db = $database->getConnection();

$items = new Usuario($db);

$stmt = $items->getU();
$itemCount = $stmt->rowCount();


echo json_encode($itemCount);

if ($itemCount > 0) {

    $usuarios = array();
    $usuarios["body"] = array();
    $usuarios["itemCount"] = $itemCount;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "id" => $id,
            "nome" => $nome,
            "sobrenome" => $sobrenome,
            "cpf_cnpj" => $cpf_cnpj,
            "idade" => $idade,
            "sexo" => $sexo,
            "email" => $email,
            "cep" => $cep,
            "logradouro" => $logradouro,
            "numero" => $numero,
            "complemento" => $complemento,
            "cidade" => $cidade,
            "estado" => $estado,
            "senha" => $logradouro,
        );

        array_push($usuarios["body"], $e);
    }
    echo json_encode($usuarios);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "Registro não encontrado")
    );
}

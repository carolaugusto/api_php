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
    
    if($item->deleteU()){
        echo json_encode("Usuário deletado com sucesso!");
    } else{
        echo json_encode("Falha ao deletar usuário");
    }
?>
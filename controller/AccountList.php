<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database.php';
include_once '../account.php';
$database = new Database();
$db = $database->getConnection();
$customer = new Customer($db);
$account = new Account($db);
$records = $account->getAccounts();
$cedula = $records->num_rows;
if ($cedula > 0){
    $arrayAccount = array();
    while ($row = $records->fetch_assoc()){
        // agregar cada registro al array arrayProduct
        array_push($arrayAccount, $row);
    }
    // convertir los datos del array
    // en formato json
    echo json_encode($arrayAccount);
}
else{
    http_response_code(404);
    echo json_encode(
        array(
            "message" => "Clientes no encontrados"
            )
        );
}
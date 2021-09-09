<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database.php';
include_once '../customer.php';
$database = new Database();
$db = $database->getConnection();
$customer = new Customer($db);
$records = $customer->getCustomers();
$countCustomer = $records->num_rows;
if ($countCustomer > 0){
    $arrayCustomer = array();
    while ($row = $records->fetch_assoc()){
        // agregar cada registro al array arrayProduct
        array_push($arrayCustomer, $row);
    }
    // convertir los datos del array
    // en formato json
    echo json_encode($arrayCustomer);
}
else{
    http_response_code(404);
    echo json_encode(
        array(
            "message" => "Clientes no encontrados"
            )
        );
}
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../database.php';
include_once '../customer.php';
$database = new Database();
$db = $database->getConnection();
$customer = new Customer($db);
$customer->id = isset($_GET['id']) ? $_GET['id'] : die();
$customer->getCustomersID();
if ($customer->cedula != null) {

    // create array
    $customer_arr = array(
        "id" => $customer->id,
        "cedula" => $customer->cedula,
        "nombres" => $customer->nombres,
        "telefonos" => $customer->telefonos
    );

    http_response_code(200);
    echo json_encode($customer_arr);
} else {
    http_response_code(404);
    echo json_encode("Producto NO encontrado.");
}
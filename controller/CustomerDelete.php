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

$customer->cedula = isset($_GET['cedula']) ? $_GET['cedula'] : die();

if ($customer->deleteCustomer()) { 
    echo json_encode("Cliente Eliminado ...");
} else { 
    echo json_encode("No se pudo eliminar el cliente");
}
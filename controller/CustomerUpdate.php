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
$customer->cedula = $_GET['cedula'];
$customer->nombres = $_GET['nombres'];
$customer->telefonos = $_GET['telefonos'];

if ($customer->updateCustomer()) { // return true
    echo 'Cliente actualizado correctamente...';
} else { // return false
    echo 'Cliente NO se actualizo ...';
}
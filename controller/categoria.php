<?php


header('Content-Type: application/json');

require_once("../config/conexion.php");
require_once("../models/Categoria.php");

$categoria=new Categoria();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){

    case "GetProducto":
        $datos=$categoria->get_productos();
        echo json_encode($datos);

    break;

    case "InsertProducto":
        $datos=$categoria->set_producto($body["Nombre"], $body["Descripcion"], $body["Foto"]);
        echo json_encode("Envio de informacion realizado");

    break;

    case "GetCodigo":
        $datos=$categoria->get_productos_x_codigo($body["cat_id"]);
        echo json_encode($datos);

    break;

    case "GetOrganizacion":
        $datos=$categoria->get_organizacion();
        echo json_encode($datos);
    break;
    
    case "InsertPersonal":
        $datos=$categoria->set_personal($body["Nombre"], $body["Contacto"], $body["Rol"]);
        echo json_encode("Envio de informacion realizado");

    break;

    case "GetPersonal":
        $datos=$categoria->get_personal();
        echo json_encode($datos);

    break;
    
    case "InsertContacto":
        $datos=$categoria->set_contacto($body["Nombre_cliente"], $body["Mensaje"]);
        echo json_encode("Envio de informacion realizado");

    break;
}

?>
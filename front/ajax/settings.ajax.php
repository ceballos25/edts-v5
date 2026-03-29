<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

require_once "../../config/config.php";
require_once "../../controllers/apiRequest.controller.php";
require_once "../../controllers/settings.controller.php";

$action = $_POST['action'] ?? '';

switch ($action) {

    case 'obtener':
        echo json_encode(SettingsController::obtenerSettings());
        break;

    case 'actualizar':
        echo json_encode(SettingsController::actualizarSettings($_POST));
        break;

    case 'crear':
        echo json_encode(SettingsController::crearSetting($_POST));
        break;

    case 'eliminar':
        echo json_encode(SettingsController::eliminarSetting($_POST));
        break;

    default:
        echo json_encode(['success' => false, 'message' => 'Acción inválida']);
}
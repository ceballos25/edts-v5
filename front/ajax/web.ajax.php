<?php
error_reporting(0);
ini_set('display_errors', 0);
header('Content-Type: application/json; charset=utf-8');

require_once "../../config/config.php";
require_once "../../controllers/apiRequest.controller.php";
require_once "../../controllers/paymentBackupsController.php";
require_once "../../controllers/openpay.controller.php";

$action = $_POST['action'] ?? '';

try {

    /* =====================================
     * 1. CREAR RESPALDO (OK)
     * ===================================== */
    if ($action === 'crear_respaldo') {

        echo json_encode(
            PaymentBackupsController::crearRespaldo($_POST)
        );
        exit;
    }

    /* =====================================
     * 2. IR A OPENPAY (ÚNICA FORMA)
     * ===================================== */
    if ($action === 'ir_openpay') {

        echo json_encode(
            OpenPayController::irAOpenPay($_POST)
        );
        exit;
    }

    throw new Exception('Accion no valida');

} catch (Throwable $e) {

    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}

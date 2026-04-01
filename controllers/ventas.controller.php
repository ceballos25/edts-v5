<?php

require_once 'mail.controller.php';

/**
 * VentasController
 * 
 * Controlador para gestión de ventas de rifas
 * Maneja consultas, filtrado y generación de reportes
 */
class VentasController {

    const TABLE = 'sales';

    /* ==========================================
     * OBTENER VENTAS PAGINADAS
     * ========================================== */
    public static function obtenerVentas() {

        $select  = 'id_sale,code_sale,total_sale,payment_method_sale,status_sale,date_created_sale,quantity_sale,name_customer,lastname_customer,phone_customer,email_customer,city_customer,title_raffle,id_admin_sale,source_sale,email_admin';
        $filtros = self::obtenerFiltros();

        $page    = max(1, (int)($_POST['page']  ?? 1));
        $limit   = min(200, max(1, (int)($_POST['limit'] ?? 50)));
        $startAt = ($page - 1) * $limit;
        $endAt   = $startAt + $limit;

        $linkTo = [];
        $search = [];

        if (!empty($filtros['search'])) {
            $s = $filtros['search'];
            if (is_numeric($s)) {
                $linkTo[] = 'phone_customer';
                $search[]  = $s;
            } elseif (str_contains($s, '@')) {
                $linkTo[] = 'email_customer';
                $search[]  = $s;
            } elseif (preg_match('/^[0-9]{6,}/', $s)) {
                $linkTo[] = 'code_sale';
                $search[]  = $s;
            } else {
                $linkTo[] = 'name_customer';
                $search[]  = $s;
            }
        }

        if (!empty($filtros['idRaffle'])) {
            $linkTo[] = 'id_raffle_sale';
            $search[]  = $filtros['idRaffle'];
        }
        if (!empty($filtros['metodoPago'])) {
            $linkTo[] = 'payment_method_sale';
            $search[]  = $filtros['metodoPago'];
        }
        if (!empty($filtros['idAdmin'])) {
            $linkTo[] = 'id_admin_sale';
            $search[]  = $filtros['idAdmin'];
        }
        if (!empty($filtros['sourceSale'])) {
            $linkTo[] = 'source_sale';
            $search[]  = $filtros['sourceSale'];
        }

        $baseParams = [
            "rel"       => "sales,customers,raffles,admins",
            "type"      => "sale,customer,raffle,admin",
            "orderBy"   => "id_sale",
            "orderMode" => "DESC",
        ];

        if (!empty($linkTo)) {
            $baseParams['linkTo'] = implode(',', $linkTo);
            $baseParams['search'] = implode(',', $search);
        }

        // Consulta de TOTAL (sin paginación)
        $resTotal  = ApiRequest::get("relations", array_merge($baseParams, ['select' => 'id_sale']));
        $totalReal = ApiRequest::isSuccess($resTotal) ? (int)($resTotal->total ?? 0) : 0;

        // Consulta paginada
        $res = ApiRequest::get("relations", array_merge($baseParams, [
            "select"  => $select,
            "startAt" => $startAt,
            "endAt"   => $endAt,
        ]));

        if (!ApiRequest::isSuccess($res)) {
            return ['success' => true, 'data' => [], 'total' => 0];
        }

        $results = $res->results ?? null;
        if (empty($results)) {
            return ['success' => true, 'data' => [], 'total' => $totalReal];
        }

        $ventas = is_array($results) ? $results : [$results];

        foreach ($ventas as &$v) {
            $v->email_admin = !empty($v->email_admin) ? $v->email_admin : 'Sistema';
        }
        unset($v);

        return [
            'success' => true,
            'data'    => $ventas,
            'total'   => $totalReal
        ];
    }

    /* ==========================================
     * OBTENER ORÍGENES ÚNICOS
     * ========================================== */
    public static function obtenerOrigenesUnicos() {

        $res = ApiRequest::get("sales", ["select" => "source_sale"]);

        if (!ApiRequest::isSuccess($res) || empty($res->results)) {
            return ['success' => true, 'data' => []];
        }

        $results  = is_array($res->results) ? $res->results : [$res->results];
        $origenes = array_values(array_unique(array_filter(
            array_map(fn($r) => trim($r->source_sale ?? ''), $results)
        )));

        sort($origenes);

        return ['success' => true, 'data' => $origenes];
    }

    /* ==========================================
     * LISTAR RIFAS
     * ========================================== */
    public static function listarRifas() {

        $res = ApiRequest::get("raffles", ["select" => "id_raffle,title_raffle"]);

        return ApiRequest::isSuccess($res)
            ? ['success' => true, 'data' => $res->results]
            : ['success' => false];
    }

    /* ==========================================
     * OBTENER TICKETS DISPONIBLES
     * ========================================== */
    public static function obtenerTicketsDisponibles($idRaffle) {

        $result = ApiRequest::get('tickets', [
            'linkTo'  => 'id_raffle_ticket,status_ticket',
            'equalTo' => $idRaffle . ",0",
            'select'  => 'id_ticket,number_ticket'
        ]);

        $data = ApiRequest::isSuccess($result) ? ($result->results ?? []) : [];

        if (!empty($data)) {
            shuffle($data);
        }

        return [
            'success' => true,
            'data'    => is_array($data) ? $data : [$data]
        ];
    }

    /* ==========================================
     * CREAR VENTA
     * ========================================== */
    public static function crearVenta($data) {

        $cantidad = (int)($data['quantity_sale'] ?? 0);
        $idRaffle = (int)($data['id_raffle']    ?? 0);

        if ($cantidad <= 0 || $idRaffle <= 0) {
            return ['success' => false, 'message' => 'Datos inválidos para crear venta'];
        }

        /* --- TICKETS DISPONIBLES --- */
        $res = ApiRequest::get("tickets", [
            'linkTo'  => 'id_raffle_ticket,status_ticket',
            'equalTo' => $idRaffle . ',0',
            'select'  => 'id_ticket'
        ]);

        if (!ApiRequest::isSuccess($res) || empty($res->results)) {
            return ['success' => false, 'message' => 'No hay números disponibles'];
        }

        $ticketsDisponibles = is_array($res->results) ? $res->results : [$res->results];

        if (count($ticketsDisponibles) < $cantidad) {
            return ['success' => false, 'message' => 'No hay suficientes números disponibles'];
        }

        /* --- SELECCIÓN ALEATORIA --- */
        shuffle($ticketsDisponibles);
        $ticketsSeleccionados = array_slice($ticketsDisponibles, 0, $cantidad);
        $ticketIds = array_map(fn($t) => $t->id_ticket, $ticketsSeleccionados);

        /* --- CLIENTE --- */
        $idCliente = self::obtenerOCrearCliente($data);

        if (!$idCliente) {
            return ['success' => false, 'message' => 'Error al procesar cliente'];
        }

        /* --- CREAR VENTA --- */
        $datosVenta = [
            'id_customer_sale'    => (int)$idCliente,
            'id_raffle_sale'      => $idRaffle,
            'code_sale'           => $data['code_sale'],
            'quantity_sale'       => $cantidad,
            'total_sale'          => $data['total_sale'],
            'payment_method_sale' => $data['payment_method_sale'],
            'status_sale'         => 1,
            'id_admin_sale'       => $data['id_admin'] ?? $_SESSION['user_id'] ?? null,
            'source_sale'         => $data['source_sale'] ?? $data['source_transfer'] ?? null,
        ];

        $resVenta = ApiRequest::post(
            self::TABLE . "?token=no&suffix=sale&except=code_sale",
            $datosVenta
        );

        if (!ApiRequest::isSuccess($resVenta)) {
            return ['success' => false, 'message' => 'Error al crear venta'];
        }

        $idVenta = $resVenta->results->lastId ?? $resVenta->results;

        /* --- MARCAR TICKETS COMO VENDIDOS --- */
        foreach ($ticketIds as $idTicket) {
            ApiRequest::put(
                "tickets?id=$idTicket&nameId=id_ticket&token=no&except=number_ticket",
                [
                    'status_ticket'      => 1,
                    'id_customer_ticket' => (int)$idCliente,
                    'id_sale_ticket'     => (int)$idVenta
                ]
            );
        }

        /* --- ENVIAR CORREO --- */
        MailController::enviarCorreoVenta((int)$idVenta);

        return ['success' => true, 'id_sale' => $idVenta];
    }

    /* ==========================================
     * OBTENER DETALLE DE VENTA
     * ========================================== */
    public static function obtenerDetalleVenta($idVenta) {

        $venta = self::consultarVenta($idVenta);
        if (!$venta) {
            return ['success' => false, 'message' => 'Venta no encontrada'];
        }

        $tickets    = self::consultarTicketsVenta($idVenta);
        $htmlRecibo = self::generarRecibo($venta, $tickets);

        if (!$htmlRecibo) {
            return ['success' => false, 'message' => 'Error al generar recibo'];
        }

        return ['success' => true, 'html_recibo' => $htmlRecibo];
    }

    /* ==========================================
     * OBTENER FILTROS
     * ========================================== */
    public static function obtenerFiltros() {

        $search      = trim($_POST['search']         ?? '');
        $idRaffle    = $_POST['id_raffle']            ?? '';
        $fechaInicio = $_POST['fecha_inicio']         ?? '';
        $fechaFin    = $_POST['fecha_fin']            ?? '';
        $periodo     = $_POST['periodo']              ?? '';
        $metodoPago  = $_POST['payment_method']       ?? '';
        $idAdmin     = $_POST['id_admin']             ?? '';
        $sourceSale  = $_POST['source_sale']          ?? '';

        [$dateFrom, $dateTo] = self::calcularRangoFechas($fechaInicio, $fechaFin, $periodo);

        return compact('search', 'idRaffle', 'metodoPago', 'dateFrom', 'dateTo', 'idAdmin', 'sourceSale');
    }

    /* ==========================================
     * OBTENER ADMINS
     * ========================================== */
    public static function obtenerAdmins() {

        $res = ApiRequest::get("admins", ["select" => "id_admin,email_admin"]);

        if (!ApiRequest::isSuccess($res) || empty($res->results)) {
            return ['success' => true, 'data' => []];
        }

        return [
            'success' => true,
            'data'    => is_array($res->results) ? $res->results : [$res->results]
        ];
    }

    /* ==========================================
     * CALCULAR RANGO DE FECHAS
     * ========================================== */
    public static function calcularRangoFechas($fechaInicio, $fechaFin, $periodo) {

        if ($fechaInicio && $fechaFin) {
            return [$fechaInicio, $fechaFin];
        }

        if (!$periodo) {
            return [null, null];
        }

        $hoy = date('Y-m-d');

        $rangos = [
            'today'     => [$hoy, $hoy],
            'yesterday' => [date('Y-m-d', strtotime('-1 day')), date('Y-m-d', strtotime('-1 day'))],
            'week'      => [date('Y-m-d', strtotime('monday this week')), $hoy],
            'month'     => [date('Y-m-01'), date('Y-m-t')],
            'year'      => [date('Y-01-01'), date('Y-12-31')]
        ];

        return $rangos[$periodo] ?? [null, null];
    }

    /* ==========================================
     * OBTENER O CREAR CLIENTE
     * ========================================== */
    public static function obtenerOCrearCliente($data) {

        $idCliente = !empty($data['id_customer']) ? $data['id_customer'] : null;

        if ($idCliente) {
            return $idCliente;
        }

        // Normalizar teléfono
        $phone = preg_replace('/[^0-9]/', '', $data['phone_customer']);
        if (strpos($phone, '57') === 0 && strlen($phone) == 12) {
            $phone = substr($phone, 2);
        }

        // Buscar cliente por teléfono
        $searchC = ApiRequest::get("customers", [
            "linkTo"  => "phone_customer",
            "equalTo" => $phone,
            "select"  => "id_customer"
        ]);

        if (ApiRequest::isSuccess($searchC) && !empty($searchC->results)) {
            return $searchC->results[0]->id_customer;
        }

        // Crear nuevo cliente
        $resC = ApiRequest::post("customers?token=no&suffix=customer&except=name_customer", [
            'name_customer'       => ucwords(strtolower($data['name_customer'])),
            'lastname_customer'   => ucwords(strtolower($data['lastname_customer'])),
            'phone_customer'      => $phone,
            'email_customer'      => $data['email_customer'],
            'department_customer' => $data['department_customer'],
            'city_customer'       => $data['city_customer'],
            'status_customer'     => 1
        ]);

        return ApiRequest::isSuccess($resC) ? $resC->results->lastId : null;
    }

    /* ==========================================
     * CONSULTAR VENTA
     * ========================================== */
    public static function consultarVenta($idVenta) {

        $res = ApiRequest::get("relations", [
            'rel'     => 'sales,customers,raffles',
            'type'    => 'sale,customer,raffle',
            'select'  => 'id_sale,date_created_sale,total_sale,name_customer,lastname_customer,code_sale,quantity_sale,title_raffle,email_customer',
            'linkTo'  => 'id_sale',
            'equalTo' => $idVenta
        ]);

        return (ApiRequest::isSuccess($res) && !empty($res->results))
            ? $res->results[0]
            : null;
    }

    /* ==========================================
     * CONSULTAR TICKETS DE UNA VENTA
     * ========================================== */
    public static function consultarTicketsVenta($idVenta) {

        $res = ApiRequest::get('tickets', [
            'linkTo'  => 'id_sale_ticket',
            'equalTo' => $idVenta,
            'select'  => 'number_ticket'
        ]);

        if (empty($res->results)) {
            return [];
        }

        $results = is_array($res->results) ? $res->results : [$res->results];

        // Si la API devuelve strings sueltos los convertimos a objetos
        return array_map(function($item) {
            return is_string($item)
                ? (object)['number_ticket' => $item]
                : $item;
        }, $results);
    }

    /* ==========================================
     * GENERAR RECIBO
     * ========================================== */
    public static function generarRecibo($venta, $tickets) {

        $rutaPlantilla = dirname(__DIR__) . "/includes/templeate-ticket.php";

        if (!file_exists($rutaPlantilla)) {
            return null;
        }

        // Formatear fecha
        $fecha = new DateTime($venta->date_created_sale);
        $fecha->setTimezone(new DateTimeZone('America/Bogota'));
        $fechaFormateada = $fecha->format('d/m/Y h:i A');

        // Números ganadores por grupo
        $numerosGanadores = [
            '00405' => true,
            '89035' => true,
            '12053' => true,
            '11123' => true,
            '32941' => true
        ];

        $numerosSegundoPremio = [
            '74013' => true,
            '12345' => true,
            '24681' => true,
            '57602' => true,
            '38521' => true
        ];

        $htmlTickets = '';
        shuffle($tickets);

        foreach ($tickets as $t) {

            $numero = is_string($t) ? $t : ($t->number_ticket ?? '');

            if (empty($numero)) continue;

            if (isset($numerosGanadores[$numero])) {
                $bg     = '#007bff';
                $color  = '#ffffff';
                $border = '#007bff';
            } elseif (isset($numerosSegundoPremio[$numero])) {
                $bg     = '#00b894';
                $color  = '#ffffff';
                $border = '#00b894';
            } else {
                $bg     = '#efb810';
                $color  = '#000000';
                $border = '#ffffff';
            }

            $htmlTickets .= '<span style="
                display:inline-block;
                margin:3px;
                padding:6px 11px;
                background:' . $bg . ';
                color:' . $color . ';
                border:1px solid ' . $border . ';
                border-radius:6px;
                font-weight:bold;
            ">' . $numero . '</span>';
        }

        // Settings dinámicos
        $resSettings = ApiRequest::get("settings", ["select" => "*"]);
        $grupoUrl    = '#';
        $nombreRifa  = 'El Día de Tu Suerte';

        if (ApiRequest::isSuccess($resSettings) && !empty($resSettings->results)) {
            $lista = is_array($resSettings->results) ? $resSettings->results : [$resSettings->results];
            foreach ($lista as $item) {
                if ($item->key_setting === 'whatsapp_group_url') $grupoUrl  = $item->value_setting;
                if ($item->key_setting === 'nombre_rifa')       $nombreRifa = $item->value_setting;
            }
        }

        $reemplazos = [
            '{Nombre Cliente}' => trim($venta->name_customer . " " . $venta->lastname_customer),
            '{ID}'             => $venta->id_sale,
            '{Fecha}'          => $fechaFormateada,
            '{Cantidad}'       => $venta->quantity_sale,
            '{Codigo}'         => $venta->code_sale,
            '{NumerosHTML}'    => $htmlTickets,
            '{Total}'          => '$' . number_format($venta->total_sale, 0, ',', '.'),
            '{GrupoUrl}'       => $grupoUrl,
            '{NombreRifa}'     => $nombreRifa,
        ];

        return str_replace(
            array_keys($reemplazos),
            array_values($reemplazos),
            file_get_contents($rutaPlantilla)
        );
    }

    /* ==========================================
     * OBTENER NÚMEROS VENDIDOS
     * ========================================== */
    public static function obtenerNumerosVendidos() {

        $search      = trim($_POST['search']      ?? '');
        $idRaffle    = $_POST['id_raffle']         ?? '';
        $fechaInicio = $_POST['fecha_inicio']      ?? '';
        $fechaFin    = $_POST['fecha_fin']         ?? '';
        $periodo     = $_POST['periodo']           ?? '';

        [$dateFrom, $dateTo] = self::calcularRangoFechas($fechaInicio, $fechaFin, $periodo);

        $select = 'id_ticket,number_ticket,id_sale_ticket,date_created_sale,name_customer,lastname_customer,phone_customer,email_customer,city_customer,title_raffle,code_sale';

        if ($search !== '') {
            if (is_numeric($search)) {
                $columnas = ['number_ticket'];
            } elseif (strpos($search, '@') !== false) {
                $columnas = ['email_customer'];
            } else {
                $columnas = ['name_customer', 'lastname_customer', 'code_sale'];
            }
        } else {
            $columnas = ['number_ticket'];
        }

        $acumulado = [];

        foreach ($columnas as $col) {

            $params = [
                'rel'       => 'tickets,sales,customers,raffles',
                'type'      => 'ticket,sale,customer,raffle',
                'select'    => $select,
                'orderBy'   => 'number_ticket',
                'orderMode' => 'ASC',
                'linkTo'    => 'status_ticket',
                'equalTo'   => '1'
            ];

            if ($search !== '') {
                $params['linkTo']  .= ',' . $col;
                $params['equalTo'] .= ',' . $search;
            }

            if ($idRaffle) {
                $params['linkTo']  .= ',id_raffle_ticket';
                $params['equalTo'] .= ',' . $idRaffle;
            }

            $res = ApiRequest::get("relations", $params);

            if (ApiRequest::isSuccess($res) && !empty($res->results)) {
                $rows = is_array($res->results) ? $res->results : [$res->results];
                foreach ($rows as $r) {
                    $acumulado[$r->id_ticket] = $r;
                }
            }
        }

        // Filtro por fechas local
        if ($dateFrom && $dateTo) {
            $acumulado = array_filter($acumulado, function($t) use ($dateFrom, $dateTo) {
                $fecha = substr($t->date_created_sale, 0, 10);
                return $fecha >= $dateFrom && $fecha <= $dateTo;
            });
        }

        return ['success' => true, 'data' => array_values($acumulado)];
    }

    /* ==========================================
     * OBTENER VENTA POR CÓDIGO
     * ========================================== */
    public static function obtenerVentaPorCodigo(string $codeSale) {

        $res = ApiRequest::get('relations', [
            'rel'     => 'sales,customers,raffles',
            'type'    => 'sale,customer,raffle',
            'select'  => 'id_sale,code_sale,total_sale,quantity_sale,date_created_sale,payment_method_sale,name_customer,lastname_customer,email_customer,phone_customer,city_customer,title_raffle',
            'linkTo'  => 'code_sale',
            'equalTo' => $codeSale
        ]);

        if (!ApiRequest::isSuccess($res) || empty($res->results)) {
            return ['success' => false, 'message' => 'Venta no encontrada'];
        }

        $venta   = $res->results[0];
        $tickets = ApiRequest::get('tickets', [
            'linkTo'  => 'id_sale_ticket',
            'equalTo' => $venta->id_sale,
            'select'  => 'number_ticket'
        ]);

        return [
            'success' => true,
            'venta'   => $venta,
            'tickets' => is_array($tickets->results) ? $tickets->results : [$tickets->results]
        ];
    }

    /* ==========================================
     * BUSCAR TICKETS POR CELULAR
     * ========================================== */
    public static function buscarTicketsPorCelular($phoneCustomer) {

        $phone = preg_replace('/\D/', '', (string)$phoneCustomer);

        if (!preg_match('/^\d{10}$/', $phone)) {
            return ['success' => false, 'message' => 'El celular debe contener exactamente 10 dígitos'];
        }

        $res = ApiRequest::get('relations', [
            'rel'     => 'sales,customers,raffles',
            'type'    => 'sale,customer,raffle',
            'select'  => 'id_sale,code_sale,total_sale,quantity_sale,date_created_sale,payment_method_sale,name_customer,lastname_customer,email_customer,phone_customer,city_customer,title_raffle',
            'linkTo'  => 'phone_customer',
            'equalTo' => $phone,
            'orderBy' => 'id_sale'
        ]);

        if (!ApiRequest::isSuccess($res) || empty($res->results)) {
            return ['success' => false, 'message' => 'No encontrado'];
        }

        $ventas = is_array($res->results) ? $res->results : [$res->results];
        $html   = '';

        foreach ($ventas as $venta) {

            $ticketsRes = ApiRequest::get('tickets', [
                'linkTo'  => 'id_sale_ticket',
                'equalTo' => $venta->id_sale,
                'select'  => 'number_ticket'
            ]);

            $tickets = (ApiRequest::isSuccess($ticketsRes) && !empty($ticketsRes->results))
                ? (is_array($ticketsRes->results) ? $ticketsRes->results : [$ticketsRes->results])
                : [];

            $html .= self::generarRecibo($venta, $tickets);
        }

        return ['success' => true, 'html' => $html];
    }

    /* ==========================================
     * ANULAR VENTA
     * ========================================== */
    public static function anularVenta($id_sale) {

        if (empty($id_sale)) {
            return ['success' => false, 'message' => 'ID inválido'];
        }

        // Liberar tickets
        $resTickets = ApiRequest::get("tickets", [
            'linkTo'  => 'id_sale_ticket',
            'equalTo' => $id_sale,
            'select'  => 'id_ticket'
        ]);

        if (ApiRequest::isSuccess($resTickets) && !empty($resTickets->results)) {
            $tickets = is_array($resTickets->results) ? $resTickets->results : [$resTickets->results];
            foreach ($tickets as $t) {
                ApiRequest::put(
                    "tickets?id={$t->id_ticket}&nameId=id_ticket&token=no&except=id_ticket",
                    [
                        'status_ticket'      => 0,
                        'id_customer_ticket' => "null",
                        'id_sale_ticket'     => "null"
                    ]
                );
            }
        }

        // Eliminar venta
        $token = $_SESSION['token_admin'] ?? null;

        if (!$token) {
            return ['success' => false, 'message' => 'Sesión expirada o sin token'];
        }

        $urlDelete = "sales?id={$id_sale}&nameId=id_sale&token={$token}&table=admins&suffix=admin";
        $delete    = ApiRequest::delete($urlDelete);

        if (!ApiRequest::isSuccess($delete)) {
            return [
                'success'     => false,
                'message'     => 'La API rechazó la eliminación',
                'error_api'   => $delete->results ?? 'Error desconocido',
                'url_enviada' => $urlDelete
            ];
        }

        return ['success' => true];
    }
}
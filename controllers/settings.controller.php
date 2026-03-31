<?php

class SettingsController {

    const TABLE = 'settings';

    // 🔹 OBTENER TODOS
    public static function obtenerSettings() {

        $params = [
            'select' => 'id_setting,key_setting,value_setting',
            'orderBy' => 'id_setting',
            'orderMode' => 'ASC'
        ];

        $res = ApiRequest::get(self::TABLE, $params);

        if (ApiRequest::isSuccess($res)) {
            return [
                'success' => true,
                'data' => $res->results ?? []
            ];
        }

        return ['success' => false, 'data' => []];
    }

public static function actualizarSettings($data) {

    foreach ($data as $key => $value) {

        if ($key === 'action') continue;

        $key = trim($key);
        $value = trim($value);

        // 🔹 1. BUSCAR ID (igual que ya haces)
        $urlGet = self::TABLE . "?select=id_setting&linkTo=key_setting&equalTo=" . urlencode($key) . "&token=no";
        $resGet = ApiRequest::get($urlGet);

        if (!ApiRequest::isSuccess($resGet) || empty($resGet->results)) {
            return [
                'success' => false,
                'message' => "Setting no encontrado: $key"
            ];
        }

        $id = $resGet->results[0]->id_setting;

        // 🔥 2. UPDATE IGUALITO A CLIENTES
        $urlPut = self::TABLE . "?id=$id&nameId=id_setting&token=no&except=key_setting";

        $update = [
            'value_setting' => $value,
            'date_updated_setting' => date('Y-m-d H:i:s')
        ];

        $resPut = ApiRequest::put($urlPut, $update);

        if (!ApiRequest::isSuccess($resPut)) {
            return [
                'success' => false,
                'message' => "Error actualizando: $key",
                'error' => $resPut
            ];
        }
    }

    return ['success' => true, 'message' => 'Settings actualizados'];
}

    public static function crearSetting($data) {

    // 🔹 1. Validación básica
    if (empty($data['key_setting']) || empty($data['value_setting'])) {
        return [
            'success' => false,
            'message' => 'Key y value requeridos'
        ];
    }

    // 🔹 2. Normalizar
    $key = strtolower(trim($data['key_setting']));
    $key = preg_replace('/\s+/', '_', $key);

    $value = trim($data['value_setting']);

    // 🔹 3. Validar formato
    if (!preg_match('/^[a-z0-9_]+$/', $key)) {
        return [
            'success' => false,
            'message' => 'Key inválida'
        ];
    }

    // 🔹 4. VALIDAR DUPLICADO (ALINEADO A API)
    $checkUrl = self::TABLE . "?select=id_setting&linkTo=key_setting&equalTo=" . urlencode($key) . "&token=no";

    $exists = ApiRequest::get($checkUrl);

    if (ApiRequest::isSuccess($exists) && isset($exists->total) && $exists->total > 0) {
        return [
            'success' => false,
            'message' => 'La key ya existe'
        ];
    }

    // 🔹 5. INSERT
    $url = self::TABLE . "?token=no&except=id_setting";

    $insert = [
        'key_setting' => $key,
        'value_setting' => $value,
        'date_created_setting' => date('Y-m-d'),
        'date_updated_setting' => date('Y-m-d H:i:s')
    ];

    $res = ApiRequest::post($url, $insert);

    return ApiRequest::isSuccess($res)
        ? [
            'success' => true,
            'message' => 'Setting creado'
        ]
        : [
            'success' => false,
            'message' => 'Error al crear'
        ];
}

public static function eliminarSetting($data) {

    if (empty($data['id_setting'])) {
        return ['success' => false, 'message' => 'ID requerido'];
    }

    // 🔹 1. Obtener setting (para validaciones)
    $urlGet = self::TABLE . "?select=key_setting&id=" . $data['id_setting'] . "&nameId=id_setting&token=no";
    $resGet = ApiRequest::get($urlGet);

    if (!ApiRequest::isSuccess($resGet) || empty($resGet->results)) {
        return ['success' => false, 'message' => 'Setting no encontrado'];
    }

    $key = $resGet->results[0]->key_setting;

    // 🔥 2. PROTEGER SETTINGS CRÍTICOS
    $protected = [
        'precio_ticket',
        'max_tickets',
        'min_tickets'
    ];

    if (in_array($key, $protected)) {
        return [
            'success' => false,
            'message' => 'Este setting no se puede eliminar'
        ];
    }

    // 🔹 3. DELETE (ALINEADO A TU API)
    $url = self::TABLE . "?id=" . $data['id_setting'] . "&nameId=id_setting&token=no&except=key_setting";

    $res = ApiRequest::delete($url);

    return ApiRequest::isSuccess($res)
        ? ['success' => true, 'message' => 'Setting eliminado']
        : ['success' => false, 'message' => 'Error al eliminar'];
}
}
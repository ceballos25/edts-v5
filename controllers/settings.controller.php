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

    // 🔹 ACTUALIZAR (bulk, estilo config)
    public static function actualizarSettings($data) {

        foreach ($data as $key => $value) {

            if ($key === 'action') continue;

            $url = self::TABLE . "?linkTo=key_setting&equalTo=" . $key . "&token=no";

            $update = [
                'value_setting' => trim($value),
                'date_updated_setting' => date('Y-m-d H:i:s')
            ];

            $res = ApiRequest::put($url, $update);

            if (!ApiRequest::isSuccess($res)) {
                return [
                    'success' => false,
                    'message' => "Error actualizando: $key"
                ];
            }
        }

        return ['success' => true, 'message' => 'Settings actualizados'];
    }

    // 🔹 CREAR NUEVO SETTING
    public static function crearSetting($data) {

        if (empty($data['key_setting']) || empty($data['value_setting'])) {
            return ['success' => false, 'message' => 'Key y value requeridos'];
        }

        $url = self::TABLE . "?token=no&except=id_setting";

        $insert = [
            'key_setting' => trim($data['key_setting']),
            'value_setting' => trim($data['value_setting']),
            'date_created_setting' => date('Y-m-d'),
            'date_updated_setting' => date('Y-m-d H:i:s')
        ];

        $res = ApiRequest::post($url, $insert);

        return ApiRequest::isSuccess($res)
            ? ['success' => true, 'message' => 'Setting creado']
            : ['success' => false, 'message' => 'Error al crear'];
    }

    // 🔹 ELIMINAR
    public static function eliminarSetting($data) {

        if (empty($data['id_setting'])) {
            return ['success' => false, 'message' => 'ID requerido'];
        }

        $url = self::TABLE . "?id=" . $data['id_setting'] . "&nameId=id_setting&token=no";

        $res = ApiRequest::delete($url);

        return ApiRequest::isSuccess($res)
            ? ['success' => true, 'message' => 'Eliminado']
            : ['success' => false, 'message' => 'Error al eliminar'];
    }
}
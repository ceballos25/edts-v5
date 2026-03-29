<?php
require_once "../config/config.php";
$page_title = "Configuración del Sistema";
include_once ROOT_PATH . "/includes/head.php";
?>

<div class="page-wrapper" id="main-wrapper" data-layout="vertical">

    <?php include_once ROOT_PATH . "/includes/sidebar.php" ?>

    <div class="body-wrapper">
        <?php include_once ROOT_PATH . "/includes/header.php" ?>

        <div class="body-wrapper-inner">
            <div class="container-fluid">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 fw-bold">
                        <i class="ti ti-settings me-1"></i>Configuración
                    </h2>
                    <button class="btn btn-success" onclick="guardarSettings()">
                        <i class="ti ti-device-floppy"></i> Guardar Cambios
                    </button>
                </div>

                <!-- CARD -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">

                        <!-- CONTENEDOR SETTINGS -->
                        <div id="settingsContainer">
                            <div class="text-center py-5 text-muted">
                                Cargando configuración...
                            </div>
                        </div>

                    </div>
                </div>

                <!-- CREAR NUEVO -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body">

                        <h5 class="fw-bold mb-3">Agregar nueva configuración</h5>

                        <div class="row g-2">
                            <div class="col-md-5">
                                <input type="text" id="newKey" class="form-control"
                                    placeholder="key_setting (ej: max_tickets)">
                            </div>
                            <div class="col-md-5">
                                <input type="text" id="newValue" class="form-control"
                                    placeholder="value_setting">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary w-100" onclick="crearSetting()">
                                    <i class="ti ti-plus"></i> Crear
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
$extra_js = '
<script src="' . ASSETS_URL . '/js/settings.js"></script>
';
include_once ROOT_PATH . "/includes/footer.php";
?>
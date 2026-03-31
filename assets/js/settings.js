// ============================
// INIT
// ============================
document.addEventListener('DOMContentLoaded', () => {
    cargarSettings();
});

// ============================
// HELPERS
// ============================
function escapeHtml(text) {
    return String(text)
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

// ============================
// CARGAR
// ============================
async function cargarSettings() {

    if (typeof showPreloader === 'function') showPreloader();

    try {
        const fd = new FormData();
        fd.append('action', 'obtener');

        const res = await fetch('ajax/settings.ajax.php', {
            method: 'POST',
            body: fd
        });

        const data = await res.json();

        if (!data.success) {
            throw new Error("Error cargando settings");
        }

        renderSettings(data.data || []);

    } catch (e) {
        console.error(e);
        alertify.error("Error cargando configuración");
    } finally {
        if (typeof hidePreloader === 'function') hidePreloader();
    }
}

// ============================
// RENDER
// ============================
function renderSettings(settings) {

    const container = document.getElementById('settingsContainer');

    if (!settings.length) {
        container.innerHTML = `<div class="text-center py-5 text-muted">Sin configuración</div>`;
        return;
    }

    container.innerHTML = settings.map(s => `

        <div class="row mb-3 align-items-center border-bottom pb-2" id="row-${s.id_setting}">
            
            <!-- KEY -->
            <div class="col-md-3">
                <label class="fw-bold">${escapeHtml(s.key_setting)}</label>
            </div>

            <!-- VALUE -->
            <div class="col-md-5">
                <input type="text" 
                    class="form-control" 
                    id="input-${s.id_setting}"
                    data-key="${s.key_setting}" 
                    value="${escapeHtml(s.value_setting)}"
                    disabled>
            </div>

            <!-- ACCIONES -->
            <div class="col-md-4 text-end">

                <!-- EDITAR -->
                <button class="btn btn-sm btn-outline-primary me-1" 
                    onclick="activarEdicion(${s.id_setting})"
                    id="btn-edit-${s.id_setting}">
                    <i class="ti ti-pencil"></i>
                </button>

                <!-- GUARDAR -->
                <button class="btn btn-sm btn-success me-1 d-none" 
                    onclick="guardarIndividual(${s.id_setting})"
                    id="btn-save-${s.id_setting}">
                    <i class="ti ti-check"></i>
                </button>

                <!-- CANCELAR -->
                <button class="btn btn-sm btn-secondary me-1 d-none" 
                    onclick="cancelarEdicion(${s.id_setting}, '${escapeHtml(s.value_setting)}')"
                    id="btn-cancel-${s.id_setting}">
                    <i class="ti ti-x"></i>
                </button>

                <!-- ELIMINAR -->
                <button class="btn btn-sm btn-outline-danger" 
                    onclick="eliminarSetting(${s.id_setting})">
                    <i class="ti ti-trash"></i>
                </button>

            </div>

        </div>

    `).join('');
}

// ============================
// EDITAR (ACTIVAR)
// ============================
function activarEdicion(id) {

    const input = document.getElementById(`input-${id}`);
    input.disabled = false;
    input.focus();

    document.getElementById(`btn-edit-${id}`).classList.add('d-none');
    document.getElementById(`btn-save-${id}`).classList.remove('d-none');
    document.getElementById(`btn-cancel-${id}`).classList.remove('d-none');
}

// ============================
// CANCELAR
// ============================
function cancelarEdicion(id, originalValue) {

    const input = document.getElementById(`input-${id}`);
    input.value = originalValue;
    input.disabled = true;

    document.getElementById(`btn-edit-${id}`).classList.remove('d-none');
    document.getElementById(`btn-save-${id}`).classList.add('d-none');
    document.getElementById(`btn-cancel-${id}`).classList.add('d-none');
}

// ============================
// GUARDAR INDIVIDUAL
// ============================
async function guardarIndividual(id) {

    const input = document.getElementById(`input-${id}`);
    const key = input.dataset.key;
    const value = input.value.trim();

    const fd = new FormData();
    fd.append('action', 'actualizar');
    fd.append(key, value);

    try {

        const res = await fetch('ajax/settings.ajax.php', {
            method: 'POST',
            body: fd
        });

        const data = await res.json();

        if (!data.success) {
            throw new Error(data.message);
        }

        alertify.success("Actualizado");

        input.disabled = true;

        document.getElementById(`btn-edit-${id}`).classList.remove('d-none');
        document.getElementById(`btn-save-${id}`).classList.add('d-none');
        document.getElementById(`btn-cancel-${id}`).classList.add('d-none');

    } catch (e) {
        alertify.error(e.message || "Error al actualizar");
    }
}

// ============================
// GUARDAR MASIVO
// ============================
async function guardarSettings() {

    const inputs = document.querySelectorAll('[data-key]');
    const fd = new FormData();

    fd.append('action', 'actualizar');

    inputs.forEach(i => {
        fd.append(i.dataset.key, i.value.trim());
    });

    if (typeof showPreloader === 'function') showPreloader();

    try {

        const res = await fetch('ajax/settings.ajax.php', {
            method: 'POST',
            body: fd
        });

        const data = await res.json();

        if (!data.success) {
            throw new Error(data.message);
        }

        alertify.success("Configuración actualizada");
        cargarSettings();

    } catch (e) {
        alertify.error(e.message || "Error al guardar");
    } finally {
        if (typeof hidePreloader === 'function') hidePreloader();
    }
}

// ============================
// CREAR
// ============================
async function crearSetting() {

    let key = document.getElementById('newKey').value.trim();
    const value = document.getElementById('newValue').value.trim();

    if (!key || !value) {
        alertify.error("Completa ambos campos");
        return;
    }

    // normalización
    key = key.toLowerCase().replace(/\s+/g, '_');

    const fd = new FormData();
    fd.append('action', 'crear');
    fd.append('key_setting', key);
    fd.append('value_setting', value);

    try {

        const res = await fetch('ajax/settings.ajax.php', {
            method: 'POST',
            body: fd
        });

        const data = await res.json();

        if (!data.success) {
            throw new Error(data.message);
        }

        alertify.success("Setting creado");

        document.getElementById('newKey').value = '';
        document.getElementById('newValue').value = '';

        cargarSettings();

    } catch (e) {
        alertify.error(e.message || "Error al crear");
    }
}

// ============================
// ELIMINAR
// ============================
async function eliminarSetting(id) {

    if (!confirm("¿Eliminar este setting?")) return;

    const fd = new FormData();
    fd.append('action', 'eliminar');
    fd.append('id_setting', id);

    try {

        const res = await fetch('ajax/settings.ajax.php', {
            method: 'POST',
            body: fd
        });

        const data = await res.json();

        if (!data.success) {
            throw new Error(data.message);
        }

        alertify.success("Eliminado");
        cargarSettings();

    } catch (e) {
        alertify.error(e.message || "Error al eliminar");
    }
}
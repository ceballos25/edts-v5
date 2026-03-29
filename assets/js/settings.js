let settingsCache = [];

// ============================
// INIT
// ============================
document.addEventListener('DOMContentLoaded', () => {
    cargarSettings();
});

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

        if (data.success) {
            settingsCache = data.data || [];
            renderSettings(settingsCache);
        }

    } catch (e) {
        console.error("Error cargando settings:", e);
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
        <div class="row mb-3 align-items-center border-bottom pb-2">
            
            <div class="col-md-4">
                <label class="fw-bold">${s.key_setting}</label>
            </div>

            <div class="col-md-6">
                <input type="text" 
                    class="form-control" 
                    data-key="${s.key_setting}" 
                    value="${s.value_setting}">
            </div>

            <div class="col-md-2 text-end">
                <button class="btn btn-sm btn-outline-danger" onclick="eliminarSetting(${s.id_setting})">
                    <i class="ti ti-trash"></i>
                </button>
            </div>

        </div>
    `).join('');
}

// ============================
// GUARDAR (BULK UPDATE)
// ============================
async function guardarSettings() {

    const inputs = document.querySelectorAll('[data-key]');
    const fd = new FormData();

    fd.append('action', 'actualizar');

    inputs.forEach(i => {
        fd.append(i.dataset.key, i.value);
    });

    if (typeof showPreloader === 'function') showPreloader();

    try {
        const res = await fetch('ajax/settings.ajax.php', {
            method: 'POST',
            body: fd
        });

        const data = await res.json();

        if (data.success) {
            alertify.success("Configuración actualizada");
            cargarSettings();
        } else {
            alertify.error(data.message);
        }

    } catch (e) {
        alertify.error("Error al guardar");
    } finally {
        if (typeof hidePreloader === 'function') hidePreloader();
    }
}

// ============================
// CREAR
// ============================
async function crearSetting() {

    const key = document.getElementById('newKey').value.trim();
    const value = document.getElementById('newValue').value.trim();

    if (!key || !value) {
        alertify.error("Completa ambos campos");
        return;
    }

    const fd = new FormData();
    fd.append('action', 'crear');
    fd.append('key_setting', key);
    fd.append('value_setting', value);

    const res = await fetch('ajax/settings.ajax.php', {
        method: 'POST',
        body: fd
    });

    const data = await res.json();

    if (data.success) {
        alertify.success("Setting creado");
        document.getElementById('newKey').value = '';
        document.getElementById('newValue').value = '';
        cargarSettings();
    } else {
        alertify.error(data.message);
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

    const res = await fetch('ajax/settings.ajax.php', {
        method: 'POST',
        body: fd
    });

    const data = await res.json();

    if (data.success) {
        alertify.success("Eliminado");
        cargarSettings();
    } else {
        alertify.error("Error al eliminar");
    }
}
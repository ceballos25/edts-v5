// ============================
// STATE GLOBAL
// ============================
let SETTINGS = {};
let SETTINGS_LOADED = false;
let SETTINGS_PROMISE = null;

// ============================
// INIT GLOBAL
// ============================
document.addEventListener('DOMContentLoaded', async () => {

    // 🔥 Cargar settings UNA sola vez
    await cargarSettingsGlobal();

    // 🔥 Solo renderizar si existe la vista settings
    if (document.getElementById('settingsContainer')) {
        renderSettingsFromGlobal();
    }

});

// ============================
// HELPERS
// ============================
function escapeHtml(text) {
    return String(text ?? '')
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

function getSetting(key, defaultValue = null) {
    return SETTINGS[key] ?? defaultValue;
}

// ============================
// FETCH BASE
// ============================
async function fetchSettings(action, extra = {}) {

    const fd = new FormData();
    fd.append('action', action);

    Object.entries(extra).forEach(([k, v]) => fd.append(k, v));

    const res = await fetch('/front/ajax/settings.ajax.php', {
        method: 'POST',
        body: fd
    });

    return res.json();
}

// ============================
// CARGAR GLOBAL (SINGLE SOURCE)
// ============================
async function cargarSettingsGlobal() {

    if (SETTINGS_LOADED) return SETTINGS;

    if (SETTINGS_PROMISE) return SETTINGS_PROMISE;

    SETTINGS_PROMISE = (async () => {

        try {

            const data = await fetchSettings('obtener');

            if (!data.success) throw new Error("Error obteniendo settings");

            SETTINGS = {};

            data.data.forEach(s => {
                SETTINGS[s.key_setting] = s.value_setting;
            });

            SETTINGS_LOADED = true;

            return SETTINGS;

        } catch (e) {
            console.error("Error cargando settings:", e);
            return {};
        }

    })();

    return SETTINGS_PROMISE;
}

// ============================
// READY (SIN setInterval)
// ============================
function onSettingsReady(callback) {
    cargarSettingsGlobal().then(callback);
}

// ============================
// RENDER SETTINGS (ADMIN UI)
// ============================
function renderSettingsFromGlobal() {

    const container = document.getElementById('settingsContainer');
    if (!container) return;

    const settings = Object.entries(SETTINGS).map(([key, value], i) => ({
        id_setting: i,
        key_setting: key,
        value_setting: value
    }));

    if (!settings.length) {
        container.innerHTML = `<div class="text-center py-5 text-muted">Sin configuración</div>`;
        return;
    }

    container.innerHTML = settings.map(s => `

        <div class="row mb-3 align-items-center border-bottom pb-2">
            
            <div class="col-md-3">
                <label class="fw-bold">${escapeHtml(s.key_setting)}</label>
            </div>

            <div class="col-md-5">
                <input type="text" 
                    class="form-control" 
                    data-key="${s.key_setting}" 
                    value="${escapeHtml(s.value_setting)}">
            </div>

            <div class="col-md-4 text-end">

                <button class="btn btn-sm btn-success me-1"
                    onclick="guardarIndividualDesdeUI('${s.key_setting}', this)">
                    <i class="ti ti-check"></i>
                </button>

            </div>

        </div>

    `).join('');
}

// ============================
// ACTUALIZAR (GLOBAL)
// ============================
async function actualizarSettings(payload) {

    const data = await fetchSettings('actualizar', payload);

    if (!data.success) {
        throw new Error(data.message);
    }

    await cargarSettingsGlobal(); // 🔥 refresh global

    return true;
}

// ============================
// GUARDAR INDIVIDUAL (UI)
// ============================
async function guardarIndividualDesdeUI(key, btn) {

    const input = btn.closest('.row').querySelector('[data-key]');
    const value = input.value.trim();

    try {

        await actualizarSettings({ [key]: value });

        alertify.success("Actualizado");

    } catch (e) {
        alertify.error(e.message || "Error");
    }
}

// ============================
// GUARDAR MASIVO (UI)
// ============================
async function guardarSettings() {

    const inputs = document.querySelectorAll('[data-key]');
    const payload = {};

    inputs.forEach(i => {
        payload[i.dataset.key] = i.value.trim();
    });

    try {

        await actualizarSettings(payload);

        alertify.success("Configuración actualizada");

    } catch (e) {
        alertify.error(e.message || "Error");
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

    key = key.toLowerCase().replace(/\s+/g, '_');

    try {

        const data = await fetchSettings('crear', {
            key_setting: key,
            value_setting: value
        });

        if (!data.success) throw new Error(data.message);

        alertify.success("Setting creado");

        document.getElementById('newKey').value = '';
        document.getElementById('newValue').value = '';

        await cargarSettingsGlobal();
        renderSettingsFromGlobal();

    } catch (e) {
        alertify.error(e.message || "Error");
    }
}

// ============================
// ELIMINAR
// ============================
async function eliminarSetting(id) {

    if (!confirm("¿Eliminar este setting?")) return;

    try {

        const data = await fetchSettings('eliminar', { id_setting: id });

        if (!data.success) throw new Error(data.message);

        alertify.success("Eliminado");

        await cargarSettingsGlobal();
        renderSettingsFromGlobal();

    } catch (e) {
        alertify.error(e.message || "Error al eliminar");
    }
}

// ============================
// EXPORT GLOBAL
// ============================
window.getSetting = getSetting;
window.onSettingsReady = onSettingsReady;
window.cargarSettingsGlobal = cargarSettingsGlobal;

onSettingsReady(() => {

    // INSTAGRAM
    aplicarRedSocial(
        '.social-instagram',
        getSetting('social_instagram_url')
    );

    // FACEBOOK
    aplicarRedSocial(
        '.social-facebook',
        getSetting('social_facebook_url')
    );

    // WHATSAPP
    const whatsappUrl = getSetting('whatsapp_chat_url');
    const whatsappNum = getSetting('whatsapp');

    let finalWhatsappUrl = whatsappUrl || 
        (whatsappNum ? `https://wa.me/${whatsappNum}?text=Hola` : null);

    aplicarRedSocial('.social-whatsapp', finalWhatsappUrl);

});

function obtenerPorcentajeFinal(porcentajeBackend) {

    const raw = getSetting('barra');


    if (raw === null || raw === undefined) {
        return porcentajeBackend;
    }

    const barraSetting = Number(raw);

    if (barraSetting === 0) {
        return porcentajeBackend;
    }

    return barraSetting;
}

function actualizarBarraProgreso(porcentajeBackend) {
    const porcentaje = obtenerPorcentajeFinal(porcentajeBackend);

    const porcentajeFinal = Math.min(Math.max(porcentaje, 0), 100);

    const barra = document.getElementById('barraProgreso');
    const texto = document.getElementById('porcentajeTexto');

    if (!barra || !texto) return;

    barra.style.width = porcentajeFinal + '%';
    texto.innerText = porcentajeFinal + '%';
}

let porcentajeBackendGlobal = 0;

// Cuando cargas la rifa (ej: desde API)
function cargarDatosRifa(data) {
    porcentajeBackendGlobal = Number(data?.porcentaje) || 0;

    // Esperar settings antes de pintar
    onSettingsReady(() => {
        actualizarBarraProgreso(porcentajeBackendGlobal);
    });
}

onSettingsReady(() => {

});

async function initBarraProgreso() {

    await cargarSettingsGlobal();

    // ⚠️ TEMPORAL (hasta que hagamos el endpoint)
    const porcentajeBackend = 25;

    actualizarBarraProgreso(porcentajeBackend);
}
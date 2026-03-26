/**
 * ventas.js - Gestión Blindada y Completa
 */
let ventasCache = [], paginaActual = 1;
const registrosPorPagina = 10;

document.addEventListener('DOMContentLoaded', function() {
    // 1. Cargar Rifas
    cargarRifasSelect();
    
    // 2. Cargar Ventas Iniciales
    cargarVentas();

    document.getElementById('filterMetodoPago').addEventListener('change', () => {
        paginaActual = 1;
        cargarVentas();
    });
    
    // 3. Listener: Buscador con debounce
    const inputSearch = document.getElementById('searchVentas');
    if (inputSearch) {
        inputSearch.addEventListener('input', debounce(() => {
            paginaActual = 1;
            cargarVentas();
        }, 600));
    }

    // 4. Listener: Select Periodo (Limpia fechas manuales)
    const selPeriodo = document.getElementById('filterPeriodo');
    if (selPeriodo) {
        selPeriodo.addEventListener('change', function() {
            if (this.value !== "") {
                document.getElementById('fecha_inicio').value = '';
                document.getElementById('fecha_fin').value = '';
            }
            paginaActual = 1;
            cargarVentas();
        });
    }

    // 5. Listener: Fechas Manuales (Limpia periodo)
    ['fecha_inicio', 'fecha_fin'].forEach(id => {
        const el = document.getElementById(id);
        if(el) {
            el.addEventListener('change', function() {
                if (this.value !== "") {
                    document.getElementById('filterPeriodo').value = '';
                }
                // Si ambas fechas están llenas, recarga
                if(document.getElementById('fecha_inicio').value && document.getElementById('fecha_fin').value){
                    paginaActual = 1;
                    cargarVentas();
                }
            });
        }
    });

    // 6. Listener: Select Rifa
    const selRifa = document.getElementById('filterRifa');
    if (selRifa) {
        selRifa.addEventListener('change', function() {
            paginaActual = 1;
            cargarVentas();
        });
    }
});

// Obtener Rifas para el Select
async function cargarRifasSelect() {
    try {
        const fd = new FormData();
        fd.append('action', 'obtener_rifas');
        const res = await fetch('ajax/ventas.ajax.php', { method: 'POST', body: fd });
        const data = await res.json();
        if (data.success && data.data) {
            const select = document.getElementById('filterRifa');
            select.innerHTML = '<option value="">Todas las rifas</option>';
            const lista = Array.isArray(data.data) ? data.data : [data.data];
            lista.forEach(r => {
                select.innerHTML += `<option value="${r.id_raffle}">${r.title_raffle}</option>`;
            });
        }
    } catch (e) { console.error("Error rifas", e); }
}

// Cargar Ventas (Main)
async function cargarVentas() {
    if (typeof showPreloader === 'function') showPreloader();
    try {
        const fd = new FormData();
        fd.append('action', 'obtener');
        fd.append('search', document.getElementById('searchVentas').value);
        fd.append('periodo', document.getElementById('filterPeriodo').value);
        fd.append('id_raffle', document.getElementById('filterRifa').value);
        fd.append('fecha_inicio', document.getElementById('fecha_inicio').value);
        fd.append('fecha_fin', document.getElementById('fecha_fin').value);
        fd.append('payment_method', document.getElementById('filterMetodoPago').value);

        const res = await fetch('ajax/ventas.ajax.php', { method: 'POST', body: fd });
        const data = await res.json();

        if (data.success) {
            ventasCache = Array.isArray(data.data) ? data.data : (data.data ? [data.data] : []);
        } else {
            ventasCache = [];
        }
        renderizarTodo();
    } catch (e) { console.error(e); }
    finally { if (typeof hidePreloader === 'function') hidePreloader(); }
}

function renderizarTodo() {
    if (typeof PaginationHelper !== 'undefined') {
        const segmento = PaginationHelper.getSegment(ventasCache, paginaActual, registrosPorPagina);
        renderTabla(segmento);
        PaginationHelper.render({
            totalItems: ventasCache.length, currentPage: paginaActual, limit: registrosPorPagina,
            containerId: 'contenedorPaginacion', infoId: 'infoPaginacion', callbackName: 'cambiarPagina'
        });
    } else {
        renderTabla(ventasCache);
    }
}

function cambiarPagina(p) { paginaActual = p; renderizarTodo(); }

function renderTabla(ventas) {
    const tbody = document.getElementById('bodyTabla');
    if (!tbody) return;

    if (!ventas || ventas.length === 0) {
        tbody.innerHTML = `<tr><td colspan="8" class="text-center py-5 text-muted">No se encontraron registros</td></tr>`;
        return;
    }

    tbody.innerHTML = ventas.map(v => {
        const f = new Date(v.date_created_sale);
        const fecha = f.toLocaleDateString('es-CO');
        const hora = f.toLocaleTimeString('es-CO', { hour: '2-digit', minute: '2-digit', hour12: true });
        
        // Inicial para Avatar
        const inicial = v.name_customer ? v.name_customer.charAt(0).toUpperCase() : 'C';

        // Lógica de colores para el Badge de Método de Pago
        // Efectivo = Verde suave | Transferencia/Otro = Azul suave
        const badgeClass = v.payment_method_sale === 'Efectivo' 
            ? 'bg-success-subtle text-success border-success-subtle' 
            : 'bg-primary-subtle text-primary border-primary-subtle';

        return `
        <tr class="align-middle border-bottom hover-shadow">
            <td class="d-none">${v.id_sale}</td>

            <td class="py-3 ps-3">
                <div class="d-flex">
                    <div class="rounded-circle bg-light border d-flex justify-content-center align-items-center text-secondary fw-bold me-3 flex-shrink-0" 
                         style="width: 42px; height: 42px; font-size: 1.1rem;">
                        ${inicial}
                    </div>
                    <div class="d-flex flex-column" style="line-height: 1.3;">
                        <span class="fw-bold text-dark text-capitalize">
                            ${v.name_customer} ${v.lastname_customer}
                        </span>
                        <div class="text-muted small mt-1">
                            <span class="me-2"><i class="ti ti-phone text-secondary"></i> ${v.phone_customer || '--'}</span>
                            <span><i class="ti ti-map-pin text-secondary"></i> ${v.city_customer || 'N/A'}</span>
                        </div>
                        <small class="text-muted fst-italic" style="font-size: 0.75rem;">
                            ${v.email_customer || ''}
                        </small>
                    </div>
                </div>
            </td>

            <td class="py-3">
                <span class="font-monospace bg-light text-secondary px-2 py-1 rounded border" style="font-size: 0.85rem;">
                    ${v.code_sale}
                </span>
            </td>

            <td class="py-3">
                <span class="fw-medium text-dark d-block">
                    ${v.quantity_sale} Núms
                </span>
                <small class="text-muted text-truncate d-block">
                    ${v.title_raffle}
                </small>
            </td>

            <td class="py-3">
                <span class="fw-bold text-dark">
                    $${Number(v.total_sale).toLocaleString('es-CO')}
                </span>
            </td>

            <td class="py-3">
                <span class="badge ${badgeClass} border px-3 py-2 rounded-pill">
                    ${v.payment_method_sale}
                </span>
            </td>

            <td class="py-3">
                <div class="d-flex flex-column text-muted">
                    <span class="text-dark fw-medium">${fecha}</span>
                    <span style="font-size: 0.85rem;">${hora}</span>
                </div>
            </td>

            <td class="py-3 text-end pe-3">
                <button class="btn btn-icon btn-sm btn-outline-primary border-0 rounded-circle shadow-sm" 
                        onclick="verRecibo(${v.id_sale})" 
                        title="Ver Detalle"
                        style="width: 32px; height: 32px;">
                    <i class="ti ti-eye fs-7"></i>
                </button>
            </td>
        </tr>`;
    }).join('');
}

function limpiarFiltrosVentas() {
    document.getElementById('searchVentas').value = '';
    document.getElementById('filterPeriodo').value = '';
    document.getElementById('filterRifa').value = '';
    document.getElementById('fecha_inicio').value = '';
    document.getElementById('fecha_fin').value = '';
    paginaActual = 1;
    cargarVentas();
}

function debounce(f, w) { let t; return (...a) => { clearTimeout(t); t = setTimeout(() => f(...a), w); }; }

function verRecibo(id) {
    const fd = new FormData();
    fd.append('action', 'detalle_venta');
    fd.append('id_sale', id);
    fetch('ajax/ventas.ajax.php', { method: 'POST', body: fd })
        .then(r => r.json())
        .then(res => {
            if (res.success) {
                document.getElementById('cuerpoRecibo').innerHTML = res.html_recibo;
                new bootstrap.Modal(document.getElementById('modalRecibo')).show();
            } else {
                alert('No se pudo cargar el recibo');
            }
        });
}
/**
 * frontend-v3.js – SISTEMA POR PAQUETES
 * Caballos Revelo
 */

/* ================== ESTADO GLOBAL ================== */

const estado = {
    rifa: { id: null, precio: 0 },
    inventarioCompleto: [],
    cantidadSeleccionada: 0,
    rutas: {
        numeros: 'front/ajax/numeros.ajax.php',
        ventas: 'front/ajax/ventas.ajax.php',
        clientes: 'front/ajax/clientes.ajax.php'
    }
};


/* ================== INIT ================== */

$(document).ready(function () {

    inicializarSistema();

    $('#celularCliente').on('input paste', function () {

        let val = $(this).val().replace(/\D/g, '');

        if (val.startsWith('57') && val.length > 10)
            val = val.substring(2);

        $(this).val(val);

        if (val.length === 10)
            buscarClientePorCelular(val);

    });

    if (typeof datosColombia !== 'undefined') {

        cargarDepartamentos();

        $('#departamento').on('change', function () {
            cargarCiudades(this.value);
        });

    }

});


/* ================== SISTEMA ================== */

async function inicializarSistema() {

    const fd = new FormData();
    fd.append('action', 'obtener_rifas');

    const res = await fetch(estado.rutas.numeros, {
        method: 'POST',
        body: fd
    });

    const json = await res.json();

    if (json.success && json.data.length) {

        const r = json.data[0];

        estado.rifa.id = r.id_raffle;
        estado.rifa.precio = parseInt(r.price_raffle, 10);

        actualizarPrecioVisual(0);

        cargarInventario();

    }

}


/* ================== INVENTARIO ================== */

async function cargarInventario() {

    showPreloader();

    const fd = new FormData();
    fd.append('action', 'obtener_inventario');
    fd.append('id_raffle', estado.rifa.id);

    const res = await fetch(estado.rutas.numeros, {
        method: 'POST',
        body: fd
    });

    const json = await res.json();

    if (json.success) {

        estado.inventarioCompleto = json.data.filter(t => t.status_ticket == 0);

    }

    hidePreloader();

}


/* ================== PAQUETES ================== */

$(document).on('change', '.paquete-radio', function () {

    if (this.value === 'custom') {
        $('#cantidadManual').show().focus();
        return;
    }

    $('#cantidadManual').hide();

    estado.cantidadSeleccionada = parseInt(this.value);

    actualizarUI();

});

$('#cantidadManual').on('blur', function () {

    let cant = parseInt(this.value);

    if (!cant) return;

    if (cant < 3) {

        toastError("Recuerda mínimo 3 para participar");

        this.value = 3;
        cant = 3;
    }

    estado.cantidadSeleccionada = cant;

    actualizarUI();

});


/* ================== PRECIOS ================== */

function obtenerPrecioUnitario(cantidad) {

    return cantidad >= 3
        ? 500
        : estado.rifa.precio;

}

function actualizarPrecioVisual(cantidad) {

    if (cantidad >= 3) {

        $('#precioBoletaDisplay').html(
            `$8.000 <small class="text-muted fs-6">c/u · PROMO 🔥</small>`
        );

    } else {

        $('#precioBoletaDisplay').text(
            '$' + estado.rifa.precio.toLocaleString('es-CO')
        );

    }

}


/* ================== UI ================== */

function actualizarUI() {

    const cant = estado.cantidadSeleccionada;

    const precioUnitario = obtenerPrecioUnitario(cant);

    const total = cant * precioUnitario;

    actualizarPrecioVisual(cant);

    const fmt = n =>
        new Intl.NumberFormat('es-CO', {
            style: 'currency',
            currency: 'COP',
            maximumFractionDigits: 0
        }).format(n);


    $('#cantTicketsDesktop, #lblCantidadMobile').text(cant);

    $('#totalDineroDesktop, #lblTotalMobile, #resumenTotal').text(fmt(total));


    $('#resumenNumeros').html(

        cant
            ? `<span class="fw-bold">${cant}</span>`
            : '<span class="text-muted">Sin selección</span>'

    );


    $('#btnPagarDesktop, #btnPagarMobile').prop('disabled', !cant);


    const bar = document.getElementById('mobileCart');

    if (bar)
        bar.style.display = cant ? '' : 'none';


    // if (cant >= 1)
    //     $('#promoCheckoutmMobile').removeClass('d-none');
    // else
    //     $('#promoCheckoutmMobile').addClass('d-none');

}


/* ================== UBICACIÓN ================== */

function cargarDepartamentos() {

    const $d = $('#departamento');

    $d.empty().append('<option value="">Seleccione...</option>');

    Object.keys(datosColombia)
        .sort()
        .forEach(d => $d.append(new Option(d, d)));

}

function cargarCiudades(dep) {

    const $c = $('#ciudad');

    $c.empty().append('<option value="">Seleccione...</option>');

    if (dep && datosColombia[dep]) {

        datosColombia[dep].forEach(c =>
            $c.append(new Option(c.display || c, c.value || c))
        );

    }

}


/* ================== CLIENTE ================== */

async function buscarClientePorCelular(tel) {

    const fd = new FormData();

    fd.append('action', 'obtener');
    fd.append('search', tel);

    const r = await fetch(estado.rutas.clientes, {
        method: 'POST',
        body: fd
    });

    const j = await r.json();

    if (j.success && j.data.length) {

        const c = j.data[0];

        $('#nombreCliente').val(c.name_customer);
        $('#apellidoCliente').val(c.lastname_customer);
        $('#emailCliente').val(c.email_customer);

        $('#departamento')
            .val(c.department_customer)
            .trigger('change');

        setTimeout(() => {
            $('#ciudad').val(c.city_customer);
        }, 200);

    }

}


/* ================== UTILIDADES ================== */

function toastError(msg) {

    Toastify({
        text: msg,
        backgroundColor: '#dc3545',
        duration: 2500
    }).showToast();

}

function esEmailValido(email) {

    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

}

function setLoadingBtn(btnId, loading = true) {

    const btn = document.getElementById(btnId);

    if (!btn) return;

    btn.disabled = loading;

    btn.querySelector('.spinner-border')
        ?.classList.toggle('d-none', !loading);

}


/* ================== CHECKOUT ================== */

function abrirCheckout() {

if (!estado.cantidadSeleccionada || estado.cantidadSeleccionada < 3) {

    toastError('La compra mínima es de 3 números');

    return;

}

    if (estado.cantidadSeleccionada > estado.inventarioCompleto.length) {

        toastError('No hay suficientes números disponibles');

        return;

    }

    const total =
        estado.cantidadSeleccionada *
        obtenerPrecioUnitario(estado.cantidadSeleccionada);

    $('#totalPagarInput').val(total);

    const modal = new bootstrap.Modal(
        document.getElementById('modalCheckout')
    );

    modal.show();

}


/* ================== PAGO ================== */

async function iniciarPagoPSE() {

    const datos = validarFormularioCheckout();

    if (!datos) return;


    if (estado.cantidadSeleccionada > estado.inventarioCompleto.length) {

        toastError('No hay suficientes números disponibles');

        return;

    }


    setLoadingBtn('btnPagarFinal', true);

    showPreloader();


    const payload = {

        action: 'crear_respaldo',

        id_raffle: estado.rifa.id,

        quantity: estado.cantidadSeleccionada,

        amount:
            estado.cantidadSeleccionada *
            obtenerPrecioUnitario(estado.cantidadSeleccionada),

        name_customer: datos.nombre,
        lastname_customer: datos.apellido,
        phone_customer: datos.celular,
        email_customer: datos.email,
        department_customer: datos.departamento,
        city_customer: datos.ciudad

    };


    try {

        const res = await fetch('front/ajax/web.ajax.php', {
            method: 'POST',
            body: new URLSearchParams(payload)
        });

        const json = await res.json();

        if (!json.success)
            throw new Error(json.message || 'No se pudo crear el respaldo');


        window.PAYMENT_BACKUP_ID = json.id_payment_backup;

        await irAOpenPay();

    }

    catch (e) {

        toastError(e.message);

        setLoadingBtn('btnPagarFinal', false);

        hidePreloader();

    }

}


/* ================== OPENPAY ================== */

async function irAOpenPay() {

    if (!window.PAYMENT_BACKUP_ID) {

        toastError("No hay respaldo de pago");

        return;

    }

    const data = {

        action: 'ir_openpay',

        id_payment_backup: window.PAYMENT_BACKUP_ID,

        name_customer: $('#nombreCliente').val(),
        lastname_customer: $('#apellidoCliente').val(),
        phone_customer: $('#celularCliente').val(),
        email_customer: $('#emailCliente').val()

    };


    try {

        const res = await fetch('front/ajax/web.ajax.php', {
            method: 'POST',
            body: new URLSearchParams(data)
        });

        const json = await res.json();

        if (!json.success)
            throw new Error(json.message || 'Error al ir a OpenPay');


        window.location.href = json.redirect_url;

    }

    catch (e) {

        toastError(e.message);

        setLoadingBtn('btnPagarFinal', false);

        hidePreloader();

    }

}


/* ================== VALIDACIÓN ================== */

function validarFormularioCheckout() {

if (!estado.cantidadSeleccionada || estado.cantidadSeleccionada < 3) {

    toastError("La compra mínima es de 3 números");

    return false;

}

    const datos = {

        nombre: $('#nombreCliente').val().trim(),
        apellido: $('#apellidoCliente').val().trim(),
        celular: $('#celularCliente').val().replace(/\D/g, ''),
        email: $('#emailCliente').val().trim(),
        departamento: $('#departamento').val(),
        ciudad: $('#ciudad').val()

    };


    if (datos.celular.length !== 10)
        return toastError("Celular inválido"), false;

    if (!datos.nombre)
        return toastError("Ingresa tu nombre"), false;

    if (!datos.apellido)
        return toastError("Ingresa tu apellido"), false;

    if (!esEmailValido(datos.email))
        return toastError("Correo inválido"), false;

    if (!datos.departamento)
        return toastError("Selecciona departamento"), false;

    if (!datos.ciudad)
        return toastError("Selecciona ciudad"), false;


    return datos;

}
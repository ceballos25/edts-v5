<?php
require_once "config/config.php";
$porcentaje_venta = 80.2;
?>
<!doctype html>
<html lang="es">

<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Caballos Revelo</title>
    <meta name="description" content="¡Nueva dinámica para arrancar el año con toda!">
    <link rel="shortcut icon" href="assets/images/logos/logo.ico" type="image/x-icon">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="assets/css/styles-v20.css">
    <script src="https://t.contentsquare.net/uxa/8c88e0bc219df.js"></script>



    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '515720491212872');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1"
            src="https://www.facebook.com/tr?id=515720491212872&ev=PageView
    &noscript=1" />
    </noscript>
    <!-- End Facebook Pixel Code -->
</head>

<body>

    <!-- PROMO -->
    <div class="promo-bar text-center py-2">
        <div class="container fw-bold">
            🚨 ¡ATENCIÓN! Todos los números a <strong>$8.000</strong> 🚨
        </div>
    </div>

    <!-- NAV -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top shadow-sm">
        <div class="container justify-content-center justify-content-lg-between">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <img src="assets/images/logos/logo.jpg" height="70">
                <div>
                    <span class="fw-bold text-dark lh-1">CABALLOS</span><br>
                    <span class="fw-bold text-warning small">REVELO</span>
                </div>
            </a>
            <div id="promoCheckoutmMobile"
             class="alert alert-success py-2 mt-2 text-center fw-bold d-none">
                
            </div>
            <span class="badge bg-dark text-warning px-3 py-2 d-none d-lg-inline">
                <i class="ti ti-calendar-event me-1"></i> ⚠️ Juega este 17 DE ABRIL POR LA DE MEDELLIN
            </span>
        </div>
    </nav>

    <!-- HERO -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">

                <div class="col-lg-6">
                    <span class="badge bg-dark text-warning mb-3 activo">🔥 Sorteo activo – cupos limitados</span>

                    <h1 class="hero-title mb-3">
                        ¡Gana una <br><span>Hermosa Yegua</span>! 🐎
                    </h1>

                    <p class="text-muted fw-semibold mb-4 d-none">
                    </p>

                    <div class="card border-0 bg-transparent shadow-none rounded-4 overflow-hidden" style="text-align: center;">
                        <section id="main-carousel" class="splide">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide"><img class="premios-primer-sorteo" src="assets/images/profile/4.jpg" loading="lazy"></li>
                                    <li class="splide__slide"><img class="premios-primer-sorteo" src="assets/images/profile/1.jpeg" loading="lazy"></li>
                                    <li class="splide__slide"><img class="premios-primer-sorteo" src="assets/images/profile/premio-primer-sorteo-uno.jpg" loading="lazy"></li>
                                    <li class="splide__slide"><img class="premios-primer-sorteo" src="assets/images/profile/premio-primer-sorteo-doss.jpg" loading="lazy"></li>
                                    <li class="splide__slide"><img class="premios-primer-sorteo" src="assets/images/profile/premio-primer-sorteo-tres.jpg" loading="lazy"></li>
                                    <li class="splide__slide"><img class="premios-primer-sorteo" src="assets/images/profile/premio-primer-sorteo-cuatroo.jpg" loading="lazy"></li>

                                </ul>
                            </div>
                        </section>
                    </div>
                    <section class="mt-3 d-flex justify-content-center">
                        <a href="#compra" class="btn btn-warning btn-lg fw-bold shadow px-5 py-3 mb-4 boton-principal-comprar ">
                        🎟️ Comprar
                    </a>
                    </section>
                </div>

                <div class="col-lg-6">

                    <div class="row g-3 mb-4">

                        <!-- PREMIO MAYOR -->
                        <div class="col-12">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body d-flex align-items-start gap-3">

                                    <div class="bg-warning bg-opacity-25 rounded-circle p-3">
                                        <i class="ti ti-trophy fs-4 text-warning"></i>
                                    </div>

                                    <div>
                                        <h5 class="fw-bold mb-1">Premio Mayor</h5>
                                        <p class="fs-6 text-muted fw-bold  mb-0">
                                            Hermosa Yegua totalmente aperada y con transporte. 
                                            Por la 🎫 de Medellín
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <!-- NUMERO INVERTIDO -->
                        <div class="col-6 d-flex">
                            <div class="card border-0 shadow-sm text-center w-100">
                                <div class="card-body">

                                    <h3 class="fw-bold text-success mb-1">
                                        $2.000.000
                                    </h3>

                                    <small class="fw-bold text-muted">
                                        Número invertido
                                    </small>

                                </div>
                            </div>
                        </div>


                        <!-- ANTICIPADOS -->
                        <div class="col-6 d-flex">
                            <div class="card border-0 shadow-sm text-center w-100">
                                <div class="card-body">

                                    <h3 class="fw-bold text-success mb-2">
                                        $500.000
                                    </h3>

                                    <small class="fw-bold text-muted">
                                        Anticipados de 500 mil desde el viernes 13 de marzo 
                                        hasta el 10 de abril por la de Medellín
                                    </small>

                                </div>
                            </div>
                        </div>

                    </div>


                    <!-- PROGRESO -->
                    <div class="card border-0 shadow-sm text-center mb-4">
                        <div class="card-body">

                            <div class="d-flex justify-content-between fw-bold">
                                <span>🔥 Números vendidos</span>
                                <span><?= $porcentaje_venta ?>%</span>
                            </div>

                            <div class="progress my-2">
                                <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                                    style="width:<?= $porcentaje_venta ?>%">
                                </div>
                            </div>

                            <small class="text-muted">
                                ⚠️ Al llegar al 100% se cierra automáticamente la venta 💨🏃‍➡️
                            </small>

                        </div>
                    </div>


                    <!-- PRECIO BOLETA -->
                    <div class="card bg-dark text-center mb-3">
                        <div class="card-body">

                            <h2 class="fw-bold text-warning display-6 mb-2" id="precioBoletaDisplay">
                                <div class="spinner-border spinner-border-sm"></div>
                            </h2>

                            <span class="badge bg-warning text-dark px-3">
                                POR BOLETA
                            </span>
                
                            <!-- FECHA -->

                    <h5 class="fw-bold text-center text-white mt-2">
                        <i class="ti ti-calendar-event me-1"></i> Juega este 17 de abril por la de Medellín
                    </h5>

                        </div>
                    </div>


                </div>

            </div>
        </div>
    </section>

    <!-- COMPRA -->
    <section id="compra" class="py-2 bg-white border-top">
        <div class="container">
            <h2 class="text-center fw-bold mb-3 mt-3">🎟️ Paquetes</h2>

            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">

                        <div class="card-header bg-white py-3 px-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <p class="fw-bold mb-0 text-dark">
                                    <i class="ti ti-grid-dots me-2 text-warning"></i>Selecciona la cantidad                                      
                                </p>
                          
                            </div>
                                <p>
                                    <small class="text-muted py-3 px-3">🚧 Mínimo 3 para participar</small>     
                                </p>
                        </div>

                        <div class="card-body bg-light">

                            <div class="row g-4" id="paquetesNumeros">

                            <!-- 3 -->
                            <div class="col-6 col-md-4">
                            <input type="radio" class="btn-check paquete-radio" name="paqueteNumeros" id="paq3" value="3">
                            <label class="btn btn-outline-primary w-100 py-2 d-flex flex-column align-items-center justify-content-center paquete-card" for="paq3">
                            <div class="fw-semibold">3</div>
                            <div class="small">$24.000</div>
                            </label>
                            </div>


                            <!-- 4 -->
                            <div class="col-6 col-md-4">
                            <input type="radio" class="btn-check paquete-radio" name="paqueteNumeros" id="paq4" value="4">
                            <label class="btn btn-outline-primary w-100 py-2 d-flex flex-column align-items-center justify-content-center paquete-card" for="paq4">
                            <div class="fw-semibold">4</div>
                            <div class="small">$32.000</div>
                            </label>
                            </div>


                            <!-- 5 -->
                            <div class="col-6 col-md-4">
                            <input type="radio" class="btn-check paquete-radio" name="paqueteNumeros" id="paq5" value="5">
                            <label class="btn btn-outline-primary w-100 py-2 d-flex flex-column align-items-center justify-content-center paquete-card popular" for="paq5">

                            <span class="badge-paquete">🎯 Popular</span>

                            <div class="fw-semibold">5</div>
                            <div class="small">$40.000</div>

                            </label>
                            </div>


                            <!-- 7 -->
                            <div class="col-6 col-md-4">
                            <input type="radio" class="btn-check paquete-radio" name="paqueteNumeros" id="paq7" value="7">
                            <label class="btn btn-outline-primary w-100 py-2 d-flex flex-column align-items-center justify-content-center paquete-card recomendado" for="paq7">

                            <span class="badge-paquete">⭐ Recomendado</span>

                            <div class="fw-semibold">7</div>
                            <div class="small">$56.000</div>

                            </label>
                            </div>


                            <!-- 10 -->
                            <div class="col-6 col-md-4">
                            <input type="radio" class="btn-check paquete-radio" name="paqueteNumeros" id="paq10" value="10">
                            <label class="btn btn-outline-primary w-100 py-2 d-flex flex-column align-items-center justify-content-center paquete-card mas-vendido" for="paq10">

                            <span class="badge-paquete">🔥 Más vendido</span>

                            <div class="fw-semibold">10</div>
                            <div class="small">$80.000</div>

                            </label>
                            </div>


                            <!-- 20 -->
                            <div class="col-6 col-md-4">
                            <input type="radio" class="btn-check paquete-radio" name="paqueteNumeros" id="paq20" value="20">
                            <label class="btn btn-outline-primary w-100 py-2 d-flex flex-column align-items-center justify-content-center paquete-card mejor-valor" for="paq20">

                            <span class="badge-paquete">💰 Mejor valor</span>

                            <div class="fw-semibold">20</div>
                            <div class="small">$160.000</div>

                            </label>
                            </div>


                            <!-- 50 -->
                            <div class="col-6 col-md-4">
                            <input type="radio" class="btn-check paquete-radio" name="paqueteNumeros" id="paq50" value="50">
                            <label class="btn btn-outline-primary w-100 py-2 d-flex flex-column align-items-center justify-content-center paquete-card vip" for="paq50">

                            <span class="badge-paquete">👑 VIP</span>

                            <div class="fw-semibold">50</div>
                            <div class="small">$400.000</div>

                            </label>
                            </div>


                            <!-- CUSTOM -->
                            <div class="col-6 col-md-4">

                            <input type="radio"
                            class="btn-check paquete-radio"
                            name="paqueteNumeros"
                            id="paqCustom"
                            value="custom">

                            <label class="btn btn-outline-primary w-100 py-2 d-flex flex-column align-items-center justify-content-center paquete-card custom"
                            for="paqCustom">

                            <span class="badge-paquete">🎯 Personalizado</span>

                            <div class="fw-semibold">Otro</div>

                            </label>

                            <input
                            type="tel"
                            id="cantidadManual"
                            class="form-control form-control-sm text-center mt-1"
                            min="3"
                            placeholder="#"
                            style="display:none;"
                            >

                            </div>

                            </div>

                            <div class="alert alert-warning text-center small fw-bold mt-3">
                                🎯 Más números = más oportunidades de ganar
                            </div>

                        </div>
                    </div>
                </div>

                <!-- SIDEBAR DESKTOP -->
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="card border-0 shadow sticky-top" style="top:90px">
                        <div class="card-body">
                            <h4 class="fw-bold mb-3">Tu Compra</h4>

                            <div id="listaTicketsDesktop" class="mb-3"></div>

                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Cantidad</span>
                                    <strong id="cantTicketsDesktop">0</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between fw-bold">
                                    <span>Total</span>
                                    <strong class="text-success" id="totalDineroDesktop">$0</strong>
                                </li>
                            </ul>

                            <div class="alert alert-warning small text-center fw-bold">
                                🔥 Estás a un paso de participar
                            </div>

                            <button class="btn btn-dark w-100 py-3 fw-bold" onclick="abrirCheckout()"
                                id="btnPagarDesktop" disabled>
                                Pagar ahora →
                            </button>

                            <div class="mt-3 pt-3 border-top text-center">
                                <p class="small text-muted mb-2 d-flex align-items-center justify-content-center gap-1">
                                    <i class="ti ti-lock-square-rounded text-success fs-5"></i>
                                    Pagos 100% seguros y confirmación inmediata
                                </p>
                                <div class="d-flex justify-content-center align-items-center gap-3 grayscale-hover">
                                    <img src="assets/images/logos/pse.png" alt="PSE" style="height: 40px; width: auto;">
                                    <!--<img src="assets/images/logos/open.jpg" alt="OpenPay"-->
                                    <!--    style="height: 40px; width: auto;">-->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
      <section class="texto-ganadores">
        <div  >
            <div id="prizesCarousel" class="carousel slide" data-bs-ride="carousel">
                <h2 class="title-ganadores text-center title-premios">¡Últimos ganadores! 🥳</h2>
            </div>
        </div>
    </section>

    <section class="container-ganadores">
        <div id="exampleCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img src="assets/images/profile/ganador-diciembre.jpg" class="d-block w-100" alt="Ganador 1">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/profile/ganador-unos.jpeg" class="d-block w-100" alt="Ganador 1">
                </div>
                <div class="carousel-item active">
                    <img src="assets/images/profile/ultimo-ganador.png" class="d-block w-100" alt="Ganador 1">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/profile/ganador-uno.jpeg" class="d-block w-100" alt="Ganador 1">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/profile/ganador-3.png" class="d-block w-100" alt="Ganador 1">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/profile/ganador-dos.jpeg" class="d-block w-100" alt="Ganador 1">
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#exampleCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#exampleCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </section>

    <footer class="bg-dark text-light pt-5">
        <div class="container">

            <div class="row g-4 text-center text-md-start">

                <!-- Marca -->
                <div class="col-md-4">
                    <h5 class="fw-bold text-warning">Caballos Revelo</h5>
                    <p class="small text-secondary">
                        Plataforma oficial de participación equina.<br>
                        Transparencia, respaldo y seguridad en cada dinámica.
                    </p>

                    <!-- Redes (desktop) -->
                    <div class="d-none d-md-flex gap-2 mt-3">
                        <a href="https://www.instagram.com/caballosrevelo/" target="_blank" class="btn btn-outline-light btn-sm rounded-circle">
                            <i class="ti ti-brand-instagram"></i>
                        </a>
                        <a href="#" target="_blank" class="btn btn-outline-success btn-sm rounded-circle">
                            <i class="ti ti-brand-whatsapp"></i>
                        </a>
                        <a href="https://www.facebook.com/profile.php?id=61562081602448&locale=es_LA" target="_blank" class="btn btn-outline-primary btn-sm rounded-circle">
                            <i class="ti ti-brand-facebook"></i>
                        </a>
                    </div>
                </div>

                <!-- Enlaces -->
                <div class="col-md-4">
                    <h6 class="fw-bold text-uppercase mb-3">Enlaces de interés</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2">
                            <a href="#compra" class="text-secondary text-decoration-none">Comprar números</a>
                        </li>
                        <li class="mb-2">
                            <a href="assets/doc/ptd.pdf" class="text-secondary text-decoration-none">Política de privacidad</a>
                        </li>
                        <li class="mb-2">
                            <a href="https://wa.me/573193162268?text=Hola%20" class="text-secondary text-decoration-none">Soporte</a>
                        </li>
                    </ul>
                </div>

                <!-- Contacto -->
                <div class="col-md-4">
                    <h6 class="fw-bold text-uppercase mb-3">Contacto</h6>
                    <p class="small text-secondary mb-2">
                        <i class="ti ti-phone me-2"></i> (+57) 319 316 2268
                    </p>
                    <p class="small text-secondary mb-2">
                        <i class="ti ti-mail me-2"></i> contacto@caballosrevelo.com
                    </p>
                    <p class="small text-secondary">
                        <i class="ti ti-map-pin me-2"></i> Colombia
                    </p>

                    <p class="small text-secondary">
                        <i class="ti ti-map-pin me-2"></i> Pagos Procesados por:
                    </p>
                    <div class="mt-3">
                        <img src="assets/images/logos/pse.png" height="50" class="me-2">
                    </div>
                </div>

            </div>

            <hr class="border-secondary my-4">

            <!-- Redes en Mobile -->
            <div class="d-flex d-md-none justify-content-center gap-3 mb-3">
                <a href="https://www.instagram.com/caballosrevelo" class="btn btn-outline-light rounded-circle">
                    <i class="ti ti-brand-instagram"></i>
                </a>
                <a href="https://wa.me/57573193162268?text=Hola%20" class="btn btn-outline-success rounded-circle">
                    <i class="ti ti-brand-whatsapp"></i>
                </a>
                <a href="https://www.facebook.com/alvaro.gomez.329481/" class="btn btn-outline-primary rounded-circle">
                    <i class="ti ti-brand-facebook"></i>
                </a>
            </div>

            <!-- Copyright -->
            <div class="text-center small text-secondary pb-2">
                © <?= date('Y'); ?> Caballos Revelo · Todos los derechos reservados <br>
            Desarrollado con ❤️ por 
            <strong class="text-warning">
              <a 
                href="https://wa.me/573245894268?text=Hola%20vi%20la%20p%C3%A1gina%20de%20de%20Caballos%20Revelo%20y%20quiero%20obtener%20m%C3%A1s%20informaci%C3%B3n%20sobre%20el%20sistema%20de%20rifas"
                target="_blank"
                rel="noopener"
                class="text-warning"
              >
                Cristian Ceballos <i class="ti ti-brand-whatsapp"></i><i class="ti ti-link"></i>
              </a>
            </strong>
            </div>

        </div>
    </footer>


    <!-- MOBILE CART -->
    <div class="mobile-cart-bar d-lg-none" id="mobileCart" style="display:none!important">
        <div class="d-flex align-items-center gap-3">
            <div class="mobile-cart-info">
                <span class="mobile-cart-label">Total a Pagar</span>
                <div>
                    <span class="mobile-cart-price" id="lblTotalMobile">$0</span>                    
                </div>
                <div>
                    <span class="mobile-cart-count"><span id="lblCantidadMobile">0</span> Núms</span>
                </div>
            </div>
        </div>
        <button class="btn btn-warning rounded-pill px-4 fw-bold shadow" onclick="abrirCheckout()" id="btnPagarMobile">
            PAGAR 🔥
        </button>
    </div>


    <!-- SCRIPTS -->
    <script src="<?= ASSETS_URL ?>/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= ASSETS_URL ?>/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="assets/js/departamentos-ciudades.js"></script>
    <script src="assets/js/frontend.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        new Splide('#main-carousel', {
            type: 'fade',
            autoplay: true,
            interval: 3000,
            arrows: false,
            pagination: false
        }).mount();
    });
    </script>

    <div class="modal fade" id="modalCheckout" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

                <div class="modal-header bg-dark text-white border-bottom border-warning">
                    <h5 class="modal-title fw-bold">🚀 Finalizar Compra</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body p-4 bg-light">
                    <form id="formCheckout">
                        <input type="hidden" id="totalPagarInput" name="totalPagar">

                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-uppercase fw-bold text-muted">Tus Números</small><br>
                                    <span class="fw-bold text-dark" id="resumenNumeros">...</span>
                                </div>
                                <div class="text-end">
                                    <small class="text-uppercase fw-bold text-muted">Total</small><br>
                                    <span class="fw-bold text-success fs-5" id="resumenTotal">$0</span>
                                </div>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-3">Datos del Comprador</h6>

                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="celularCliente" required placeholder="Celular">
                            <label>Celular</label>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nombreCliente" required
                                        placeholder="Nombre">
                                    <label>Nombre</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="apellidoCliente" required
                                        placeholder="Apellido">
                                    <label>Apellido</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="emailCliente" required placeholder="Correo">
                            <label>Correo Electrónico</label>
                        </div>

                        <div class="row g-2 mb-4">
                            <div class="col-6">
                                <div class="select-floating-label-group">
                                    <select class="form-select select2-ubicacion" id="departamento" required>
                                        <option value="">Departamento...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="select-floating-label-group">
                                    <select class="form-select select2-ubicacion" id="ciudad" required>
                                        <option value="">Ciudad...</option>
                                    </select>
                            </div>
                        </div>

                        <button type="button"
                            id="btnPagarFinal"
                            class="btn btn-warning w-100 py-3 fw-bold text-uppercase shadow-sm"
                            onclick="iniciarPagoPSE()">
                        
                            <span class="btn-text">
                                Ir a Pagar Ahora <i class="ti ti-credit-card ms-1"></i>
                            </span>
                        
                            <span class="spinner-border spinner-border-sm ms-2 d-none"
                                  role="status"
                                  aria-hidden="true"></span>
                        </button>

                    </form>
                    <div class="mt-3 pt-3 border-top text-center">
                        <p class="small text-muted mb-2 d-flex align-items-center justify-content-center gap-1">
                            <i class="ti ti-lock-square-rounded text-success fs-5"></i>
                            Pagos 100% seguros y confirmación inmediata
                        </p>
                        <div class="d-flex justify-content-center align-items-center gap-3 grayscale-hover">
                            <img src="assets/images/logos/pse.png" alt="PSE" style="height: 40px; width: auto;">
                            <!--<img src="assets/images/logos/open.jpg" alt="OpenPay" style="height: 40px; width: auto;">-->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php
include "includes/preloader.php";
?>
    
</body>

</html>
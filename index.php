<?php
require_once "config/config.php";
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>El dia de TU SUERTE 🍀</title>
    <meta name="description"
        content="App Fenix, el poder de ganar comienza aquí. Accede a motos, carros, casas y mucho más. Participa fácil, rápido y seguro desde cualquier lugar de Colombia.">
    <link rel="shortcut icon" href="assets/images/logos/logo.ico" type="image/x-icon">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="assets/css/styles-v20.css">

    <script src="https://t.contentsquare.net/uxa/8c88e0bc219df.js"></script>

    <!-- Facebook Pixel Code -->
    <!-- <script>
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
            src="https://www.facebook.com/tr?id=515720491212872&ev=PageView&noscript=1" />
    </noscript> -->
    <!-- End Facebook Pixel Code -->
</head>

<body>

    <!-- ===================== PROMO BAR ===================== -->
    <div class="promo-bar">
        <div class="promo-track">
            <span class="aprovecha">🍀 📢 Aprovecha nuestros anticipados de <strong class="valor-anticipado"> $500.000 💵</strong> </span>
        </div>
    </div>

    <!-- ===================== NAVBAR ===================== -->
    <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
        <div class="container justify-content-left justify-content-lg-between">
            <a class="navbar-brand d-flex align-items-center gap-2 logo-principal" href="#">
                <img src="assets/images/logos/logo.jpg">
                <div>
                    <span class="fw-bold text-light lh-1 text-center"></span><br>
                </div>
            </a>
            <div id="promoCheckoutmMobile" class="alert alert-success py-2 mt-2 text-center fw-bold d-none"></div>
            <span class="badge bg-dark text-light px-3 py-2 d-none d-lg-inline">
                <i class="ti ti-calendar-event me-1"></i> Evento el 01 de Mayo por la de de Medellín 🎫
            </span>
        </div>
    </nav>

    <!-- ===================== HERO ===================== -->
    <section class="py-3">
        <div class="container">
            <div class="row g-4">

                <!-- Columna izquierda: carrusel hero -->
                <div class="col-lg-6">

                    <h2 class="hero-title mb-3">
                        ¡Combo <span class="millonario">Familiar</span>!
                    </h2>

                    <p class="text-muted fw-semibold mb-4 d-none"></p>

                    <div class="card border-0 bg-transparent shadow-none rounded-4 overflow-hidden" style="text-align: center;">

                        <!-- Carrusel principal hero -->
                        <section id="main-carousel" class="splide">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide">
                                        <img class="premios-primer-sorteo" src="assets/images/profile/premio-mayor.png" alt="Premio Mayor" loading="lazy">
                                    </li>
                                    <li class="splide__slide premio-dos-combo">
                                        <img class="premios-primer-sorteo" src="assets/images/profile/combo-familiar.jpg" alt="Combo Familiar" loading="lazy">
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <!-- Miniaturas hero -->
                        <section id="thumbnail-carousel" class="splide mt-3" style="max-width: 200px; margin-left: auto; margin-right: auto;">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide">
                                        <img src="assets/images/profile/premio-mayor.png" alt="Miniatura Premio Mayor" loading="lazy">
                                    </li>
                                    <li class="splide__slide">
                                        <img src="assets/images/profile/combo-familiar.jpg" alt="Miniatura Combo" loading="lazy">
                                    </li>
                                </ul>
                            </div>
                        </section>

                    </div>
                </div>

                <!-- Columna derecha: info premios -->
                <div class="col-lg-6">

                    <div class="row g-3 mb-4">

                        <!-- Premio mayor -->
                        <div class="col-12">
                            <div class="">
                                <div class="card-body d-flex align-items-start gap-3 premio-mayor">
                                    <div class="bg-warning bg-opacity-25 rounded-circle p-3">
                                        <i class="ti ti-trophy fs-4 text-warning"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1 title-premio-mayor">Premio Mayor</h5>
                                        <p class="fs-6 text-muted fw-bold mb-0">
                                            NMAX V3 2027 PARA EL STICKER PRINCIPAL 💰💰
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Número invertido -->
                        <div class="col-md-12 d-flex">
                            <div class="card border-0 shadow-sm text-center w-100">
                                <div class="card-body">
                                    <h3 class="fw-bold mb-1">
                                        <span class="color-dinero-premio"> $5.000.000</span>
                                    </h3>
                                    <small class="fw-bold text-muted">Para el sticker invertido 💶</small>
                                </div>
                            </div>
                        </div>

                        <!-- Anticipados -->
                        <div class="col-md-12 d-flex">
                            <div class="card border-0 shadow-sm text-center w-100">
                                <div class="card-body">
                                    <h3 class="fw-bold mb-2">
                                        5 Anticipados de <span class="color-dinero-premio"> $500.000</span>
                                    </h3>
                                    <small class="fw-bold text-muted">Todos los días</small>
                                </div>
                            </div>
                        </div>

                        <!-- Stickers bendecidos -->
                        <div class="col-12 d-flex">
                            <div class="card border-0 shadow-sm text-center w-100">
                                <div class="card-body">
                                    <h3 class="fw-bold text-dark mb-4">
                                        5 Sticker Bendecidos de <span class="color-dinero-premio">$500.000</span>
                                    </h3>
                                    <div class="bendecidos-numeros">00405</div>
                                    <div class="bendecidos-numeros">89035</div>
                                    <div class="bendecidos-numeros">12053</div>
                                    <div class="bendecidos-numeros">11123</div>
                                    <div class="bendecidos-numeros">32941</div>
                                    <div class="display-flex m-1">
                                        <small class="fw-bold text-muted m-5 justify-content-center">¡Pago Inmediato!</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Barra de progreso -->
                    <div class="card border-0 shadow-sm text-center mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between fw-bold">
                                <span>🔥 Total Stickers vendidos</span>
                                <span id="porcentajeTexto">0%</span>
                            </div>
                            <div class="progress my-2">
                                <div id="barraProgreso" class="progress-bar progress-bar-striped progress-bar-animated" style="width: 0%"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Precio boleta (oculto) -->
                    <div class="card bg-dark text-center mb-3 d-none">
                        <div class="card-body">
                            <h2 class="fw-bold text-warning display-6 mb-2" id="precioBoletaDisplay">
                                <div class="spinner-border spinner-border-sm"></div>
                            </h2>
                            <small class="fw-bold text-center text-white mt-2">Mínimo 20 para participar</small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ===================== SECCIÓN PREMIOS ===================== -->
    <section class="section-premios py-4 border-top">
        <div class="container-premio-loteria">
            <div>
                <div class="title-sticker-premiados">
                    <h2 class="text-center fw-bold mb-3 mt-3">5 Sticker bendecidos en premios 🎁</h2>
                </div>

                <!-- Slider premios principal -->
                <div class="container container-premios-dos">

                    <div id="slider-premios" class="splide slider-premios">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <img src="assets/images/profile/tv-premio.png" alt="TV Premio">
                                </li>
                                <li class="splide__slide">
                                    <img src="assets/images/profile/play-five.png" alt="Play Five">
                                </li>
                                <li class="splide__slide">
                                    <img src="assets/images/profile/cel-moto-g.png" alt="Celular Moto G">
                                </li>
                                <li class="splide__slide">
                                    <img src="assets/images/profile/bicicleta-azul.png" alt="Bicicleta Azul">
                                </li>
                                <li class="splide__slide">
                                    <img src="assets/images/profile/bicicleta-negra.png" alt="Bicicleta Negra">
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Miniaturas premios -->
                    <div id="slider-thumbnails" class="splide slider-thumbnails">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <img src="assets/images/profile/tv-premio.png" alt="Miniatura TV">
                                </li>
                                <li class="splide__slide">
                                    <img src="assets/images/profile/play-five.png" alt="Miniatura Play Five">
                                </li>
                                <li class="splide__slide">
                                    <img src="assets/images/profile/cel-moto-g.png" alt="Miniatura Celular">
                                </li>
                                <li class="splide__slide">
                                    <img src="assets/images/profile/bicicleta-azul.png" alt="Miniatura Bici Azul">
                                </li>
                                <li class="splide__slide">
                                    <img src="assets/images/profile/bicicleta-negra.png" alt="Miniatura Bici Negra">
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

                <!-- Cronograma anticipados -->
                <div>
                    <div class="container-premiados-number">
                        <div class="container-section-dos mt-5 mb-5">
                            <div class="title-descrption">
                                <p class="title-info">
                                    📅 Todos los días, anticipados de <strong>$500.000</strong>
                                </p>
                            </div>
                            <div class="schedule">
                                <div class="row-days">
                                    <div class="day">CUNDINAMARCA</div>
                                    <div class="lottery">LUNES</div>
                                </div>
                                <div class="row-days">
                                    <div class="day">HUILA</div>
                                    <div class="lottery">MARTES</div>
                                </div>
                                <div class="row-days">
                                    <div class="day">VALLE</div>
                                    <div class="lottery">MIÉRCOLES</div>
                                </div>
                                <div class="row-days">
                                    <div class="day">BOGOTÁ</div>
                                    <div class="lottery">JUEVES</div>
                                </div>
                                <div class="row-days">
                                    <div class="day">MEDELLÍN</div>
                                    <div class="lottery">VIERNES</div>
                                </div>
                                <div class="row-days">
                                    <div class="day">BOYACA</div>
                                    <div class="lottery">SÁBADO</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ===================== SECCIÓN COMPRA ===================== -->
    <section id="compra" class="py-2 bg-white border-top">
        <div class="container">
            <h2 class="text-center fw-bold mb-3 mt-3">🎟️ Paquetes</h2>

            <div class="row g-4">

                <!-- Paquetes -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">

                        <div class="card-header bg-white py-3 px-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <p class="fw-bold mb-0 text-dark">
                                    <i class="ti ti-grid-dots me-2 text-warning"></i>Selecciona la cantidad
                                </p>
                            </div>
                            <p>
                                <small class="text-muted py-3 px-3">🚧 Mínimo 20 para participar</small>
                            </p>
                        </div>

                        <div class="card-body bg-light">
                            <div class="row g-4" id="paquetesNumeros">

                                <!-- 20 stickers -->
                                <div class="col-6 col-md-4 paquetes">
                                    <input type="radio" class="btn-check paquete-radio" name="paqueteNumeros" id="paq3" value="20">
                                    <label class="btn btn-outline-primary w-100 py-2 d-flex flex-column align-items-center justify-content-center paquete-card" for="paq3">
                                        <div class="fw-bold">20</div>
                                        <div class="fs-5 fw-bold">$20.000</div>
                                    </label>
                                </div>

                                <!-- 27 stickers -->
                                <div class="col-6 col-md-4">
                                    <input type="radio" class="btn-check paquete-radio" name="paqueteNumeros" id="paq4" value="27">
                                    <label class="btn btn-outline-primary w-100 py-2 d-flex flex-column align-items-center justify-content-center paquete-card" for="paq4">
                                        <div class="fw-bold">27</div>
                                        <div class="fs-5 fw-bold">$27.000</div>
                                    </label>
                                </div>

                                <!-- 35 stickers - Popular -->
                                <div class="col-6 col-md-4">
                                    <input type="radio" class="btn-check paquete-radio" name="paqueteNumeros" id="paq5" value="35">
                                    <label class="btn btn-outline-primary w-100 py-2 d-flex flex-column align-items-center justify-content-center paquete-card popular" for="paq5">
                                        <span class="badge-paquete">🎯 Popular</span>
                                        <div class="fw-bold">35</div>
                                        <div class="fs-5 fw-bold">$35.000</div>
                                    </label>
                                </div>

                                <!-- 50 stickers - Recomendado -->
                                <div class="col-6 col-md-4">
                                    <input type="radio" class="btn-check paquete-radio" name="paqueteNumeros" id="paq7" value="50">
                                    <label class="btn btn-outline-primary w-100 py-2 d-flex flex-column align-items-center justify-content-center paquete-card recomendado" for="paq7">
                                        <span class="badge-paquete">⭐ Recomendado</span>
                                        <div class="fw-bold">50</div>
                                        <div class="fs-5 fw-bold">$50.000</div>
                                    </label>
                                </div>

                                <!-- 100 stickers - Más vendido -->
                                <div class="col-6 col-md-4">
                                    <input type="radio" class="btn-check paquete-radio" name="paqueteNumeros" id="paq10" value="100">
                                    <label class="btn btn-outline-primary w-100 py-2 d-flex flex-column align-items-center justify-content-center paquete-card mas-vendido" for="paq10">
                                        <span class="badge-paquete mas-vendido-cintilla">🔥 Más vendido</span>
                                        <div class="fw-bold">100</div>
                                        <div class="fs-5 fw-bold">$100.000</div>
                                    </label>
                                </div>

                                <!-- 200 stickers - VIP -->
                                <div class="col-6 col-md-4">
                                    <input type="radio" class="btn-check paquete-radio" name="paqueteNumeros" id="paq20" value="200">
                                    <label class="btn btn-outline-primary w-100 py-2 d-flex flex-column align-items-center justify-content-center paquete-card mejor-valor" for="paq20">
                                        <span class="badge-paquete">💰 VIP</span>
                                        <div class="fw-bold">200</div>
                                        <div class="fs-5 fw-bold">$200.000</div>
                                    </label>
                                </div>

                                <!-- Personalizado -->
                                <div class="col-6 col-md-4">
                                    <input type="radio" class="btn-check paquete-radio" name="paqueteNumeros" id="paqCustom" value="custom">
                                    <label class="btn btn-outline-primary w-100 py-2 d-flex flex-column align-items-center justify-content-center paquete-card custom" for="paqCustom">
                                        <span class="badge-paquete">🎯 Personalizado</span>
                                        <div class="fw-bold">Otro</div>
                                    </label>
                                    <input type="tel" id="cantidadManual" class="form-control form-control-sm text-center mt-1" min="3" placeholder="#" style="display:none;">
                                </div>

                            </div>

                            <div class="alert alert-warning text-center small fw-bold mt-3">
                                🎯 Más stickers = más oportunidades de ganar
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Sidebar desktop -->
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="card border-0 shadow sticky-top">
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

                            <button class="btn btn-dark w-100 py-3 fw-bold" onclick="abrirCheckout()" id="btnPagarDesktop" disabled>
                                Pagar ahora →
                            </button>

                            <div class="mt-3 pt-3 border-top text-center">
                                <p class="small text-muted mb-2 d-flex align-items-center justify-content-center gap-1">
                                    <i class="ti ti-lock-square-rounded text-success fs-5"></i>
                                    Pagos 100% seguros y confirmación inmediata
                                </p>
                                <div class="d-flex justify-content-center align-items-center gap-3 grayscale-hover">
                                    <img src="assets/images/logos/pse.png" alt="PSE" style="height: 40px; width: auto;">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


<!-- ===================== GANADORES ===================== -->
<section class="texto-ganadores">
    <div>
        <h2 class="title-ganadores text-center title-premios">¡Últimos ganadores! 🥳</h2>
    </div>
</section>

<section class="container-ganadores position-relative overflow-hidden mb-5">

    <canvas id="confetti-canvas"></canvas>

    <div style="max-width: 600px; margin: 0 auto;">

    <!-- PRINCIPAL -->
    <div id="ganadores-carousel" class="splide">
        <div class="splide__track">
            <ul class="splide__list">
                <!-- 1 -->
                <li class="splide__slide text-center">
                    <p class="ganador-one">Ganador MT15 + 2 Galitos en Girardota🏍️</p>
                    <img src="assets/images/profile/ganador-girardota.png">
                </li>
                <!-- 1 -->
                <li class="splide__slide text-center">
                    <p class="ganador-one">Combo navideño premio #1 🏍️</p>
                    <img src="assets/images/profile/ganador-combo-navideno-V3.png">
                </li>

                <!-- 2 -->
                <li class="splide__slide text-center">
                    <p class="ganador-one">Combo navideño premio #2 🏍️</p>
                    <img src="assets/images/profile/dinamica-twoo-combo.png">
                </li>

                <!-- 3 -->
                <li class="splide__slide text-center">
                    <p class="ganador-one">Noviembre MT-15 🏍️</p>
                    <img src="assets/images/profile/mt-15-nov2.png">
                </li>

                <!-- 4 -->
                <li class="splide__slide text-center">
                    <p class="ganador-one">Noviembre MT-15 🏍️</p>
                    <img src="assets/images/profile/ganadora_mt15.png">
                </li>

                <!-- 5 -->
                <li class="splide__slide text-center">
                    <p class="ganador-one">Octubre NMAX V3 🏍️</p>
                    <img src="assets/images/profile/nmx-oct3.png">
                </li>

                <!-- 6 -->
                <li class="splide__slide text-center">
                    <p class="ganador-one">Agosto Mazda 🏎️</p>
                    <img src="assets/images/profile/ganador-mazda.png">
                </li>

                <!-- 7 -->
                <li class="splide__slide text-center">
                    <p class="ganador-one">Mayo MT-15 🏍️</p>
                    <img src="assets/images/profile/ganadora-mt-2025-mayo.jpg">
                </li>

                <!-- 8 -->
                <li class="splide__slide text-center">
                    <p class="ganador-one">Octubre FZ 3.0 🏍️</p>
                    <img src="assets/images/profile/ganadorfz.png">
                </li>

                <!-- 9 -->
                <li class="splide__slide text-center">
                    <p class="ganador-one">Crypton FI 🏍️</p>
                    <img src="assets/images/profile/ganador-tres.jpg">
                </li>

                <!-- 10 -->
                <li class="splide__slide text-center">
                    <p class="ganador-one">Julio MT-15 🏍️</p>
                    <img src="assets/images/profile/ganadormt.png">
                </li>

                <!-- 11 -->
                <li class="splide__slide text-center">
                    <p class="ganador-one">Agosto NMAX 2025 🏍️</p>
                    <img src="assets/images/profile/ganadornmax.png">
                </li>

                <!-- 12 -->
                <li class="splide__slide text-center">
                    <p class="ganador-one">Enero NS200 🏍️</p>
                    <img src="assets/images/profile/ganadora-pulsar-f1.jpg">
                </li>

            </ul>
        </div>
    </div>

    <!-- MINIATURAS (MISMO ORDEN EXACTO) -->
    <div id="ganadores-thumbnails" class="splide mt-2">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide"><img src="assets/images/profile/ganador-girardota.png"></li>
                <li class="splide__slide"><img src="assets/images/profile/ganador-combo-navideno-V3.png"></li>
                <li class="splide__slide"><img src="assets/images/profile/dinamica-twoo-combo.png"></li>
                <li class="splide__slide"><img src="assets/images/profile/mt-15-nov2.png"></li>
                <li class="splide__slide"><img src="assets/images/profile/ganadora_mt15.png"></li>
                <li class="splide__slide"><img src="assets/images/profile/nmx-oct3.png"></li>
                <li class="splide__slide"><img src="assets/images/profile/ganador-mazda.png"></li>
                <li class="splide__slide"><img src="assets/images/profile/ganadora-mt-2025-mayo.jpg"></li>
                <li class="splide__slide"><img src="assets/images/profile/ganadorfz.png"></li>
                <li class="splide__slide"><img src="assets/images/profile/ganador-tres.jpg"></li>
                <li class="splide__slide"><img src="assets/images/profile/ganadormt.png"></li>
                <li class="splide__slide"><img src="assets/images/profile/ganadornmax.png"></li>
                <li class="splide__slide"><img src="assets/images/profile/ganadora-pulsar-f1.jpg"></li>

            </ul>
        </div>
    </div>

    </div>

</section>

    <!-- ===================== FOOTER ===================== -->
    <footer class="bg-dark text-light pt-5">
        <div class="container">

            <div class="row g-4 text-center text-md-start">

                <!-- Marca -->
                <div class="col-md-4">
                    <h5 class="fw-bold text-warning">El dia de TU SUERTE 🍀</h5>
                    <p class="small text-secondary">
                        Emocionantes oportunidades para ganar Motos, Carros y más. ¡Participa y gana!.<br>
                        Transparencia, respaldo y seguridad en cada dinámica.
                    </p>
                    <div class="d-none d-md-flex gap-2 mt-3">
                        <a target="_blank" class="social-instagram btn btn-outline-light btn-sm rounded-circle d-none">
                            <i class="ti ti-brand-instagram"></i>
                        </a>
                        <a target="_blank" class="social-whatsapp btn btn-outline-success btn-sm rounded-circle d-none">
                            <i class="ti ti-brand-whatsapp"></i>
                        </a>
                        <a target="_blank" class="social-facebook btn btn-outline-primary btn-sm rounded-circle d-none">
                            <i class="ti ti-brand-facebook"></i>
                        </a>
                    </div>
                </div>

                <!-- Enlaces -->
                <div class="col-md-4">
                    <h6 class="fw-bold text-uppercase mb-3">Enlaces de interés</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2">
                            <a href="#compra" class="text-secondary text-decoration-none">Comprar stickers</a>
                        </li>
                        <li class="mb-2">
                            <a href="assets/doc/politica de proteccion de datos personale.pdf" class="text-secondary text-decoration-none">Política de privacidad</a>
                        </li>
                        <li class="mb-2">
                            <a href="assets/doc/tyc-v4.pdf" class="text-secondary text-decoration-none">Términos y condiciones</a>
                        </li>
                        <li class="mb-2">
                            <a href="https://wa.me/573202925348?text=Hola%20" class="text-secondary text-decoration-none">Soporte</a>
                        </li>
                        <li class="mb-2">
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalBuscarTickets">
                                Mis Stickers 🎫🔍
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Contacto -->
                <div class="col-md-4">
                    <h6 class="fw-bold text-uppercase mb-3">Contacto</h6>
                    <p class="small text-secondary mb-2">
                        <i class="ti ti-phone me-2"></i> (+57) 318 009 0749
                    </p>
                    <p class="small text-secondary mb-2">
                        <i class="ti ti-mail me-2"></i> info@eldiadetusuerte.com
                    </p>
                    <p class="small text-secondary">
                        <i class="ti ti-map-pin me-2"></i> Colombia
                    </p>
                    <p class="small text-secondary">
                        <i class="ti ti-map-pin me-2"></i> Pagos Procesados por:
                    </p>
                    <div class="mt-3">
                        <img src="assets/images/logos/pse.png" height="50" class="me-2" alt="PSE">
                    </div>
                </div>

            </div>

            <hr class="border-secondary my-4">

            <!-- Redes mobile -->
            <div class="d-flex d-md-none justify-content-center gap-3 mb-3">
                <a target="_blank" class="social-instagram btn btn-outline-light rounded-circle d-none">
                    <i class="ti ti-brand-instagram"></i>
                </a>
                <a target="_blank" class="social-whatsapp btn btn-outline-success rounded-circle d-none">
                    <i class="ti ti-brand-whatsapp"></i>
                </a>
                <a target="_blank" class="social-facebook btn btn-outline-primary rounded-circle d-none">
                    <i class="ti ti-brand-facebook"></i>
                </a>
            </div>

            <!-- Copyright -->
            <div class="text-center small text-secondary pb-2">
                © <?= date('Y'); ?> El dia de TU SUERTE · Todos los derechos reservados V5.0.1 <br>
                Desarrollado con ❤️ por
                <strong class="text-warning">
                    <a href="https://wa.me/573245894268?text=Hola%20vi%20la%20p%C3%A1gina%20de%20EDTS%20y%20quiero%20obtener%20m%C3%A1s%20informaci%C3%B3n%20sobre%20el%20sistema%20"
                        target="_blank" rel="noopener" class="text-warning">
                        Cristian Ceballos <i class="ti ti-brand-whatsapp"></i><i class="ti ti-link"></i>
                    </a>
                </strong>
            </div>

        </div>
    </footer>

    <!-- ===================== MOBILE CART ===================== -->
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

    <!-- ===================== MODAL BUSCAR TICKETS ===================== -->
    <div class="modal fade" id="modalBuscarTickets" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">🔍 Buscar mis stickers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <input type="tel" id="inputBuscarTickets" class="form-control text-center mb-3" placeholder="Ej: 3001234567">
                    <button class="btn btn-warning w-100 fw-bold" onclick="buscarTickets()">Buscar</button>
                    <div id="resultadoBusqueda" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===================== MODAL CHECKOUT ===================== -->
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
                                    <input type="text" class="form-control" id="nombreCliente" required placeholder="Nombre">
                                    <label>Nombre</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="apellidoCliente" required placeholder="Apellido">
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
                        </div>

                        <hr>

                        <h6 class="fw-bold mb-3">Método de Pago</h6>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-outline-dark w-100 fw-bold" data-metodo="pse" onclick="seleccionarMetodo('pse')">
                                    💳 PSE
                                </button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-outline-success w-100 fw-bold" data-metodo="transferencia" onclick="seleccionarMetodo('transferencia')">
                                    🏦 Transferencia
                                </button>
                            </div>
                        </div>

                        <div id="contenedorMetodoPago">

                            <!-- PSE -->
                            <div id="metodoPSE" class="metodo-pago d-none">
                                <button type="button" class="btn btn-warning w-100 py-3 fw-bold text-uppercase shadow-sm" onclick="iniciarPagoPSE()">
                                    Ir a pagar con PSE 💳
                                </button>
                            </div>

                            <!-- Transferencia -->
                            <div id="metodoTransferencia" class="metodo-pago d-none">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">

                                        <h6 class="fw-bold text-success mb-3">💸 Datos para Transferencia</h6>

                                        <!-- Bancolombia -->
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div>
                                                <strong>Bancolombia</strong><br>
                                                <span id="bancolombia">68005493483</span><br>
                                                <small class="text-muted">Angélica Paez</small>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-dark" onclick="copiarTexto('bancolombia')">
                                                Copiar
                                            </button>
                                        </div>

                                        <!-- Llave breve -->
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <strong>Llave Breve 🔑</strong><br>
                                                <span id="llave">@ngelicap5037</span><br>
                                                <small class="text-muted">Angélica Paez</small>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-dark" onclick="copiarTexto('llave')">
                                                Copiar
                                            </button>
                                        </div>

                                        <hr>

                                        <label class="fw-bold mb-2">📤 Subir comprobante</label>
                                        <input type="file" class="form-control mb-3" id="comprobantePago" accept="image/*,application/pdf">

                                        <button type="button" class="btn btn-success w-100 fw-bold" onclick="procesarTransferencia(event)">
                                            Confirmar pago 🚀
                                        </button>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </form>

                    <div class="mt-3 pt-3 border-top text-center">
                        <p class="small text-muted mb-2 d-flex align-items-center justify-content-center gap-1">
                            <i class="ti ti-lock-square-rounded text-success fs-5"></i>
                            Pagos 100% seguros y confirmación inmediata
                        </p>
                        <div class="d-flex justify-content-center align-items-center gap-3 grayscale-hover">
                            <img src="assets/images/logos/pse.png" alt="PSE" style="height: 40px; width: auto;">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php
    include "includes/preloader.php";
    include "includes/btn-share.php";
    ?>

    <!-- ===================== SCRIPTS ===================== -->
    <script src="<?= ASSETS_URL ?>/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= ASSETS_URL ?>/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <script src="assets/js/departamentos-ciudades.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/frontend.js"></script>
    <script src="assets/js/buscarTickets.js"></script>

</body>
</html>
-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2026 a las 04:32:40
-- Versión del servidor: 8.0.44
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ap_fenix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_admin` int NOT NULL,
  `email_admin` text,
  `password_admin` text,
  `rol_admin` text,
  `token_admin` text,
  `token_exp_admin` text,
  `status_admin` int DEFAULT '1',
  `date_created_admin` date DEFAULT NULL,
  `date_updated_admin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `email_admin`, `password_admin`, `rol_admin`, `token_admin`, `token_exp_admin`, `status_admin`, `date_created_admin`, `date_updated_admin`) VALUES
(1, 'irma.herrera', '$2a$07$azybxcags23425sdg23sdel.vdyHYp8tCpAE/G5HZp6Da1ZmBjTQe', NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3NzQ3MjkyNzMsImV4cCI6MTc3NDgxNTY3MywiZGF0YSI6eyJpZCI6MSwiZW1haWwiOiJpcm1hLmhlcnJlcmEifX0.v-U5uuLrkbIsUbjG3H1dvNLZ3MBpza7lptv2DdYnbSw', '1774833790', 1, NULL, '2026-03-29 01:46:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id_customer` int NOT NULL,
  `name_customer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname_customer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_customer` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_customer` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_customer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_customer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_customer` tinyint(1) DEFAULT '1',
  `date_created_customer` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated_customer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_backups`
--

CREATE TABLE `payment_backups` (
  `id_payment_backup` int NOT NULL,
  `code_payment_backup` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_raffle_payment_backup` int NOT NULL,
  `id_customer_payment_backup` int NOT NULL,
  `quantity_payment_backup` int NOT NULL,
  `amount_payment_backup` decimal(12,2) NOT NULL,
  `currency_payment_backup` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'COP',
  `openpay_id_payment_backup` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `openpay_status_payment_backup` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `openpay_response_payment_backup` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status_payment_backup` tinyint(1) DEFAULT '1' COMMENT '1=pending,2=approved,3=rejected,4=cancelled',
  `date_created_payment_backup` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated_payment_backup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raffles`
--

CREATE TABLE `raffles` (
  `id_raffle` int NOT NULL,
  `title_raffle` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL COMMENT 'Título comercial de la rifa',
  `description_raffle` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci COMMENT 'Detalles del premio',
  `price_raffle` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Precio por cada número',
  `digits_raffle` int NOT NULL DEFAULT '4' COMMENT 'Define si es de 2, 3, 4 o 5 cifras',
  `date_raffle` datetime NOT NULL COMMENT 'Fecha y hora del sorteo',
  `promotions_raffle` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci COMMENT 'JSON con ofertas (ej: 3 por 10.000)',
  `status_raffle` int NOT NULL DEFAULT '1' COMMENT '1: Activa, 0: Inactiva/Finalizada',
  `date_created_raffle` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated_raffle` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id_sale` int NOT NULL,
  `id_customer_sale` int NOT NULL,
  `id_raffle_sale` int NOT NULL,
  `code_sale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity_sale` int NOT NULL,
  `total_sale` decimal(15,2) NOT NULL DEFAULT '0.00',
  `payment_method_sale` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Efectivo',
  `status_sale` int NOT NULL DEFAULT '1' COMMENT '1: Pagada, 0: Anulada',
  `id_admin_sale` int DEFAULT NULL,
  `date_created_sale` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated_sale` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id_ticket` int NOT NULL,
  `number_ticket` varchar(10) NOT NULL,
  `status_ticket` int NOT NULL DEFAULT '0',
  `id_raffle_ticket` int NOT NULL,
  `id_customer_ticket` int DEFAULT NULL,
  `id_sale_ticket` int DEFAULT NULL,
  `date_created_ticket` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated_ticket` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfers`
--

CREATE TABLE `transfers` (
  `id_transfer` int NOT NULL,
  `code_transfer` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_raffle_transfer` int NOT NULL,
  `id_customer_transfer` int NOT NULL,
  `quantity_transfer` int NOT NULL,
  `amount_transfer` decimal(10,2) NOT NULL,
  `currency_transfer` varchar(10) COLLATE utf8mb4_spanish2_ci DEFAULT 'COP',
  `url_transfer` text COLLATE utf8mb4_spanish2_ci,
  `status_transfer` tinyint(1) DEFAULT '1',
  `date_created_transfer` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_updated_transfer` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`),
  ADD UNIQUE KEY `phone_customer` (`phone_customer`),
  ADD KEY `idx_email` (`email_customer`),
  ADD KEY `idx_phone` (`phone_customer`);

--
-- Indices de la tabla `payment_backups`
--
ALTER TABLE `payment_backups`
  ADD PRIMARY KEY (`id_payment_backup`),
  ADD UNIQUE KEY `uk_code_payment_backup` (`code_payment_backup`),
  ADD KEY `fk_payment_backup_raffle` (`id_raffle_payment_backup`),
  ADD KEY `fk_payment_backup_customer` (`id_customer_payment_backup`);

--
-- Indices de la tabla `raffles`
--
ALTER TABLE `raffles`
  ADD PRIMARY KEY (`id_raffle`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sale`),
  ADD UNIQUE KEY `idx_code_sale_unique` (`code_sale`),
  ADD KEY `fk_sales_customers` (`id_customer_sale`),
  ADD KEY `fk_sales_raffles` (`id_raffle_sale`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_ticket`),
  ADD UNIQUE KEY `idx_unique_number_raffle` (`number_ticket`,`id_raffle_ticket`),
  ADD KEY `fk_tickets_raffles` (`id_raffle_ticket`),
  ADD KEY `fk_tickets_customers` (`id_customer_ticket`),
  ADD KEY `fk_tickets_sales` (`id_sale_ticket`);

--
-- Indices de la tabla `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id_transfer`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payment_backups`
--
ALTER TABLE `payment_backups`
  MODIFY `id_payment_backup` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `raffles`
--
ALTER TABLE `raffles`
  MODIFY `id_raffle` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sale` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id_transfer` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `payment_backups`
--
ALTER TABLE `payment_backups`
  ADD CONSTRAINT `fk_payment_backup_customer` FOREIGN KEY (`id_customer_payment_backup`) REFERENCES `customers` (`id_customer`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_payment_backup_raffle` FOREIGN KEY (`id_raffle_payment_backup`) REFERENCES `raffles` (`id_raffle`);

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_sales_customers` FOREIGN KEY (`id_customer_sale`) REFERENCES `customers` (`id_customer`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sales_raffles` FOREIGN KEY (`id_raffle_sale`) REFERENCES `raffles` (`id_raffle`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_tickets_customers` FOREIGN KEY (`id_customer_ticket`) REFERENCES `customers` (`id_customer`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tickets_raffles` FOREIGN KEY (`id_raffle_ticket`) REFERENCES `raffles` (`id_raffle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tickets_sales` FOREIGN KEY (`id_sale_ticket`) REFERENCES `sales` (`id_sale`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

<?php
require_once './config.php';


    abstract class Model {
        protected $db;

        function __construct() {
            $this->db = new PDO('mysql:host='. MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
            $this->deploy();
        }

        function deploy() {
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll();
            if(count($tables)==0) {
                $sql =<<<END

                -- phpMyAdmin SQL Dump
                -- version 5.2.1
                -- https://www.phpmyadmin.net/
                --
                -- Servidor: 127.0.0.1
                -- Tiempo de generación: 21-10-2024 a las 00:17:19
                -- Versión del servidor: 10.4.28-MariaDB
                -- Versión de PHP: 8.2.4

                SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
                START TRANSACTION;
                SET time_zone = "+00:00";


                /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
                /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
                /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
                /*!40101 SET NAMES utf8mb4 */;

                --
                -- Base de datos: `db_tienda_deportiva`
                --

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `deportes`
                --

                CREATE TABLE `deportes` (
                `id_deporte` int(11) NOT NULL,
                `nombre` varchar(200) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                --
                -- Volcado de datos para la tabla `deportes`
                --

                INSERT INTO `deportes` (`id_deporte`, `nombre`) VALUES
                (34, 'hockey'),
                (35, 'nba');

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `productos`
                --

                CREATE TABLE `productos` (
                `id_producto` int(11) NOT NULL,
                `nombre` varchar(200) NOT NULL,
                `precio` decimal(10,0) NOT NULL,
                `color` varchar(200) NOT NULL,
                `id_deporte` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                --
                -- Volcado de datos para la tabla `productos`
                --

                INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `color`, `id_deporte`) VALUES
                (64, 'palo', 454544, 'negro', 34),
                (65, 'pelota', 31231231, 'violeta', 35);

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `usuarios`
                --

                CREATE TABLE `usuarios` (
                `username` varchar(200) NOT NULL,
                `password` varchar(200) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                --
                -- Volcado de datos para la tabla `usuarios`
                --

                INSERT INTO `usuarios` (`username`, `password`) VALUES
                ('webadmin', '$2y$10\$QQfKUTI3eix5AFFHUsFCFeR05Uy00ukm16tnm3/jg3tDWsGskJPBi');

                --
                -- Índices para tablas volcadas
                --

                --
                -- Indices de la tabla `deportes`
                --
                ALTER TABLE `deportes`
                ADD PRIMARY KEY (`id_deporte`),
                ADD KEY `id_deporte` (`id_deporte`);

                --
                -- Indices de la tabla `productos`
                --
                ALTER TABLE `productos`
                ADD PRIMARY KEY (`id_producto`),
                ADD KEY `id_deporte` (`id_deporte`);

                --
                -- AUTO_INCREMENT de las tablas volcadas
                --

                --
                -- AUTO_INCREMENT de la tabla `deportes`
                --
                ALTER TABLE `deportes`
                MODIFY `id_deporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

                --
                -- AUTO_INCREMENT de la tabla `productos`
                --
                ALTER TABLE `productos`
                MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

                --
                -- Restricciones para tablas volcadas
                --

                --
                -- Filtros para la tabla `productos`
                --
                ALTER TABLE `productos`
                ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_deporte`) REFERENCES `deportes` (`id_deporte`) ON UPDATE CASCADE;
                COMMIT;

                /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
                /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
                /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


                END;
                $this->db->query($sql);
            }
        }   
    }    
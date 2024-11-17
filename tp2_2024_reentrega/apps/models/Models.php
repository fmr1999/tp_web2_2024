<?php

    class Model {

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
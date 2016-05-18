-

-- -----------------------------------------------------
-- Data for table `mydb`.`Usuarios`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`Usuarios` (`idUsuarios`, `nombre`, `apPat`, `apMat`, `correo`, `telefono`, `password`) VALUES (1, 'Ivan', 'Romero', 'García', 'ivan@gmail.com', '2291010203', NULL);
INSERT INTO `mydb`.`Usuarios` (`idUsuarios`, `nombre`, `apPat`, `apMat`, `correo`, `telefono`, `password`) VALUES (2, 'Jesus Manuel', 'Pérez', 'García', 'jesus@hotmaiil.com', '2291040506', NULL);
INSERT INTO `mydb`.`Usuarios` (`idUsuarios`, `nombre`, `apPat`, `apMat`, `correo`, `telefono`, `password`) VALUES (3, 'Enrique', 'Torres', 'Montoya', 'enrique@gmail.com', '2291090807', NULL);
INSERT INTO `mydb`.`Usuarios` (`idUsuarios`, `nombre`, `apPat`, `apMat`, `correo`, `telefono`, `password`) VALUES (4, 'Héctor Adolfo', 'Andrade', 'Gómez', 'jandradg@hotmail.com', '2291999999', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`Productos`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`Productos` (`idProductos`, `nombre`, `descripcion`, `precio`, `Usuarios_idUsuarios`, `url`) VALUES (1, 'Fatboy', 'Tracción, flotación y control, son las palabras clave a la hora de hablar de bicis de sendero. Por lo que no es ninguna sorpresa para nosotros ver que cada vez son más los ciclistas de sendero que van a fondo en sus fat bikes, es por eso que creamos nuestra Fatboy Pro Trail especialmente para senderos. Cuenta con una eficiente y duradera transmisión de un solo plato, y poderosos frenos Shimano que te harán detenerte sobre una moneda. Y para absorber baches, golpes y vibraciones, la equipamos con una horquilla de suspensión de aire RockShox. Ve más rápido sobre una fat bike.', 8500, 1, NULL);
INSERT INTO `mydb`.`Productos` (`idProductos`, `nombre`, `descripcion`, `precio`, `Usuarios_idUsuarios`, `url`) VALUES (2, 'Diverge A1', 'Si estás por comenzar a explorar rutas que pensaste hasta ahora imposibles de recorrer en bici, la Diverge A1 es la opción perfecta para llevarte. Con un cuadro de aluminio A1 Premium, junto a una construcción Claris de Shimano, ofrece un manejo confiable y predecible sobre terreno irregular. Se trata de la bici perfecta para aumentar tus kilómetros y salir en busca de aventura.', 6500, 2, NULL);
INSERT INTO `mydb`.`Productos` (`idProductos`, `nombre`, `descripcion`, `precio`, `Usuarios_idUsuarios`, `url`) VALUES (3, 'Hellga Comp', 'No te guardes nada. La Hellga Comp está preparada para brindarte lo máximo en diversión y felicidad, gracias a su supertracción, flotación y control sobre todo tipo de terrenos. Es una receta para pasarlo a lo grande. Simplemente toma un cuadro de aluminio y una horquilla de carbono duradero, agrega una trasmisión superconfiable y frenos de disco hidráulicos, mezcla con llantas Ground Control Fat anchas y de buen agarre, y ya tienes todos los ingredientes para volverte tan arriesgado que la gente te verá pasar volando y temerá perderse los detalles. La Hellga—atrae las miradas y regalando diversión a su paso.', 4500, 1, NULL);
INSERT INTO `mydb`.`Productos` (`idProductos`, `nombre`, `descripcion`, `precio`, `Usuarios_idUsuarios`, `url`) VALUES (4, 'AWOL Elite', 'La AWOL Elite es lo último en versatilidad para el transporte urbano. Cuenta con un cuadro y horquilla de acero, tratado con calor, con conificado especial de cromoly para un manejo confiable y predecible; cableado completo con guía de gran durabilidad; Además de frenos de disco mecánicos para obtener un gran poder de frenado Viene también equipada con un Pizza Rack delantero—que se pliega al tamaño de una caja de pizza— guardabarros y portacargas trasero Tubus Vega, para que el llevar carga extra sea muy sencillo independientemente del clima. Con la AWOL Elite no hay límite para dónde puedes llegar.', 7800, 2, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`Notificaciones`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`Notificaciones` (`idNotificaciones`, `nombreCliente`, `apPatCliente`, `apMatCliente`, `correo`, `telefono`, `mensaje`, `Productos_idProductos`) VALUES (1, 'Rafael', 'Rivera', 'López', 'rafael@gmail.com', '2292514863', 'Me interesa la bicicleta.¿Qué día puedo ir a verla?', 2);
INSERT INTO `mydb`.`Notificaciones` (`idNotificaciones`, `nombreCliente`, `apPatCliente`, `apMatCliente`, `correo`, `telefono`, `mensaje`, `Productos_idProductos`) VALUES (2, 'Guillermo', 'Robles', 'Martinez', 'gmo@hotmail.com', '2299519835', 'Me agrada, me gustaría rentar tú producto para una competencia.', 3);

COMMIT;

-- Obtener todos los productos de un usuario
SELECT P.nombre, P.descripcion, P.precio
FROM Usuarios AS U, Productos AS P
WHERE U.idUsuarios = P.Usuarios_idUsuarios

-- Obtener todos los usuarios.
SELECT *
FROM Usuarios

-- Obtener todas las notificaciones de cierto producto.
SELECT N.nombreCliente, N.apPatCliente, N.apMatCliente, N.correo,N.telefono, N.mensaje
FROM Productos AS P, Notificaciones AS N
WHERE P.idProductos = N.Productos_idProductos

-- Obtener todas las notificaciones de un usuario.
SELECT N.nombreCliente, N.apPatCliente, N.apMatCliente, N.correo,N.telefono, N.mensaje, P.nombre
FROM Usuarios AS U, Productos AS P, Notificaciones AS N
WHERE U.idUsuarios= 1 and U.idUsuarios = P.Usuarios_idUsuarios
AND P.idProductos = N.Productos_idProductos

SELECT P.nombre, P.descripcion, P.precio
FROM  Productos AS P;
WHERE U.idUsuarios = P.Usuarios_idUsuarios

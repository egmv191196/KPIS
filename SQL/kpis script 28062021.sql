   CREATE TABLE `Usuario`
(
  `Usuario` Varchar(30) NOT NULL,
  `Nombre` Varchar(50) NOT NULL,
  `Password` Varchar(30) NOT NULL,
  `Cargo` Varchar(30) NOT NULL,
  `Area` Varchar(30) NOT NULL
)
;

ALTER TABLE `Usuario` ADD PRIMARY KEY (`Usuario`)
;

-- Table Proyecto

CREATE TABLE `Proyecto`
(
  `clave_Proyecto` Varchar(30) NOT NULL,
  `Nombre` Varchar(50) NOT NULL,
  `fecha_Inicio` Date NOT NULL,
  `fecha_Fin` Date NOT NULL,
  `monto_Contrato` Double NOT NULL,
  `id_Presupuesto` Varchar(30) NOT NULL,
  `Estado` Int NOT NULL,
  `id_Cliente` Bigint NOT NULL
)
;

CREATE INDEX `IX_Solicita` ON `Proyecto` (`id_Cliente`)
;

ALTER TABLE `Proyecto` ADD PRIMARY KEY (`clave_Proyecto`)
;

-- Table Cliente

CREATE TABLE `Cliente`
(
  `id_Cliente` Bigint NOT NULL AUTO_INCREMENT,
  `Nombre` Varchar(30) NOT NULL,
  `RFC` Varchar(30),
  `Correo` Varchar(30) NOT NULL,
  `Telefono` Bigint NOT NULL,
  `Estado` Int NOT NULL,
  PRIMARY KEY (`id_Cliente`)
)
;

-- Table Proveedor

CREATE TABLE `Proveedor`
(
  `id_Proveedor` Bigint NOT NULL AUTO_INCREMENT,
  `Nombre` Varchar(30) NOT NULL,
  `RFC` Varchar(30) NOT NULL,
  `Correo` Varchar(30) NOT NULL,
  `Telefono` Bigint NOT NULL,
  `Estado` Int NOT NULL,
  PRIMARY KEY (`id_Proveedor`)
)
;

-- Table catalogo_Conceptos

CREATE TABLE `catalogo_Conceptos`
(
  `id_Concepto` Bigint NOT NULL,
  `Nombre` Varchar(50) NOT NULL
)
;

ALTER TABLE `catalogo_Conceptos` ADD PRIMARY KEY (`id_Concepto`)
;

-- Table catalogo_Indicadores

CREATE TABLE `catalogo_Indicadores`
(
  `id_Dat` Varchar(20) NOT NULL,
  `Nombre` Varchar(50) NOT NULL,
  `Permiso` Varchar(20) NOT NULL,
  `Periodicidad` Varchar(20) NOT NULL
)
;

ALTER TABLE `catalogo_Indicadores` ADD PRIMARY KEY (`id_Dat`)
;

-- Table registroIndicadores

CREATE TABLE `registroIndicadores`
(
  `id_registro` Int NOT NULL AUTO_INCREMENT,
  `Usuario` Varchar(30) NOT NULL,
  `id_Req` Varchar(20) NOT NULL,
  `Fecha` Date NOT NULL,
  `Valor` Int NOT NULL,
  `año` Year(4) NOT NULL,
  `SQM` Int NOT NULL,
  PRIMARY KEY (`id_registro`)
)
;

CREATE INDEX `IX_Relationship6` ON `registroIndicadores` (`Usuario`)
;

CREATE INDEX `IX_Relationship7` ON `registroIndicadores` (`id_Req`)
;

-- Table Conceptos

CREATE TABLE `Conceptos`
(
  `id_Concepto` Int NOT NULL AUTO_INCREMENT,
  `num_Concepto` Int NOT NULL,
  `Valor` Int NOT NULL,
  `Avance` Int NOT NULL,
  `clave_Proyecto` Varchar(30) NOT NULL,
  PRIMARY KEY (`id_Concepto`)
)
;

CREATE INDEX `IX_Relationship20` ON `Conceptos` (`clave_Proyecto`)
;

-- Create foreign keys (relationships) section -------------------------------------------------

ALTER TABLE `Proyecto` ADD CONSTRAINT `Solicita` FOREIGN KEY (`id_Cliente`) REFERENCES `Cliente` (`id_Cliente`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `registroIndicadores` ADD CONSTRAINT `Registra` FOREIGN KEY (`Usuario`) REFERENCES `Usuario` (`Usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `registroIndicadores` ADD CONSTRAINT `necesita` FOREIGN KEY (`id_Req`) REFERENCES `catalogo_Indicadores` (`id_Dat`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `Conceptos` ADD CONSTRAINT `Tiene` FOREIGN KEY (`clave_Proyecto`) REFERENCES `Proyecto` (`clave_Proyecto`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


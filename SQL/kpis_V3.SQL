--CREATE TABLE `Usuario`
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
  `monto_Contrato` Bigint NOT NULL,
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
  `Nombre` Varchar(30) NOT NULL,
  `Permiso` Varchar(20) NOT NULL
)
;

ALTER TABLE `catalogo_Indicadores` ADD PRIMARY KEY (`id_Dat`)
;

-- Table mov_Prov

CREATE TABLE `mov_Prov`
(
  `id_MovProv` Int NOT NULL AUTO_INCREMENT,
  `id_Proveedor` Bigint,
  `id_registro` Int,
  PRIMARY KEY (`id_MovProv`)
)
;

CREATE INDEX `IX_Relationship14` ON `mov_Prov` (`id_Proveedor`)
;

CREATE INDEX `IX_Relationship15` ON `mov_Prov` (`id_registro`)
;

-- Table concepto_Proyecto

CREATE TABLE `concepto_Proyecto`
(
  `clave_Proyecto` Varchar(30) NOT NULL,
  `id_Concepto` Bigint NOT NULL
)
;

ALTER TABLE `concepto_Proyecto` ADD PRIMARY KEY (`clave_Proyecto`,`id_Concepto`)
;

-- Table registroIndicadores

CREATE TABLE `registroIndicadores`
(
  `id_registro` Int NOT NULL AUTO_INCREMENT,
  `Usuario` Varchar(30) NOT NULL,
  `id_Req` Varchar(20) NOT NULL,
  `Fecha` Date NOT NULL,
  `Valor` Int NOT NULL,
  PRIMARY KEY (`id_registro`)
)
;

CREATE INDEX `IX_Relationship6` ON `registroIndicadores` (`Usuario`)
;

CREATE INDEX `IX_Relationship7` ON `registroIndicadores` (`id_Req`)
;

-- Table mov_Cliente

CREATE TABLE `mov_Cliente`
(
  `id_MovCli` Int NOT NULL AUTO_INCREMENT,
  `id_registro` Int,
  `id_Cliente` Bigint,
  PRIMARY KEY (`id_MovCli`)
)
;

CREATE INDEX `IX_Relationship16` ON `mov_Cliente` (`id_registro`)
;

CREATE INDEX `IX_Relationship17` ON `mov_Cliente` (`id_Cliente`)
;

-- Table mov_Proyecto

CREATE TABLE `mov_Proyecto`
(
  `id_MovPro` Int NOT NULL AUTO_INCREMENT,
  `id_registro` Int,
  `clave_Proyecto` Varchar(30),
  PRIMARY KEY (`id_MovPro`)
)
;

CREATE INDEX `IX_Relationship18` ON `mov_Proyecto` (`id_registro`)
;

CREATE INDEX `IX_Relationship19` ON `mov_Proyecto` (`clave_Proyecto`)
;

-- Create foreign keys (relationships) section -------------------------------------------------

ALTER TABLE `concepto_Proyecto` ADD CONSTRAINT `Tiene` FOREIGN KEY (`clave_Proyecto`) REFERENCES `Proyecto` (`clave_Proyecto`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `concepto_Proyecto` ADD CONSTRAINT `Pertenece` FOREIGN KEY (`id_Concepto`) REFERENCES `catalogo_Conceptos` (`id_Concepto`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `Proyecto` ADD CONSTRAINT `Solicita` FOREIGN KEY (`id_Cliente`) REFERENCES `Cliente` (`id_Cliente`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `registroIndicadores` ADD CONSTRAINT `Relationship6` FOREIGN KEY (`Usuario`) REFERENCES `Usuario` (`Usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `registroIndicadores` ADD CONSTRAINT `Relationship7` FOREIGN KEY (`id_Req`) REFERENCES `catalogo_Indicadores` (`id_Dat`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `mov_Prov` ADD CONSTRAINT `Relationship14` FOREIGN KEY (`id_Proveedor`) REFERENCES `Proveedor` (`id_Proveedor`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `mov_Prov` ADD CONSTRAINT `Relationship15` FOREIGN KEY (`id_registro`) REFERENCES `registroIndicadores` (`id_registro`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `mov_Cliente` ADD CONSTRAINT `Relationship16` FOREIGN KEY (`id_registro`) REFERENCES `registroIndicadores` (`id_registro`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `mov_Cliente` ADD CONSTRAINT `Relationship17` FOREIGN KEY (`id_Cliente`) REFERENCES `Cliente` (`id_Cliente`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `mov_Proyecto` ADD CONSTRAINT `Relationship18` FOREIGN KEY (`id_registro`) REFERENCES `registroIndicadores` (`id_registro`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `mov_Proyecto` ADD CONSTRAINT `Relationship19` FOREIGN KEY (`clave_Proyecto`) REFERENCES `Proyecto` (`clave_Proyecto`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


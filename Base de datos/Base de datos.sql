use proyecto;

CREATE TABLE IF NOT EXISTS usuario_s (
  usuId int(11) NOT NULL AUTO_INCREMENT,
  usuLogin varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  usuPassword varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  usuUsuSesion varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  usuEstado tinyint(1) NOT NULL DEFAULT 1,
  usuRemember_token varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  usu_created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  usu_updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (usuId),
  UNIQUE KEY uniq_login (usuLogin)
  );
  
  CREATE TABLE IF NOT EXISTS persona (
  perId int(11) not null,
  perDocumento varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nos muestra el documento de la persona',
  perNombre varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nos muestra el nombre de la persona',
  perApellido varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nos muestra el apellido de la persona',
  perEstado tinyint(1) NOT NULL DEFAULT '1',
  perUsuSesion varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  per_created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  per_updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  usuario_s_usuId int(11) NOT NULL,
  PRIMARY KEY (`perId`,`usuario_s_usuId`),
  UNIQUE KEY `uniq_documento` (`perDocumento`),
  KEY `fk_persona_usuario_s1_idx` (`usuario_s_usuId`),
  CONSTRAINT `fk_persona_usuario_s1` FOREIGN KEY (`usuario_s_usuId`) REFERENCES `usuario_s` (`usuId`) ON DELETE NO ACTION ON UPDATE NO ACTION
);
  

CREATE TABLE IF NOT EXISTS `rol` (
  `rolId` int(11) NOT NULL AUTO_INCREMENT,
  `rolNombre` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `rolDescripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rolEstado` tinyint(1) NOT NULL DEFAULT '1',
  `rolUsuSesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rol_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `rol_updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rolId`),
  UNIQUE KEY `uniq_nombrerol` (`rolNombre`)
);
/* ----------------------------------------------------------------------- */
CREATE TABLE IF NOT EXISTS `usuario_s_roles` (
  `id_usuario_s` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fechaUserRol` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `usuRolUsuSesion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario_s`,`id_rol`),
  KEY `usuario_s_roles_fk_rolidrol` (`id_rol`),
  CONSTRAINT `usuario_s_roles_fk_rolidrol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`rolId`),
  CONSTRAINT `usuario_s_roles_fk_usuario_sid` FOREIGN KEY (`id_usuario_s`) REFERENCES `usuario_s` (`usuId`)
);


/* -----------------------------------------------------------------------------
MESEROS 
----------------------------------------------------------------- */

create table codigo_mesero (
	codMesId int4 not null,
    codMesIdMesero int(11) not null,
    codMesCodigoMesero int4 not null,
	codMesEstado tinyint(1) not null default 1,
	codMesSesion varchar(20) collate utf8_unicode_ci default null,
	codMescreated_at timestamp null default current_timestamp,
	codMesupdated_at timestamp null default current_timestamp on update current_timestamp,
    primary key (codMesId),
    foreign key (codMesIdMesero) references persona (perId),
    constraint uk_cod_mese unique (codMesCodigoMesero)
);

create table horario (
	horId  int4 not null,
    horIdCodigoMesero int4 not null,
    horHoraInicio time not null,
    horHoraFin time not null,
    horFecha date not null,
    horObservacion varchar(1000) null,
	horEstado tinyint(1) not null default 1,
	horSesion varchar(20) collate utf8_unicode_ci default null,
	horcreated_at timestamp null default current_timestamp,
	horupdated_at timestamp null default current_timestamp on update current_timestamp,
    primary key (horId),
    foreign key (horIdCodigoMesero) references codigo_mesero (codMesid)
);

/* -------------------------------------------------------------------------------------------
PLATOS
--------------------------------------------------------------------------------*/
create table tipo_plato (
	tipPlaId int4 not null,
    tipPlaPlato varchar(100) not null,
	tipPlaAdicional varchar(50) null,
    tipPlaBebida varchar(20) not null,
    tipPlaPostre varchar(20) null,
	tipPlaEstado tinyint(1) not null default 1,
	tipPlaSesion varchar(20) collate utf8_unicode_ci default null,
	tipPlacreated_at timestamp null default current_timestamp,
	tipPlaupdated_at timestamp null default current_timestamp on update current_timestamp,
    primary key (tipPlaId)
);

create table plato (
	plaId int4 not null,
    plaIdTipoPlato int4 not null,
    plaDescripcion varchar(200),
    plaPrecio int4 not null,
	plaEstado tinyint(1) not null default 1,
	plaSesion varchar(20) collate utf8_unicode_ci default null,
	placreated_at timestamp null default current_timestamp,
	plaupdated_at timestamp null default current_timestamp on update current_timestamp,
    primary key (plaId),
    foreign key (plaIdTipoPlato) references tipo_Plato (tipPlaId)
);

create table mesa (
	mesId int4 not null,
    mesNumeroMesa int4 not null,
    mesCantidadComensales int4 not null,
	mesEstado tinyint(1) not null default 1,
	mesSesion varchar(20) collate utf8_unicode_ci default null,
	mesCreated_at tiMestamp null default current_tiMestamp,
	mesUpdated_at tiMestamp null default current_tiMestamp on update current_tiMestamp,
    primary key (mesId)
);

create table menu (
	menId int4 not null,
    menIdPlato int4 not null,
    menObservacion varchar(200) null,
	menEstado tinyint(1) not null default 1,
	menSesion varchar(20) collate utf8_unicode_ci default null,
	menCreated_at tiMestamp null default current_tiMestamp,
	menUpdated_at tiMestamp null default current_tiMestamp on update current_tiMestamp,
    primary key (menId),
    foreign key (menIdPlato) references plato (plaId)
);

create table orden (
	ordId int4 not null,
    ordIdMenu int4 not null,
    ordIdMesa int4 not null,
    ordvalorTotal int4 not null,
	ordEstado tinyint(1) not null default 1,
	ordSesion varchar(20) collate utf8_unicode_ci default null,
	ordCreated_at tiMestamp null default current_tiMestamp,
	ordUpdated_at tiMestamp null default current_tiMestamp on update current_tiMestamp,
    primary key (ordId),
    foreign key (ordIdMenu) references menu (menId),
    foreign key (ordIdMesa) references mesa (mesId)
);

create table factura (
	facId int4 not null,
    facIdOrden int4 not null,
    facIdCodigoMesero int4 not null,
    facNombreCliente varchar(50) null,
	facEstado tinyint(1) not null default 1,
	facSesion varchar(20) collate utf8_unicode_ci default null,
	facCreated_at tiMestamp null default current_tiMestamp,
	facUpdated_at tiMestamp null default current_tiMestamp on update current_tiMestamp,
    primary key (facId),
    foreign key (facIdOrden) references orden (ordId),
    foreign key (facIdCodigoMesero) references codigo_Mesero (codMesId)
);

/* ---------------------------------------------------------------------
COCINEROS
--------------------------------------------------------------------------*/

create table cocinero (
	cocId int4 not null,
    cocIdCocinero int(11) not null,
    cocIdCodigoCocinero int4 not null,
	cocEstado tinyint(1) not null default 1,
	cocSesion varchar(20) collate utf8_unicode_ci default null,
	cocCreated_at tiMestamp null default current_tiMestamp,
	cocUpdated_at tiMestamp null default current_tiMestamp on update current_tiMestamp,   
    primary key (cocId),
    foreign key (cocIdCocinero) references persona (perId)
);

create table cocina (
	cociId int4 not null,
    cociIdCocinero int4 not null,
    cociIdOrden int4 not null,
	cociEstado tinyint(1) not null default 1,
	cociSesion varchar(20) collate utf8_unicode_ci default null,
	cociCreated_at tiMestamp null default current_tiMestamp,
	cociUpdated_at tiMestamp null default current_tiMestamp on update current_tiMestamp,
    primary key (cociId),
    foreign key (cociIdCocinero) references cocinero (cocId),
    foreign key (cociIdOrden) references orden (ordId)
);

create table horario_cocinero (
	horCocId int4 not null,
    horCocIdCocinero int4 not null,
    horCocHoraInicio time not null,
    horCocHoraFin time not null,
    horCocFecha date not null,
	horCocEstado tinyint(1) not null default 1,
	horCocSesion varchar(20) collate utf8_unicode_ci default null,
	horCocCreated_at tiMestamp null default current_tiMestamp,
	horCocUpdated_at tiMestamp null default current_tiMestamp on update current_tiMestamp,
    primary key (horCocId),
    foreign key (horCocIdCocinero) references cocinero (cocId)
);



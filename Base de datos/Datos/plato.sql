use proyecto;
select * from plato;

insert into plato values (1,1,'arroz con pollo y papa a la francesa',12000,1,null,'2021-08-12 8:43:00','2021-08-12 8:44:00');
insert into plato values (2,2,'pechuga a la plancha y arroz blanco',15000,1,null,'2021-08-12 8:47:00', '2021-08-12 8:48:00'),
(3,3,'sopa con pollo papa crioalla y pastusa',9000,1,null,'2021-08-12 8:52:00', '2021-08-12 8:52:00'),
(4,4,'bandeja paisa arroz carne molida platano y huevo',15000,1,null,'2021-08-12 8:55:00', '2021-08-12 8:56:00');

insert into plato values (5,6,'arroz con pollo y papa a la francesa',12000,1,null,'2021-08-12 8:43:00','2021-08-12 8:44:00');
/* ------------------------------------------------------------------------------ */
select pl.plaId, tpl.tipPlaPlato, pl.plaDescripcion ,pl.plaPrecio, pl.plaEstado
from plato pl
join  tipo_plato tpl on pl.plaId = tpl.tipPlaId;
/* -------------------------------- VER DATOS--------------------------- */
select Pl.plaId, Pl.plaDescripcion, Pl.plaPrecio, Pl.plaEstado, Tp.tipPlaPlato
from plato Pl
inner join tipo_plato Tp on Pl.plaIdTipoPlato = Tp.tipPlaId;
/* ----------------------------- ACTUALIZAR ------------------------------ */
update plato set plaDescripcion = 'arroz con pollo y papa a la francesa', plaPrecio = '13000', plaEstado = 0, plaIdTipoPlato = 2 where plaId = 1;
/* -------------------------------- VER DATOS POR ID --------------------------- */
select Pl.plaId, Pl.plaDescripcion, Pl.plaPrecio, Pl.plaEstado, Tp.tipPlaPlato
from plato Pl
inner join tipo_plato Tp on Pl.plaIdTipoPlato = Tp.tipPlaId
where Pl.plaId = 1;
/* ----------------------------- ACTUALIZAR ------------------------------ */

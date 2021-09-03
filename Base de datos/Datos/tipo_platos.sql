use proyecto;
select * from tipo_plato;

insert into tipo_plato values (1,'Arroz con pollo',null,'Manzana','Fresas con crema',
1,null,'2021-06-06 15:02:04','2021-10-09 15:10:14');

insert into tipo_plato values (2,'Pollo en salsa','Papas fritas','Coca Cola','Torta de chocolate',
1,null,'2021-06-06 15:20:40','2021-10-09 15:10:14'),
(3,'Sancocho',null,'Big Colsa','Fresas con crema',
1,null,'2021-06-06 15:20:42','2021-10-09 15:10:14'),
(4,'Bandeja paisa',null,'Sprite','Leche asada',
1,null,'2021-06-06 15:02:44','2021-10-09 15:10:14'),
(5,'Pescado frito','Papa salada','Colombiana','Fresas con crema',
1,null,'2021-03-02 13:02:32','2021-10-09 15:10:14'),
(6,'Arroz con pollo','Platano frito','Manzana','Torta de fresas',
1,null,'2021-07-08 15:02:04','2021-10-09 15:10:14');

/* ------------------------------------------------------------------------ */

select tipPlaId, tipPlaPlato, tipPlaAdicional, tipPlaBebida, tipPlaPostre
from tipo_plato;

/*--------------------------------------------------------------------------*/
select tipPlaId, tipPlaPlato, tipPlaAdicional, tipPlaBebida, tipPlaPostre
from tipo_plato
where tipPlaId = 1;

/* --------------------------------------------------------------------------- */

delete from tipo_plato 
where tipPlaId = 6;

/* ----------------------------------------------------------------------- */
update tipo_plato set tipPlaAdicional = 'Papa Salada' where tipPlaId = 1;
/* ---------------------------------------------------------------- */

UPDATE tipo_plato SET tipPlaPlato ='Arroz con pollo', tipPlaAdicional = 'Papa', tipPlaBebida = 'Manzana',
tipPlaPostre = 'Fresas' WHERE tipPlaId = 1;

insert into tipo_plato (tipPlaId,tipPlaPlato,tipPlaAdicional,tipPlaBebida,tipPlaPostre) values ('Arroz','papa'
,'man','fresas');
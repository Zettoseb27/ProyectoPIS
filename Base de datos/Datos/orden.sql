use proyecto;
select * from orden;

insert into orden values (1,1,1,12000,1,null,'2021-08-12 9:30:00','2021-08-12 9:31:00'),
(2,2,2,15000,1,null,'2021-08-12 9:32:00','2021-08-12 9:33:00'),
(3,3,3,9000,1,null,'2021-08-12 9:37:00','2021-08-12 9:38:00'),
(4,5,4,13000,1,null,'2021-08-12 9:38:00','2021-08-12 9:40:00');

/* ---------------------------- Seleccionar Todo --------------------------- */
select  O.ordId, Ms.mesNumeroMesa, O.ordvalorTotal,
            Mn.menObservacion,
            Pl.plaDescripcion,
            Tp.tipPlaAdicional,Tp.tipPlaBebida,Tp.tipPlaPostre, Tp.tipPlaPlato 
FROM orden O
		inner join mesa Ms on O.ordIdMesa = Ms.mesId 
		inner join menu Mn on O.ordIdMenu = Mn.menId 
		inner join plato Pl on Mn.menIdPlato = Pl.plaId 
		inner join tipo_plato Tp on Pl.plaIdTipoPlato= Tp.tipPlaId;


/* ------------------Borrar seleccionado ------------------------ */

delete  O.ordId, O.ordvalorTotal,
Tp.tipPlaPlato, Tp.tipPlaAdicional, Tp.tipPlaBebida, Tp.tipPlaPostre,
Ms.mesNumeroMesa,
Pl.plaDescripcion
from orden O
join tipo_plato Tp on O.ordId = Tp.tipPlaId
join mesa Ms on O.ordId = Ms.mesId
join plato Pl on O.ordId = Pl.plaId
where ordId = 1;
 SELECT * FROM orden O 
WHERE O.ordId =  1 ;

/* ---------------------------- Actualizar ---------------------------------*/

update orden O
join tipo_plato Tp on  O.tipPlaBebida = Tp.tipPlaId

set Tp.tipPlaBebida = 'lola';

/* ------------------------------------- */

insert into orden values (1,1,1,12000,1,null,'2021-08-12 9:30:00','2021-08-12 9:31:00');

set O.tipPlaBebida = Tp.tipPlaPostre;

/* ----------------Insertar--------------------- */

insert into orden 
values (1,1,1,12000,1,null,'2021-08-12 9:30:00','2021-08-12 9:31:00');

delete from orden
where ordId = 1;

/* ------------------------------ Actualizar --------------------------- */
update orden set ordIdMesa = 3, ordValorTotal = 5000, ordIdMenu = 2 where ordId = 2;

DELETE FROM orden WHERE ordId = 5;
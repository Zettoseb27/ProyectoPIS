use proyecto;
select * from orden;

insert into orden values (1,1,1,12000,1,null,'2021-08-12 9:30:00','2021-08-12 9:31:00'),
(2,2,2,15000,1,null,'2021-08-12 9:32:00','2021-08-12 9:33:00'),
(3,3,3,9000,1,null,'2021-08-12 9:37:00','2021-08-12 9:38:00'),
(4,5,4,13000,1,null,'2021-08-12 9:38:00','2021-08-12 9:40:00');

select  O.ordId,O.ordvalorTotal,Mn.menId,Mn.menObservacion,Ms.mesNumeroMesa,pl.plaDescripcion,
Tp.tipPlaAdicional,Tp.tipPlaBebida,Tp.tipPlaPostre,Tp.tipPlaPlato
from orden O
join menu Mn on O.ordId= menId 
join plato Pl on O.ordId=plaId
join tipo_plato Tp on ordId=tipPlaId
join mesa Ms on O.ordId = Ms.mesId;


select  O.ordId, O.ordvalorTotal,
Tp.tipPlaPlato, Tp.tipPlaAdicional, Tp.tipPlaBebida, Tp.tipPlaPostre,
Ms.mesNumeroMesa,
Pl.plaDescripcion
from orden O
join tipo_plato Tp on ordId = Tp.tipPlaId
join mesa Ms on O.ordId = Ms.mesId
join plato Pl on ordId = Pl.plaId;

 SELECT * FROM orden O 
WHERE O.ordId =  1 ;

insert into orden values (1,1,1,12000,1,null,'2021-08-12 9:30:00','2021-08-12 9:31:00');
delete from orden
where ordId = 1;

update orden set ordvalorTotal = 21000 where ordId = 1;
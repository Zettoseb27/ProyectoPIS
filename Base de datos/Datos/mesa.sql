use proyecto;
select * from mesa;

insert into mesa values (1,1,4,1,'Afan','2021-08-11 22:01:00','2021-08-11 22:01:00'),
(2,2,6,1,null,'2021-08-11 22:01:00','2021-08-11 22:01:00'),
(3,3,1,1,null,'2021-08-11 22:01:00','2021-08-11 22:01:00'),
(4,4,2,1,null,'2021-08-11 22:01:00','2021-08-11 22:01:00'),
(5,5,8,1,null,'2021-08-11 22:01:00','2021-08-11 22:01:00');

select mesId, mesNumeroMesa, mesCantidadComensales, mesCreated_at
from mesa ;
 /* ----------------------------------------------------------------- */
update mesa set mesNumeroMesa=´$NumeroMesa', mesCantidadComensales ='$CantidadComensales',
 mesEstado='$Estado', where mesId='$2'"; 
 
select mesId, mesNumeroMesa, mesCantidadComensales, mesCreated_at
from mesa 
where mesId = 5;

/* ------------------------------------------------------------------ */

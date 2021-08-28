use proyecto;

select * from cocinero ;
insert into cocinero values (2,2,1234,0,null,'2018-06-06 15:02:04','2021-08-17 09:36:31'),
(3,3,1234,0,null,'2018-06-06 15:02:04','2021-08-17 09:36:31'),
(4,4,1234,0,null,'2018-06-06 15:02:04','2021-08-17 09:36:31'),
(2,5,1234,0,null,'2018-06-06 15:02:04','2021-08-17 09:36:31');
/* ---------------------------------------------------------------------- */
select cocId, cocIdCodigoCocinero, cocCreated_at
from cocinero ;
/* ---------------------------------------------------- */
select cocId, cocIdCodigoCocinero, cocCreated_at
from cocinero 
where cocId = 1;

select cocId, cocIdCocinero, cocIdCodigoCocinero, cocEstado
from cocinero;

/* ------------------------ */
update cocinero set CodigoCocinero= 123455 where cocId=2;
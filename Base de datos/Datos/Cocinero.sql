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
select cocId, cocIdCodigoCocinero, cocCreated_at,
perNombre,perApellido
from cocinero C
inner join persona P on C.cocIdCocinero = P.perId
where cocId = 2;

select cocId, cocIdCocinero, cocIdCodigoCocinero, cocEstado
from cocinero;

/* ------------------------ */
update cocinero set CodigoCocinero= 123455 where cocId=2;

delete from cocinero where cocId = 5;

SET FOREIGN_KEY_CHECKS=0;
SET FOREIGN_KEY_CHECKS=1;

SELECT * FROM cocinero 
            WHERE cocId = 1;
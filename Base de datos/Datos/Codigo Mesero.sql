use proyecto;
select * from codigo_mesero;
insert into codigo_mesero values (1,1,2202150,1,null,'2021-08-13 4:37:00','2021-08-13 4:38:05'),
(2,2,2202151,1,null,'2021-08-13 4:37:00','2021-08-13 4:38:05'),
(3,3,3202162,1,null,'2021-08-13 4:37:00','2021-08-13 4:38:05'),
(4,4,4202173,1,null,'2021-08-13 4:37:00','2021-08-13 4:38:05'),
(5,5,5202184,1,null,'2021-08-13 4:37:00','2021-08-13 4:38:05'),
(6,6,6202195,1,null,'2021-08-13 4:37:00','2021-08-13 4:38:05'),
(7,7,7202116,1,null,'2021-08-13 4:37:00','2021-08-13 4:38:05'); 
/* -------------------------------------------------------------- */
select codMesId, codMesCodigoMesero,codMescreated_at
from codigo_mesero;
/* -------------------------------------------------------------- */
select codMesId, codMesCodigoMesero,codMescreated_at
from codigo_mesero
where codMesId = 7;

/* ----------------------------------------------------------- */
select codMesId, codMesCodigoMesero,
	P.perNombre, P.perApellido, P.perDocumento
from codigo_mesero Cm
inner join persona P on Cm.codMesIdMesero = P.perId;
where codMesId = 1; 

/* ------------------ ACTUALIZAR -----------------------*/
update codigo_mesero set codMesIdMesero = 1, codMesEstado = 1, codMesCodigoMesero = 111233 where codMesId = 1;

SELECT * FROM codigo_mesero WHERE codMesId = 1;

/* ------------------- ELIMINAR -------------*/
SET FOREIGN_KEY_CHECKS=0;
delete from codigo_mesero where codMesId = 8;
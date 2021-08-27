use proyecto;
select * from factura;
insert into factura values (1,1,2,'Daniel Cano',1,null,'2021-08-13 4:37:00','2021-08-13 4:38:05'),
(2,2,3,'Sebastina Rivera',1,null,'2021-08-13 4:38:00','2021-08-13 4:38:05'),
(3,3,4,'Camili Casanova',1,null,'2021-08-13 4:39:00','2021-08-13 4:38:05'),
(4,4,2,'Valentina Cano',1,null,'2021-08-13 4:40:00','2021-08-13 4:38:05'),
(5,5,3,'Andrea Cano',1,null,'2021-08-13 4:41:00','2021-08-13 4:38:05');

select fa.facId,fa.facNombreCliente,fa.facIdOrden,cm.codMesCodigoMesero
from factura fa
join codigo_mesero cm on fa.facId = cm.codMesId; 
/*-------------------- CONSULTAR POR ID --------------------------*/
select fa.facId,fa.facNombreCliente,fa.facIdOrden,cm.codMesCodigoMesero
from factura fa
join codigo_mesero cm on fa.facId = cm.codMesId
where fa.facId = 2; 

delete from factura where facId = 5;

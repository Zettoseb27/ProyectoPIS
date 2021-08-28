use proyecto;
select * from horario_cocinero; 

insert into horario_cocinero values (2,2,'12:45:00','03:00:00','2021-08-26',1,null,'2019-11-19 18:38:40','2019-11-19 18:38:40');
/* ------------------------------------------------- */
select hc.horCocId, co.cocIdCodigoCocinero, hc.horCocHoraInicio, hc.horCocHoraFin, hc.horCocFecha
from horario_cocinero hc
join cocinero co on hc.horCocId = co.cocId ;
/* --------------------------------------- Buscar Dato -----------------------*/
select hc.horCocId, co.cocIdCodigoCocinero, hc.horCocHoraInicio, hc.horCocHoraFin, hc.horCocFecha
from horario_cocinero hc
join cocinero co on hc.horCocId = co.cocId 
where hc.horCocId = 3;
/* --------------------------------------------------- */
select horCocId, horCocHoraInicio, horCocHoraFin, horCocFecha
from horario_cocinero
where horCocId = 1;
select * from horario_cocinero; 
/* ------------------------------------------------- */
select horCocId, horCocHoraInicio, horCocHoraFin, horCocFecha
from horario_cocinero ;
/* --------------------------------------------------- */
select horCocId, horCocHoraInicio, horCocHoraFin, horCocFecha
from horario_cocinero 
where horCocId = 1;
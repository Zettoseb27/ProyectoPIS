use proyecto; 
select * from horario;
/* ---------------------------------------------------------- */
insert into horario values 
(1,5,'7:00','2:00','2021-08-17',null,1,null,'2021-08-17 5:31:00','2021-08-17 5:31:00'),
(2,6,'7:15','2:15','2021-08-17','Sele descontara',1,null,'2021-08-17 5:31:00','2021-08-17 5:31:00'),
(3,7,'7:30','2:00','2021-08-17',null,1,null,'2021-08-17 5:31:00','2021-08-17 5:31:00');

/* ----------------- VER CODIGO MESERO ---------------------- */
select hr.horId,hr.horHoraFin,hr.horFecha,
	cm.codMesCodigoMesero,hr.horHoraInicio,
    p.perNombre, p.perApellido
from horario hr 
inner join codigo_mesero cm on hr.horIdCodigoMesero = cm.codMesId
inner join persona p on cm.codMesIdMesero = p.perId;

/* ----------------- ACTUALIZAR --------------------------- */

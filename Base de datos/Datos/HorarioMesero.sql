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
update horario set horIdCodigoMesero = 1, horHoraInicio = '8:00', horHoraFin = '2:00', horEstado = 0 where horId = 1;

UPDATE horario SET horIdCodigoMesero = 2, horHoraInicio = '9:00' , horHoraFin = '3:00' , horEstado = 1 WHERE horId = 1;


select hr.horId,hr.horHoraFin,hr.horFecha,
                cm.codMesCodigoMesero,hr.horHoraInicio,
                p.perNombre, p.perApellido
            from horario hr 
            inner join codigo_mesero cm on hr.horIdCodigoMesero = cm.codMesId
            inner join persona p on cm.codMesIdMesero = p.perId
                where hr.horId = 5;
                
INSERT INTO horario (horId,horIdCodigoMesero,horHoraInicio,horHoraFin,horFecha,horObservacion) VALUES 
(6,4,'8:00:00','2:00:00','2021-08-17','Se le descontara de las vacaciones por tonto');

INSERT INTO horario (horId,horIdCodigoMesero,horHoraInicio,horHoraFin,horObservacion) VALUES 
(6,4,'8:00:00','2:00:00','Se le descontara de las vacaciones por tonto');



delete from horario where horId = 6;
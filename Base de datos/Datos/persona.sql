use proyecto;
SELECT * FROM persona;
insert INTO `persona` (`perId`, `perDocumento`, `perNombre`, `perApellido`, `perEstado`, `perUsuSesion`, `per_created_at`, `per_updated_at`, `usuario_s_usuId`) VALUES
	(1, '8888888', 'has', 'gs', 1, NULL, '2018-06-06 15:02:04', '2018-10-09 21:10:14', 1),
	(2, '5555555', 'has', 'gs', 1, NULL, '2018-06-06 15:02:04', '2018-10-09 21:10:14', 2),
	(3, '123456789', 'Hprueba', 'Gprueba', 1, NULL, '2018-06-08 15:17:07', '2018-06-08 15:17:07', 3),
	(4, '7944444', 'henry', 'garzon', 1, NULL, '2019-06-06 21:25:08', '2019-06-06 21:25:08', 4),
	(5, '1234', 'Henry', 'garzon', 1, NULL, '2019-06-07 02:13:12', '2019-06-07 02:13:12', 5),
	(6, '12345', 'Henry', 'garzon', 1, NULL, '2019-06-07 02:19:06', '2019-06-07 02:19:06', 6),
	(7, '51879458', 'Ana', 'Sanchez', 1, NULL, '2019-06-07 17:41:59', '2019-06-07 17:41:59', 7),
	(8, '987654', 'jose', 'maria', 1, NULL, '2019-06-07 19:38:40', '2019-06-07 19:38:40', 8),
	(9, '666555', 'JUAN', 'PEREZ', 1, NULL, '2019-06-13 13:45:28', '2019-06-13 13:46:12', 9),
	(10, '98765499', 'Carolina', 'Neira', 1, NULL, '2019-11-19 18:38:40', '2019-11-19 18:38:40', 10);
    
    
    select perId ,perDocumento, perNombre, perApellido, per_created_at
    from persona ;
    
/* ------------------------------------------------------------------------------- */
    
select perId ,perDocumento, perNombre, perApellido, per_created_at
from persona
where perId = 1 ;

SELECT * FROM persona  WHERE perId = 1;
SET FOREIGN_KEY_CHECKS=0;
SET FOREIGN_KEY_CHECKS=1;
delete from persona where perId = 8;

update persona set  perDocumento = '1.001.195.961', perNombre = 'Santiago', perApellido = 'Arevalo Beltran' where perId = 6;
delete from persona where perId = 5;
use proyecto;

select * from usuario_s_roles;

insert into usuario_s_roles values (1,1,'2021-08-13 7:56',1,null,'2021-08-13 7:56','2021-08-20 8:36'),
(2,2,'2021-08-13 7:57',1,null,'2021-08-13 7:56','2021-08-20 8:36'),
(3,3,'2021-08-13 7:59',1,null,'2021-08-13 8:02','2021-08-22 12:36'),
(4,4,'2021-08-13 8:06',1,null,'2021-08-13 8:10','2021-08-15 13:36');

INSERT INTO usuario_s_roles VALUES
	(5, 5,  '2019-10-29 18:52:00', 1, NULL, '2019-10-29 18:52:00', '2019-10-29 18:52:00'),
	(6, 6,  '2019-10-29 18:51:41', 1, NULL, '2019-10-29 18:51:41', '2019-10-29 18:51:41'),
	(7, 7,  '2019-10-29 18:52:17', 1, NULL, '2019-10-29 18:52:17', '2019-10-29 18:52:17'),
	(8, 8, '2019-11-19 18:38:40', 1, NULL, '2019-11-19 18:38:40', '2019-11-19 18:38:40');

/* ------------------------------------------------------------------------------- */

select id_usuario_s,Ur.estado,Ur.fechaUserRol,Rl.rolNombre,Rl.rolDescripcion,Us.usuLogin
from usuario_s_roles Ur 
join usuario_s Us on Ur.id_usuario_s = Us.usuId
join rol Rl on  Ur.id_usuario_s = Rl.rolId
where id_usuario_s = 1 
order by id_usuario_s ASC;

/* ---------------------------------------------------------------------------------- */

select * from usuario_s_roles Ur
where Ur.id_usuario_s = 4;

/* -----------------------------------------------------------------------------------------*/

delete from usuario_s_roles Ur
where Ur.id_usuario_s = 8;
/* ---------------------------------------------------------------------------------------- */

update usuario_s_roles set usuRolUsuSesion = 1 where id_usuario_s = 2;
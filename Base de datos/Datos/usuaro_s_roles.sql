use proyecto;

select * from usuario_s_roles;

insert into usuario_s_roles values (1,1,'2021-08-13 7:56',1,null,'2021-08-13 7:56','2021-08-20 8:36'),
(2,2,'2021-08-13 7:57',1,null,'2021-08-13 7:56','2021-08-20 8:36'),
(3,3,'2021-08-13 7:59',1,null,'2021-08-13 8:02','2021-08-22 12:36'),
(4,4,'2021-08-13 8:06',1,null,'2021-08-13 8:10','2021-08-15 13:36');

select Ur.estado,Ur.fechaUserRol,Rl.rolNombre,Rl.rolDescripcion,Us.usuLogin
from usuario_s_roles Ur
join usuario_s Us
join rol Rl;

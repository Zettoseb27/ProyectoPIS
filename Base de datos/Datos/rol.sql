<<<<<<< HEAD
use proyecto
=======
use proyecto;
>>>>>>> develop
select * from rol;

insert into rol values (1,'cocinero','encargo de la preparacion de los platos',1,null,'21-08-12 9:21:00', '21-08-12 9:22:00'),
(2,'mesero','encargado de llevar los platos a la mesa',1,null,'21-08-12 9:25:00','21-08-12 9:26:00'),
(3,'lava platos','encargado del orden de la cocina',1,null,'21-08-12 9:29:00','21-08-12 9:29:00'),
(4,'provedor','suministra los protuctos para el restaurante',1,null,'21-08-12 9:32:00','21-08-12 9:33:00');

INSERT INTO rol VALUES
(5, 'Administrador', 'Administrador', 1, NULL, '2019-06-07 10:18:36', '2019-06-07 10:18:36'),
(6, 'Operario', 'Operario', 1, NULL, '2019-06-07 10:18:57', '2019-06-07 10:18:57'),
(7, 'Cliente', 'Cliente', 1, NULL, '2019-06-07 10:19:16', '2019-06-07 10:19:16'),
(8, 'Vendedor', 'Vendedor', 1, NULL, '2019-06-07 10:19:35', '2019-06-07 10:19:35'),
(9, 'Almacenista', 'Almacenista', 1, NULL, '2019-06-07 10:20:42', '2019-06-07 10:20:42');
    
select rolId, rolNombre, rolDescripcion, rol_created_at
from rol;
/* ---------------------------------------------- */
select rolId, rolNombre, rolDescripcion, rol_created_at
from rol where rolId = 1;

/* ------------------------------------------------ */
delete from rol 
where rolId = 3;
use proyecto;
SELECT * FROM usuario_s;

insert into usuario_s values (1,'zettoseb27@gmail.com','123456','null',1,'','2018-05-29 11:48:38', '2018-06-08 15:18:53'),
(2,'fren124@gmail.com','f123456','null',1,'','2018-05-29 11:48:38', '2018-06-08 15:18:53'),
(3,'cvenus66@gmail.com','c123456','null',1,'','2018-05-29 11:48:38', '2018-06-08 15:18:53'),
(4,'medejo@gmail.com','m123456','null',1,'','2018-05-29 11:48:38', '2018-06-08 15:18:53');



INSERT INTO `usuario_s` (`usuId`, `usuLogin`, `usuPassword`, `usuUsuSesion`, `usuEstado`, `usuRemember_token`, `usu_created_at`, `usu_updated_at`) VALUES
	(5, 'adminHAGS@si.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2018-05-29 11:48:38', '2018-06-08 15:18:53'),
	(6, 'ha@gs.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2018-06-06 15:02:04', '2018-06-06 15:02:04'),
	(7, 'hgprueba@si.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2018-06-08 15:17:07', '2018-06-08 15:17:07'),
	(8, 'halgarjr@gmail.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2019-06-06 21:25:08', '2019-06-06 21:25:08'),
	(9, 'halgarjr1@gmail.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2019-06-07 02:13:12', '2019-06-07 02:13:12'),
	(10, 'halgarjr3@gmail.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2019-06-07 02:19:06', '2019-06-07 02:19:06'),
	(11, 'notengo@no.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2019-06-07 17:41:59', '2019-06-07 17:41:59'),
	(12, 'jm@lk.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2019-06-07 19:38:40', '2019-06-07 19:38:40'),
	(13, 'huawei@juan.uei', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2019-06-13 13:45:27', '2019-06-13 13:45:27'),
	(14, 'cn@cn.com', 'd9840773233fa6b19fde8caf765402f5', NULL, 1, '', '2019-11-19 18:38:40', '2019-11-19 19:42:41');


SELECT * FROM usuario_s;
select usuId, usuLogin, usu_created_at
from usuario_s;

/* --------------------------- */
SELECT * FROM usuario_s;
select usuId, usuLogin, usu_created_at
from usuario_s
where usuId = 1;

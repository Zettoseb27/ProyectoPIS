select * from menu;

insert into menu values (1,1,'Comida muy caliente',1,null,'2021-08-12 9:22:00','2021-08-12 9:23:00'),
(2,2,'Bajo de sal',1,null,'2021-08-12 9:23:00','2021-08-12 9:24:00'),
(3,3,'Muy salado',1,null,'2021-08-12 9:24:00','2021-08-12 9:25:00'),
(5,4,'Sin frigoles',1,null,'2021-08-12 9:25:00','2021-08-12 9:24:00');

insert into menu values (6,5,'Comida muy caliente',1,null,'2021-08-12 10:22:00','2021-08-12 11:23:00');
/* -------------------------------------------------------------------- */
select me.menId, tp.tipPlaPlato ,me.menObservacion,tp.tipPlaAdicional,
tp.tipPlaPostre, me.menEstado
from menu me
join tipo_plato tp on me.menId = tp.tipPlaId;
/* --------------------------------------------------------------------- */
select menId,menObservacion,menEstado,menCreated_at
from menu 
where menId = 1 ;

/* ----------------------------------------------------------------------- */
delete from menu Mn where Mn.menId = 1;

/*-------------------------------------------------------------------------- */ 
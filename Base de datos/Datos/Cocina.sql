use proyecto;
select * from cocina;


/* ------------------------------------------------------- */

select Co.cociId, Co.cociEstado, Co.cociIdOrden, Mn.menObservacion, Tp.tipPlaPlato,
Pl.plaPrecio, Tp.tipPlaPostre,Tp.tipPlaBebida, tipPlaAdicional
from cocina Co
join menu Mn on Co.cociIdOrden= menId
join tipo_plato Tp on Co.cociIdOrden = tipPlaId
join plato Pl on Co.cociIdOrden = plaId;

/* ----------------------------------------------------------------------*/
select Co.cociId, 
Me.mesNumeroMesa,
Tp.tipPlaPlato,Tp.tipPlaAdicional,Tp.tipPlaPostre
from cocina Co
inner join mesa Me on cociId = mesId
inner join tipo_plato Tp on cociId = tipPlaId
where Co.cociId = 2;

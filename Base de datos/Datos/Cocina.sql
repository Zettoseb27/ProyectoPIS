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
Tp.tipPlaPlato,Tp.tipPlaAdicional,Tp.tipPlaPostre,
Mn.menObservacion
from cocina Co
join mesa Me on cociId = mesId
join tipo_plato Tp on cociId = tipPlaId
join menu Mn on ordId = menId;
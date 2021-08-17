select * from cocina;

/* ------------------------------------------------------- */

select Co.cociId, Co.cociEstado, Co.cociIdOrden, Mn.menObservacion, Tp.tipPlaPlato,
Pl.plaPrecio, Tp.tipPlaPostre,Tp.tipPlaBebida, tipPlaAdicional
from cocina Co
join menu Mn on Co.cociIdOrden= menId
join tipo_plato Tp on Co.cociIdOrden = tipPlaId
join plato Pl on Co.cociIdOrden = plaId;
use proyecto;
select * from factura;
insert into factura values (1,1,2,'Daniel Cano',1,null,'2021-08-13 4:37:00','2021-08-13 4:38:05'),
(2,2,3,'Sebastina Rivera',1,null,'2021-08-13 4:38:00','2021-08-13 4:38:05'),
(3,3,4,'Camili Casanova',1,null,'2021-08-13 4:39:00','2021-08-13 4:38:05'),
(4,4,2,'Valentina Cano',1,null,'2021-08-13 4:40:00','2021-08-13 4:38:05'),
(5,5,3,'Andrea Cano',1,null,'2021-08-13 4:41:00','2021-08-13 4:38:05');

select  fa.facId,fa.facNombreCliente,fa.facIdOrden,
		cm.codMesCodigoMesero,
        O.ordvalorTotal,
        Tp.tipPlaAdicional,Tp.tipPlaBebida,Tp.tipPlaPostre, Tp.tipPlaPlato
from factura fa
inner join codigo_mesero cm on fa.facIdCodigoMesero = cm.codMesId
inner join orden O on fa.facIdOrden = O.ordId
inner join menu Mn on O.ordIdMenu = Mn.menId 
		inner join plato Pl on Mn.menIdPlato = Pl.plaId 
		inner join tipo_plato Tp on Pl.plaIdTipoPlato= Tp.tipPlaId;
/*-------------------- CONSULTAR POR ID --------------------------*/
select  fa.facId,fa.facNombreCliente,fa.facIdOrden,
		cm.codMesCodigoMesero,
        O.ordvalorTotal,
        Tp.tipPlaAdicional,Tp.tipPlaBebida,Tp.tipPlaPostre, Tp.tipPlaPlato
from factura fa
inner join codigo_mesero cm on fa.facIdCodigoMesero = cm.codMesId
inner join orden O on fa.facIdOrden = O.ordId
inner join menu Mn on O.ordIdMenu = Mn.menId 
		inner join plato Pl on Mn.menIdPlato = Pl.plaId 
		inner join tipo_plato Tp on Pl.plaIdTipoPlato= Tp.tipPlaId
        where facId = 1;
/* ------------------------------------------------------------------ */
	delete from factura where facId = 5;

SELECT * FROM gymhc.cita where tipo = 'funcional' and estado = 'pendiente' and fecha between 
concat(CURDATE(), ' 00:00:00') and concat(CURDATE(), ' 23:59:59')
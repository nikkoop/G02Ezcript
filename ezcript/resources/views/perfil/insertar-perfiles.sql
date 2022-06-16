insert into rol( rol_nombre, rol_descripcion ) values( 'Alumno', '' );

insert into usuario (
	pef_rut,
    rol_id,
    pef_nombre,
    pef_apellido_paterno,
    pef_apellido_materno,
    pef_correo,
    pef_contrasena,
    pef_pagina_web,
    pef_descripcion,
    pef_foto,
    pef_telefono
) values (
	'20.196.392-3',
    1,
    'Santiago',
    'Villablanca',
    'Oliva',
    'santiago.villablanca1801@alumnos.ubiobio.cl',
    'contrasena123',
    'No tiene',
    'No tiene',
    'No tiene',
    'No tiene'
)
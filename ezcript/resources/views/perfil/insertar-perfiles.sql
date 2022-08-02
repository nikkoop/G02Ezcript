insert into rol( rol_nombre, rol_descripcion ) values( 'Alumno', '' );
insert into rol( rol_nombre, rol_descripcion ) values( 'Profesor', '' );

insert into usuario (
	pef_rut,
    rol_id,
    pef_nombre,
    pef_correo,
    pef_contrasena,
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
    'uploads/X1BhoCCjOcyKEIKXJ6QSL6e7uyHOuuI7QUnZx4N8.png',
    'No tiene'
)
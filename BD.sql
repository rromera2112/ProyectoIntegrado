Create Database izv;
use izv;
create table alumnos (
    DNI_Alumno char(9) not null,
    nombre varchar(30),
    apellidos varchar(50),
    fecha_nacimiento date,
    primary key (DNI_Alumno)
);
create table profesores (
    DNI_Profesor char(9) not null,
    nombre varchar(30),
    apellidos varchar(50),
    direccion varchar(50),
    telefono char(9),
    primary key (DNI_Profesor)
);
create table asignaturas (
    IdAsignatura int not null AUTO_INCREMENT,
    DNI_Profesor char(9),
    nombre varchar(50),
    primary key (IdAsignatura)
);
create table cursos (
    IdCurso int AUTO_INCREMENT,
    IdAsignatura int,
    DNI_Alumno char(9),
    nota int,
    primary key (IdCurso),
    foreign key (IdAsignatura) references asignaturas(IdAsignatura),
    foreign key (DNI_Alumno) references alumnos(DNI_Alumno)
);

insert into alumnos (DNI_Alumno, nombre, apellidos, fecha_nacimiento) values 
    ('00000001A','Rafael','Romera Navarro','200-12-21'),
    ('00000002A','Alexis','González Romero','1992-09-1'),
    ('00000003A','Victor Manuel','González Padial','2001-06-06'),
    ('00000004A','Jose Luis','Exposito Lopera','2001-04-19'),
    ('00000005A','Daniel','Haro Álvarez','2001-11-2001');

insert into profesores (DNI_Profesor, nombre, apellidos, direccion,telefono) values
    ('00000006A','Jaime','Fernández Ortega','Calle Sevilla Nº 05, Granada, España','1960-09-12'),
    ('00000007A','Aurora','Pleguezuelos Sierra','Calle Buenos Aires Nº 29, Granada, España','1978-08-05'),
    ('00000008A','Eduardo','García Robles','Calle las Flores Nº 06, Granada, España','1968-06-14'),
    ('00000009A','Pedro','Fernández Bosh','Calle Tejeiro Nº 08, Granada, España','1985-11-07'),
    ('00000010A','María Lourdes','García Gualda','Calle Tibonidas Nº19, Granada, España','1971-07-11');

insert into asignaturas(DNI_Profesor,nombre) values
    ('00000010A','Matemáticas 1ºESO'),
    ('00000010A','Matemáticas 2ºESO'),
    ('00000010A','Matemáticas 3ºESO'),
    ('00000010A','Matemáticas 4ºESO'),
    ('00000009A','Lengua 1ºESO'),
    ('00000009A','Lengua 2ºESO'),
    ('00000009A','Lengua 3ºESO'),
    ('00000009A','Lengua 4ºESO'),
    ('00000008A','Música 1ºESO'),
    ('00000008A','Música 2ºESO'),
    ('00000008A','Música 3ºESO'),
    ('00000008A','Música 4ºESO'),
    ('00000007A','Educación Física 1ºESO'),
    ('00000007A','Educación Física 2ºESO'),
    ('00000007A','Educación Física 3ºESO'),
    ('00000007A','Educación Física 4ºESO'),
    ('00000006A','Sociales 1ºESO'),
    ('00000006A','Sociales 2ºESO'),
    ('00000006A','Sociales 3ºESO'),
    ('00000006A','Sociales 4ºESO');

insert into cursos (IdAsignatura, DNI_Alumno, nota) values
    (1,'00000001A','10'),
    (5,'00000001A','10'),
    (9,'00000001A','10'),
    (13,'00000001A','10'),
    (17,'00000001A','10'),
    (1,'00000002A','8'),
    (5,'00000002A','8'),
    (9,'00000002A','8'),
    (13,'00000002A','8'),
    (17,'00000002A','8'),
    (2,'00000003A','5'),
    (6,'00000003A','5'),
    (10,'00000003A','5'),
    (14,'00000003A','5'),
    (18,'00000003A','5'),
    (3,'00000004A','6'),
    (7,'00000004A','7'),
    (11,'00000004A','8'),
    (15,'00000004A','9'),
    (19,'00000004A','10'),
    (4,'00000005A','6'),
    (8,'00000005A','7'),
    (12,'00000005A','8'),
    (16,'00000005A','9'),
    (20,'00000005A','10');
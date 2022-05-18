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
    nombre vachar(30),
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
    nombre varchar(30),
    nota int,
    primary key (IdCurso),
    foreign key (IdAsignatura) references asignaturas(IdAsignatura),
    foreign key (DNI_Alumno) references alumnos(DNI_Alumno)
);
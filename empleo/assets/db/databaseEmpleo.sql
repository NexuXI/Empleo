
create database if not exists empleo;
use empleo;

create table if not exists candidatos(
	id int primary key auto_increment,
    nombre varchar(100) not null, 
    apellidos varchar(255) not null,
    tlf varchar(25) not null,
    email varchar(255) not null,
    clave varchar(255) not null,
    imagen varchar(255),
    curriculum varchar(255),
    activo int default 0,
    hash varchar(32),
    comunidad enum(
		"Andalucía",
        "Aragón",
        "Islas Baleares",
        "Canarias",
        "Cantabria",
        "Castilla-La Mancha",
        "Castilla y León",
        "Cataluña",
        "Comunidad de Madrid",
        "Comunidad Foral de Navarra",
        "Comunidad Valenciana",
        "Extremadura",
        "Galicia",
        "País Vasco",
        "Principado de Asturias",
        "Región de Murcia",
        "La Rioja",
        "Ceuta",
        "Melilla"
    )
);

create table if not exists Empresa(
	id int primary key auto_increment,
    nombre varchar(255) not null,
    direccion varchar(255),
    tlf varchar(25) not null, 
    email varchar(255) not null,
    activo int default 0,
    hash varchar(32),
    clave varchar(255) not null,
	imagen varchar(255)
);


create table if not exists CandidaturasCandidato(
	id int primary key auto_increment,
    idCandidato int,
    idOferta int,
    estadoCandidatura enum(
        "inscrito",
        "pendiente",
        "aprobado",
        "rechazado"
    ),
    fechaCandidatura date
);


create table if not exists OfertasEmpleo(
	id int primary key auto_increment,
    img varchar(255),
    nombre varchar(255) not null,
    descripcion varchar(255) not null,
    requisitos varchar(255),
    salario varchar(255),
    estadoOferta enum(
		"Abierta",
        "Cerrada"
    ),
    comunidad enum(
		"Andalucía",
        "Aragón",
        "Islas Baleares",
        "Canarias",
        "Cantabria",
        "Castilla-La Mancha",
        "Castilla y León",
        "Cataluña",
        "Comunidad de Madrid",
        "Comunidad Foral de Navarra",
        "Comunidad Valenciana",
        "Extremadura",
        "Galicia",
        "País Vasco",
        "Principado de Asturias",
        "Región de Murcia",
        "La Rioja",
        "Ceuta",
        "Melilla"
    ),
    ciudad varchar(255) not null,
    idEmpresa int not null,
    fecha date,
    constraint foreign key(idEmpresa) references Empresa (id)
);

select * from candidatos;

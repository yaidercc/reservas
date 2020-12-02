CREATE DATABASE Reservas_Staff_bd;
USE Reservas_Staff_bd;

CREATE TABLE cargos (
	cod_cargo int not null auto_increment primary key,
    nombre_cargo varchar(60) not null
)ENGINE=InnoDB;

CREATE TABLE modulos(
	cod_modulo int not null auto_increment primary key,
    ubicacion varchar(60) not null
)ENGINE=InnoDB;

CREATE TABLE tipo_usuarios(
	cod_tipo int not null auto_increment primary key,
    nombre varchar(10)
)ENGINE=InnoDB;

CREATE TABLE empleados (
	cedula int (11) not null primary key,
    primer_nombre varchar (30),
    segundo_nombre varchar(30),
    primer_apellido varchar(30),
	segunto_apellido varchar(30),
    cod_cargo_fk int not null,
    foreign key (cod_cargo_fk) references cargos(cod_cargo),
    cod_tipo_fk int not null,
    foreign key (cod_tipo_fk) references tipo_usuarios(cod_tipo)
)ENGINE=InnoDB;

CREATE TABLE reservas (
	cod_reserva int not null auto_increment primary key,
    cod_modulo_fk int not null,
    foreign key (cod_modulo_fk) references modulos(cod_modulo),
    cedula_fk int not null,
    foreign key (cedula_fk) references empleados(cedula)
)ENGINE=InnoDB;


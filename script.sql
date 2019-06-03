 -- drop  database tp_pw;
create database tp_pw;
use tp_pw;
create table usuario(
id int auto_increment,
nombre varchar(25),
apellido varchar(25),
sexo varchar(25),
cuil integer,
nick varchar(25),
pass varchar(40),
email varchar(60),
rol varchar(25),
calle varchar(25),
altura integer,
localidad varchar(30),
estado varchar(20),
primary key (id)
);
--  para las claves sha1 de debe de ser varchar de 40 y anteponer sha1('clave'), esto hace que la clave sea codificada
insert into usuario (nick,pass,email,rol) values('admin',sha1('admin'),'alumno@alumno.com','admin');
insert into usuario(nick,pass,rol) values ('normal',sha1('normal'),'normal');
-- select * from usuario where pass=sha1('alumno');
-- select count(*) from usuario where nick='alumno' and pass=sha1('alumno');
create table item(
-- items a la venta o publicado por el usuario
id int auto_increment,
id_usuario int,
nombre varchar(30),
descripcion varchar(150),
categoria varchar(25), -- categoria , revisar si es solo una o varias a la vez
estado varchar(25), -- indicara activo, finalizado , pausado
precio double,
-- decidir si se va a subir a la carpeta del servidor o a la base de datos
-- si es asi cambia el tipo , se probara con una sola imagen y despues se cargaran las 10 
primary key (id),
foreign key (id_usuario) references usuario(id)
-- hace referencia a la id del usuario 
);

create table item_compra(
id_transaccion int auto_increment,
id_usuario int,
id_item int,
cantidad int,
fecha date,
primary key (id_transaccion),
foreign key (id_usuario) references usuario(id),
foreign key (id_item) references item(id)
);

create table imagen_item(
-- imagenes a la venta o publicado por el usuario por cada item
id int auto_increment,
imagen  blob NOT NULL,
principal bit NOT NULL,
id_item int NOT NULL,

primary key (id),
foreign key (id) references item(id)
-- hace referencia a la id del item
);

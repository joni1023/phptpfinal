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
primary key (id)
);
--  para las claves sha1 de debe de ser varchar de 40 y anteponer sha1('clave'), esto hace que la clave sea codificada
insert into usuario (nick,pass,email) values('admin',sha1('admin'),'alumno@alumno.com');
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
imagen varchar(30),  
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
)
-- faltarian los insert , pero hay que tener claros algunos puntos q todavia no tengo

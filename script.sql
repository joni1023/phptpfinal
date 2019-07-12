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
latitud double,
longitud double,
primary key (id)
);
--  para las claves sha1 de debe de ser varchar de 40 y anteponer sha1('clave'), esto hace que la clave sea codificada
insert into usuario (nombre,apellido,sexo,cuil,nick,pass,email,rol,calle,altura,localidad,estado,latitud,longitud) values('administrador','administrador','hombre','20223211231','admin',sha1('admin'),'alumno@alumno.com','admin','Avenida de Mayo','2222','Ramos Mejia','desbloqueado','-34.663649787755','-58.561294879592');
insert into usuario (nombre,apellido,sexo,cuil,nick,pass,email,rol,calle,altura,localidad,estado,latitud,longitud) values('normal','normal','hombre','20223211231','normal',sha1('normal'),'alumno@alumno.com','normal','Avenida de Mayo','2222','Ramos Mejia','desbloqueado','-34.663649787755','-58.561294879592');

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
vencimiento date,
tipo_entrega varchar(25), 
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

create table carrito(
id int auto_increment,
id_usuario int,
id_item int,
cantidad int,
primary key (id)
);
create table imagen_item(
-- imagenes a la venta o publicado por el usuario por cada item
id int auto_increment,
imagen  blob NOT NULL,
principal bit NOT NULL,
id_item int NOT NULL,
primary key (id),
foreign key (id_item) references item(id)
-- hace referencia a la id del item
);

create table mensaje (
id int auto_increment,
id_item int,
remitente varchar(30),
mensaje varchar (120),
leido varchar(10),
metodo varchar(10),
fecha date,
id_respuesta int,
primary key (id),
foreign key (id_item) references item(id)
);

create table categorias(
id int auto_increment,
nombre varchar(50),
primary key (id)
);
INSERT INTO categorias(nombre) VALUES ('Almacenamiento'),
('Hardware'),
('Software'),
('Perifericos'),
('Consolas'),
('Impresoras'),
('Monitores'),
('Notebook'),
('Accesorios'),
('Celulares'),
('Tablets'),
('Otros');


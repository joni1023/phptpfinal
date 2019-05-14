 -- drop  database tp_pw;
create database tp_pw;
use tp_pw;
create table usuario(
id int auto_increment,
nick varchar(25),
pass varchar(40),
email varchar(60),
primary key (id)
);
--  para las claves sha1 de debe de ser varchar de 40 y anteponer sha1('clave'), esto hace que la clave sea codificada
insert into usuario (nick,pass,email) values('admin',sha1('admin'),'alumno@alumno.com');
-- select * from usuario where pass=sha1('alumno');
-- select count(*) from usuario where nick='alumno' and pass=sha1('alumno');

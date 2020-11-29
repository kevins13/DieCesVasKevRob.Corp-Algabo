create database trabajoFinal;

use trabajoFinal;

CREATE TABLE empleados
(
    nombre varchar(50),
    apellido varchar(50),
    puesto varchar(70),
    dni int(30),
    id_tarjeta int(30),
    usuario varchar(50),
    pass varchar(50)
);
CREATE TABLE productos
(
    nombre varchar(70),
    id int(30),
    cantidad int(10),
    provedor varchar(50),
    producto varchar(50),
    id_ingreso int(50) auto_increment primary key,
    id_empleado int(50),
    fecha datetime
);
INSERT
    INTO
        empleado
    VALUES
('', '123456'),
('', 'qwert'),
('', 'zxcvb');
insert into productos
values('','');

select * 
from TableLogin 
where (mail = 'kevineldeboca@gmail.com' and contrasena ='123456') or (mail = 'maria@gmail.com' and contrasena ='qwert') or (mail = 'acho@gmail.com' and contrasena ='zxcvb');

select * 
from empleados;
select * 
from productos;
create database if not exists bdproyecto;
use bdproyecto;

create table usuarios(
	id_usuario int primary key auto_increment,
	nombres varchar(100),
	apellidos varchar(100),
	cedula varchar(100),
	telefono varchar(100),
	correo varchar(100),
	direccion varchar(100),
	cargo enum('0','1'),
	usuario varchar(100),
	password varchar(100),
	password2 varchar(100),
	fecha_ingreso date,
	estado enum('0','1'));

create table categoria(
	id_categoria int primary key auto_increment,
	categoria varchar(100),
	estado enum('0','1'),
	id_usuario int);

create table producto(
	id_producto int primary key auto_increment,
	id_categoria int,
	producto varchar(100),
	presentacion varchar(100),
	unidad varchar(100),
	moneda varchar(100),
	precio_compra varchar(100),
	precio_venta varchar(100),
	stock varchar(45),
	estado enum('0','1'),
	imagen varchar(45),
	fecha_vencimiento date,
	id_usuario int);

create table proveedor(
	id_proveedor int primary key auto_increment,
	cedula varchar(45),
	razon_social varchar(100),
	telefono varchar(100),
	correo varchar(100),
	direccion varchar(100),
	fecha date,
	estado enum('0','1'),
	id_usuario int);

create table compras(
	id_compras int primary key auto_increment,
	fecha_compra date,
	numero_compra varchar(100),
	proveedor varchar(100),
	cedula_proveedor varchar(100),
	comprador varchar(100),
	moneda varchar(100),
	subtotal varchar(100),
	total_iva varchar(100),
	total varchar(100),
	tipo_pago varchar(100),
	estado enum('0','1'),
	id_usuario int,
	id_proveedor int);

create table detalle_compras(
	id_detalle_compras int primary key auto_increment,
	numero_compra varchar(100),
	cedula_proveedor varchar(100),
	id_producto int,
	producto varchar(100),
	moneda varchar(100),
	precio_compra varchar(100),
	cantidad_compra varchar(100),
	descuento varchar(100),
	importe varchar(100),
	fecha_compra date,
	id_usuario int,
	id_proveedor int,
	estado enum('0','1'),
	id_categoria int);

create table clientes(
	id_cliente int primary key auto_increment,
	cedula_cliente varchar(100),
	nombre_cliente varchar(100),
	apellido_cliente varchar(100),
	telefono_cliente varchar(100),
	correo_cliente varchar(100),
	direccion_cliente varchar(100),
	fecha_ingreso date,
	estado enum('0','1'),
	id_usuario int);

create table ventas(
	id_ventas int primary key auto_increment,
	fecha_venta date,
	numero_venta varchar(100),
	cliente varchar(100),
	cedula_cliente varchar(100),
	vendedor varchar(100),
	moneda varchar(100),
	subtotal varchar(100),
	total_iva varchar(100),
	total varchar(100),
	tipo_pago varchar(100),
	estado enum('0','1'),
	id_usuario int,
	id_cliente int);

create table detalle_ventas(
	id_detalle_ventas int primary key auto_increment,
	numero_venta varchar(100),
	cedula_cliente varchar(100),
	id_producto int,
	producto varchar(100),
	moneda varchar(100),
	precio_venta varchar(100),
	cantidad_venta varchar(100),
	descuento varchar(100),
	importe varchar(100),
	fecha_venta date,
	id_usuario int,
	id_cliente int,
	estado enum('0','1'));

create table usuario_permiso(
	id_usuario_permiso int primary key auto_increment,
	id_usuario int,
	id_permiso int);

create table permisos(
	id_permiso int primary key auto_increment,
	nombre varchar(100));

create table empresa(
	id_empresa int primary key auto_increment,
	cedula_empresa varchar(100),
	nombre_empresa varchar(100),
	direccion_empresa varchar(100),
	correo_empresa varchar(100),
	telefono_empresa varchar(100),
	id_usuario int);


alter table categoria ADD foreign key (id_usuario) references usuarios(id_usuario); 
alter table producto ADD foreign key (id_usuario) references usuarios(id_usuario);
alter table proveedor ADD foreign key (id_usuario) references usuarios(id_usuario);
alter table compras ADD foreign key (id_usuario) references usuarios(id_usuario);
alter table detalle_compras ADD foreign key (id_usuario) references usuarios(id_usuario);
alter table clientes ADD foreign key (id_usuario) references usuarios(id_usuario);
alter table ventas ADD foreign key (id_usuario) references usuarios(id_usuario);
alter table detalle_ventas ADD foreign key (id_usuario) references usuarios(id_usuario);
alter table usuario_permiso ADD foreign key (id_usuario) references usuarios(id_usuario);
alter table empresa ADD foreign key (id_usuario) references usuarios(id_usuario);
alter table producto ADD foreign key (id_categoria) references categoria(id_categoria);
alter table compras ADD foreign key (id_proveedor) references proveedor(id_proveedor);
alter table detalle_compras ADD foreign key (id_producto) references producto(id_producto);
alter table detalle_compras ADD foreign key (id_proveedor) references proveedor(id_proveedor);
alter table detalle_compras ADD foreign key (id_categoria) references categoria(id_categoria);
alter table ventas ADD foreign key (id_cliente) references clientes(id_cliente);
alter table detalle_ventas ADD foreign key (id_cliente) references clientes(id_cliente);
alter table detalle_ventas ADD foreign key (id_producto) references producto(id_producto);
alter table usuario_permiso ADD foreign key (id_permiso) references permisos(id_permiso);

drop database dbproyecto;


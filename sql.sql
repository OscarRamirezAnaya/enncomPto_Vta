--Tablas del Sistema
--tabla de usuarios 

CREATE DATABASE pto_vta;
USE  pto_vta;
GO

CREATE TABLE Users
(
	id int primary key not null auto_increment,
	usuario varchar(20),
	psw varchar(20),
	estatus int,
	estado int, 
	RecordDate datetime default now() ,
	UltimaSession datetime 
);

--------------------------------------------------------------


CREATE TABLE clientes
(
 id int primary key not null auto_increment, 
 name varchar(80),
 app varchar(80),
 apm varchar(80),
 edad int,
 sexo char(2),
 dir varchar(200),
 tel varchar(20),
 cp int,
 email varchar(150)
 RecordDate datetime default now()
 );

--------------------------------------------------------

CREATE TABLE Productos
(
 id int primary key not null auto_increment, 
 name varchar(80),
 costo varchar(80),
 precio varchar(80),
 idCliente int,
 recorddate datetime default now()
);


----------------------------------------------------------

CREATE TABLE H_VENTA
(
	id int primary key not null auto_increment, 
	idCliente int,
	recorddate datetime default now(),
	total float 
);

----------------------------------------------------------
CREATE TABLE L_VENTA
(
	id int primary key not null auto_increment,
	idHead int, 
	idProducto int, 
	precio float, 
	costo float, 
	monto float, 
	cantidad float, 
	recorddate datetime default now()
);
------------------------------------------------------------

 update users
 set estado = 1 
 where id = 1 ;



--  $this->name;
--  $this->app;
--  $this->apm;
--  $this->edad;
--  $this->sexo;
--  $this->dir;
--  $this->tel;
--  $this->cp;
--  $this->email;
Create database BD_Proyecto;
Use BD_Proyecto;

Create table Cliente (
	CURP varchar(18) not null,
	Nombre varchar (40) not null,
	AMaterno varchar(25) not null,
	APaterno varchar(25) not null,
	Num_cas int not null,
	Colonia varchar(30) not null,
    Calle varchar(30) not null,
	Alcadia varchar(30) not null,
	CP varchar(5) not null,
	Estado varchar(30) not null,
	Email varchar(64) not null
);

alter table Cliente add constraint PK1 primary key(CURP);

Create table Contratacion (
	CURP varchar(18) not null,
	DiaEvento date not null,
	HrInicio time not null,
	HrFinal time not null,
	EventoTipo varchar(30) not null,
	NumPersonas int not null,
	Menu varchar(30) not null,
	Lugar varchar(20) not null
);

alter table Contratacion
	add constraint FK1 foreign key(CURP) references Cliente(CURP) on delete cascade on update cascade, 
    add constraint PK2 primary key(DiaEvento,CURP);

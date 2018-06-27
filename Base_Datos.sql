DROP TABLE Tipo_Usuario;
DROP TABLE Usuarios;
DROP TABLE Pre_Recibo;
DROP TABLE Contra_Recibo;
DROP TABLE Estatus;

CREATE TABLE Usuarios (
ID_Usuario int(11) NOT NULL,
Usuario varchar(30) NOT NULL,
Password varchar(130) NOT NULL,
Nombre varchar(100) NOT NULL,
Correo varchar(80) NOT NULL,
last_session datetime DEFAULT NULL,
token_password varchar(100) DEFAULT NULL,
password_request int(11) DEFAULT '0',
ID_Tipo int(11) NOT NULL
);

CREATE TABLE Tipo_Usuario(
ID_Tipo int(11) NOT NULL,
Tipo varchar(50)
);

CREATE TABLE Pre_Recibo (
Ticket VARCHAR(25) NOT NULL,
ID_Tipo int(11) NOT NULL,
Proveedor VARCHAR(250),
RFC VARCHAR(13),
Fecha VARCHAR(50),
Importe_IVA VARCHAR(50),
Num_Factura VARCHAR(50),
UUID VARCHAR(50)
);

CREATE TABLE Contra_Recibo(
Contra_Ticket VARCHAR(25) NOT NULL,
ID_Tipo int(11) NOT NULL
);

CREATE TABLE Estatus(
ID_Log INT NOT NULL,
ID_Tipo int(11) NOT NULL,
Estatus VARCHAR(50),
Comentarios VARCHAR(250)
);

--PK
ALTER TABLE Usuarios ADD CONSTRAINT PK_ID_Usuario PRIMARY KEY (ID_Usuario);
ALTER TABLE Tipo_Usuario ADD CONSTRAINT PK_ID_Tipo PRIMARY KEY (ID_Tipo);
ALTER TABLE Pre_Recibo ADD CONSTRAINT PK_Ticket PRIMARY KEY (Ticket);
ALTER TABLE Contra_Recibo ADD CONSTRAINT PK_Contra_Ticket PRIMARY KEY (Contra_Ticket);
ALTER TABLE Estatus ADD CONSTRAINT PK_ID_Log PRIMARY KEY (ID_Log);
--FK
ALTER TABLE Usuarios ADD CONSTRAINT FK_ID_Tipo_U FOREIGN KEY (ID_Tipo) REFERENCES Tipo_Usuario (ID_Tipo);
ALTER TABLE Pre_Recibo ADD CONSTRAINT FK_ID_Tipo_PR FOREIGN KEY (ID_Tipo) REFERENCES Tipo_Usuario (ID_Tipo);
ALTER TABLE Contra_Recibo ADD CONSTRAINT FK_ID_Tipo_CR FOREIGN KEY (ID_Tipo) REFERENCES Tipo_Usuario (ID_Tipo);
ALTER TABLE Estatus ADD CONSTRAINT FK_ID_Tipo_E FOREIGN KEY (ID_Tipo) REFERENCES Tipo_Usuario (ID_Tipo);

--Insert
INSERT INTO Tipo_Usuario (ID_Tipo,Tipo) VALUES (1,'Mesa de control');
INSERT INTO Tipo_Usuario (ID_Tipo,Tipo) VALUES (2,'Compras');
INSERT INTO Tipo_Usuario (ID_Tipo,Tipo) VALUES (3,'Cuentas por pagar');
INSERT INTO Tipo_Usuario (ID_Tipo,Tipo) VALUES (4,'Contabilidad');
INSERT INTO Tipo_Usuario (ID_Tipo,Tipo) VALUES (5,'Historial');
INSERT INTO Tipo_Usuario (ID_Tipo,Tipo) VALUES (6,'Administrador');


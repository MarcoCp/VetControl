CREATE TABLE Usuarios (
  idUsuarios INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Nombres VARCHAR(50) NOT NULL,
  Apellidos VARCHAR(50) NOT NULL,
  Dni VARCHAR(20) NOT NULL,
  Email VARCHAR(50) NOT NULL,
  Contrasena VARCHAR(50) NOT NULL,
  PRIMARY KEY(idUsuarios)
)
ENGINE=InnoDB;

CREATE TABLE Personas (
  idPersonas INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Nombres VARCHAR(50) NOT NULL,
  Apellidos VARCHAR(50) NOT NULL,
  PRIMARY KEY(idPersonas)
)
ENGINE=InnoDB;

CREATE TABLE Clientes (
  idClientes INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Nombres VARCHAR(50) NOT NULL,
  Apellidos VARCHAR(50) NOT NULL,
  Telefono VARCHAR(20) NOT NULL,
  PRIMARY KEY(idClientes)
)
ENGINE=InnoDB;

CREATE TABLE Mascotas (
  idMascotas INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Clientes_idClientes INTEGER UNSIGNED NOT NULL,
  Nombre VARCHAR(50) NOT NULL,
  Especie VARCHAR(50) NOT NULL,
  Raza VARCHAR(50) NULL,
  ColorPelo VARCHAR(50) NULL,
  FechaNacimiento DATE NULL,
  PRIMARY KEY(idMascotas, Clientes_idClientes),
  INDEX Mascotas_FKIndex1(Clientes_idClientes),
  FOREIGN KEY(Clientes_idClientes)
    REFERENCES Clientes(idClientes)
      ON DELETE CASCADE
      ON UPDATE CASCADE
)
ENGINE=InnoDB;

CREATE TABLE Clientes_has_Personas (
  Clientes_idClientes INTEGER UNSIGNED NOT NULL,
  Personas_idPersonas INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(Clientes_idClientes, Personas_idPersonas),
  INDEX Clientes_has_Personas_FKIndex1(Clientes_idClientes),
  INDEX Clientes_has_Personas_FKIndex2(Personas_idPersonas),
  FOREIGN KEY(Clientes_idClientes)
    REFERENCES Clientes(idClientes)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(Personas_idPersonas)
    REFERENCES Personas(idPersonas)
      ON DELETE CASCADE
      ON UPDATE CASCADE
)
ENGINE=InnoDB;

CREATE TABLE Pesos (
  idPesos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Mascotas_Clientes_idClientes INTEGER UNSIGNED NOT NULL,
  Mascotas_idMascotas INTEGER UNSIGNED NOT NULL,
  Fecha DATE NOT NULL,
  Peso FLOAT NOT NULL,
  PRIMARY KEY(idPesos, Mascotas_Clientes_idClientes, Mascotas_idMascotas),
  INDEX Pesos_FKIndex1(Mascotas_idMascotas, Mascotas_Clientes_idClientes),
  FOREIGN KEY(Mascotas_idMascotas, Mascotas_Clientes_idClientes)
    REFERENCES Mascotas(idMascotas, Clientes_idClientes)
      ON DELETE CASCADE
      ON UPDATE CASCADE
)
ENGINE=InnoDB;

CREATE TABLE Vacunas (
  idVacunas INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Mascotas_Clientes_idClientes INTEGER UNSIGNED NOT NULL,
  Mascotas_idMascotas INTEGER UNSIGNED NOT NULL,
  Fecha DATE NOT NULL,
  Enfermedad VARCHAR(50) NOT NULL,
  FechaProxima DATE NULL,
  PRIMARY KEY(idVacunas, Mascotas_Clientes_idClientes, Mascotas_idMascotas),
  INDEX Vacunas_FKIndex1(Mascotas_idMascotas, Mascotas_Clientes_idClientes),
  FOREIGN KEY(Mascotas_idMascotas, Mascotas_Clientes_idClientes)
    REFERENCES Mascotas(idMascotas, Clientes_idClientes)
      ON DELETE CASCADE
      ON UPDATE CASCADE
)
ENGINE=InnoDB;

CREATE TABLE Consultas (
  idConsultas INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Mascotas_Clientes_idClientes INTEGER UNSIGNED NOT NULL,
  Mascotas_idMascotas INTEGER UNSIGNED NOT NULL,
  Fecha DATE NOT NULL,
  Consulta VARCHAR(50) NOT NULL,
  Costo FLOAT NOT NULL,
  PRIMARY KEY(idConsultas, Mascotas_Clientes_idClientes, Mascotas_idMascotas),
  INDEX Consultas_FKIndex1(Mascotas_idMascotas, Mascotas_Clientes_idClientes),
  FOREIGN KEY(Mascotas_idMascotas, Mascotas_Clientes_idClientes)
    REFERENCES Mascotas(idMascotas, Clientes_idClientes)
      ON DELETE CASCADE
      ON UPDATE CASCADE
)
ENGINE=InnoDB;


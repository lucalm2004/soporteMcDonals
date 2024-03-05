CREATE DATABASE db_mcDonalds;
USE db_mcDonalds;

-- Creación de la tabla Usuarios
CREATE TABLE Usuarios (
    ID_Usuario INT PRIMARY KEY AUTO_INCREMENT,
    Nom_Usuario VARCHAR(100),
    Correo_Electronico VARCHAR(100),
    Contrasena VARCHAR(100),
    Rol ENUM ('admin', 'cliente', 'gestor', 'tecnico'),
    Sede ENUM ('Barcelona', 'Berlín', 'Montreal')
);

-- Creación de la tabla Categorias
CREATE TABLE Categorias (
    ID_Categoria INT PRIMARY KEY AUTO_INCREMENT,
    Nombre_Categoria VARCHAR(100),
    ID_Subcategoria INT
);

-- Creación de la tabla Subcategorias
CREATE TABLE Subcategorias (
    ID_Subcategoria INT PRIMARY KEY AUTO_INCREMENT,
    Nombre_Subcategoria VARCHAR(100),
    ID_Categoria INT,
    FOREIGN KEY (ID_Categoria) REFERENCES Categorias(ID_Categoria)
);

-- Creación de la tabla Incidencias
CREATE TABLE Incidencias (
    ID_Incidencia INT PRIMARY KEY AUTO_INCREMENT,
    ID_Cliente INT,
    ID_Tecnico INT,
    Data_Alta DATE,
    Data_Resolucion DATE,
    Estado ENUM ('sin_asignar', 'asignada', 'en_trabajo', 'resuelta', 'cerrada'),
    Prioridad ENUM ('alta', 'media', 'baja'),
    Comentario_Cliente TEXT,
    Comentario_Tecnico TEXT,
    ID_Categoria INT,
    FOREIGN KEY (ID_Cliente) REFERENCES Usuarios(ID_Usuario),
    FOREIGN KEY (ID_Tecnico) REFERENCES Usuarios(ID_Usuario),
    FOREIGN KEY (ID_Categoria) REFERENCES Categorias(ID_Categoria)
);

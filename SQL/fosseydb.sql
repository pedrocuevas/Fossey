BEGIN TRANSACTION;

DROP TABLE IF EXISTS regiones CASCADE;
CREATE TABLE regiones (
    pk serial NOT NULL,
    nombre varchar(255) NOT NULL,
    codigo varchar(5) NOT NULL,
    numero int NOT NULL,
    UNIQUE (nombre),
    UNIQUE (codigo),
    UNIQUE (numero),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS provincias CASCADE;
CREATE TABLE provincias (
    pk serial NOT NULL,
    nombre varchar(255) NOT NULL,
    region_fk int NOT NULL REFERENCES regiones(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    UNIQUE (nombre, region_fk),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS comunas CASCADE;
CREATE TABLE comunas (
    pk serial NOT NULL,
    nombre varchar(255) NOT NULL,
    provincia_fk int NOT NULL REFERENCES provincias(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    UNIQUE (nombre, provincia_fk),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS propietarios CASCADE;
CREATE TABLE propietarios (
    pk serial NOT NULL,
    nombres varchar(255) NOT NULL,
    apellidos varchar(255) NOT NULL,
    rut int NOT NULL,
    fecha_nacimiento date NOT NULL,
    genero int NOT NULL, -- O Femenino 1 Masculino
    direccion varchar(255) NOT NULL,
    comuna_fk int NOT NULL REFERENCES comunas(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    telefono varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    UNIQUE (rut),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS especies CASCADE;
CREATE TABLE especies (
    pk serial NOT NULL,
    nombre varchar(255) NOT NULL,
    descripcion text,
    UNIQUE (nombre),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS razas CASCADE;
CREATE TABLE razas (
    pk serial NOT NULL,
    nombre varchar(255) NOT NULL,
    especie_fk int NOT NULL REFERENCES especies (pk) ON UPDATE CASCADE ON DELETE CASCADE,
    descripcion text,
    UNIQUE (nombre, especie_fk),
    PRIMARY KEY (pk)
);


DROP TABLE IF EXISTS mascotas CASCADE;
CREATE TABLE mascotas (
    pk bigserial NOT NULL,
    nombre varchar(255) NOT NULL,
    fecha_nacimiento date NOT NULL,
    propietario_fk int NOT NULL REFERENCES propietarios(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    genero int NOT NULL, -- 0 Hembra 1 Macho
    raza_fk int NOT NULL REFERENCES razas(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY (pk)
);


DROP TABLE IF EXISTS veterinarias CASCADE;
CREATE TABLE veterinarias (
    pk serial NOT NULL,
    rut int NOT NULL,
    razon_social varchar(255) NOT NULL,
    nombre_fantasia varchar(255) NOT NULL,
    direccion varchar(255) NOT NULL,
    comuna_fk int NOT NULL REFERENCES comunas(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    UNIQUE (rut),
    PRIMARY KEY (pk)
);


DROP TABLE IF EXISTS sucursales CASCADE;
CREATE TABLE sucursales (
    pk serial NOT NULL,
    veterinaria_fk int NOT NULL REFERENCES veterinarias(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    codigo int NOT NULL,
    nombre varchar(255) NOT NULL,
    direccion varchar(255) NOT NULL,
    comuna_fk int NOT NULL REFERENCES comunas(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    UNIQUE (veterinaria_fk, codigo),
    PRIMARY KEY (pk)
);


DROP TABLE IF EXISTS profesionales CASCADE;
CREATE TABLE profesionales (
    pk serial NOT NULL,
    nombres varchar(255) NOT NULL,
    apellidos varchar(255) NOT NULL,
    rut int NOT NULL,
    fecha_nacimiento date NOT NULL,
    genero int NOT NULL, -- O Femenino 1 Masculino
    direccion varchar(255) NOT NULL,
    comuna_fk int NOT NULL REFERENCES comunas(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    telefono varchar(255),
    email varchar(255),
    titulo_profesional varchar(255) NOT NULL,
    institucion varchar(255) NOT NULL,
    descripcion text,
    UNIQUE (rut),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS empleados CASCADE;
CREATE TABLE empleados (
    pk serial NOT NULL,
    sucursal_fk int NOT NULL REFERENCES sucursales(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    profesional_fk int NOT NULL REFERENCES profesionales(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    UNIQUE (sucursal_fk, profesional_fk),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS tipos_trabajos CASCADE;
CREATE TABLE tipos_trabajos (
    pk serial NOT NULL,
    trabajo varchar(255) NOT NULL,
    precio numeric,
    descripcion text,
    UNIQUE (trabajo),
    PRIMARY KEY (pk)
);


DROP TABLE IF EXISTS agendas CASCADE;
CREATE TABLE agendas (
    pk bigserial NOT NULL,
    sucursal_fk int NOT NULL REFERENCES sucursales(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    profesional_fk int NOT NULL REFERENCES profesionales(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    trabajo_fk int NOT NULL REFERENCES tipos_trabajos(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    mascota_fk int NOT NULL REFERENCES mascotas(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    fecha_inicio timestamp NOT NULL,
    fecha_termino timestamp NOT NULL,
    observaciones text,
    UNIQUE(sucursal_fk, profesional_fk, fecha_inicio, fecha_termino),
    PRIMARY KEY (pk)
);


DROP TABLE IF EXISTS tipos_medicamentos CASCADE;
CREATE TABLE tipos_medicamentos (
    pk serial NOT NULL,
    tipo varchar(255) NOT NULL,
    descripcion text,
    UNIQUE (tipo),
    PRIMARY KEY (pk)
);


DROP TABLE IF EXISTS medicamentos CASCADE;
CREATE TABLE medicamentos (
    pk bigserial NOT NULL,
    tipo_fk int NOT NULL REFERENCES tipos_medicamentos(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    nombre_comercial varchar(255) NOT NULL,
    nombre_generico varchar(255) NOT NULL,
    descripcion text,
    contraindicaciones text,
    UNIQUE (nombre_comercial),
    PRIMARY KEY (pk)
);


DROP TABLE IF EXISTS recetas CASCADE;
CREATE TABLE recetas (
    pk bigserial NOT NULL,
    profesional_fk int NOT NULL REFERENCES profesionales(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    mascota_fk int NOT NULL REFERENCES mascotas(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    fecha timestamp NOT NULL DEFAULT NOW(),
    descripcion text,
    UNIQUE (mascota_fk, fecha),
    PRIMARY KEY (pk)
);


DROP TABLE IF EXISTS medicamentos_recetados CASCADE;
CREATE TABLE medicamentos_recetados (
    pk bigserial NOT NULL,
    receta_fk bigint NOT NULL REFERENCES recetas(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    medicamento_fk bigint NOT NULL REFERENCES medicamentos(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    UNIQUE (receta_fk, medicamento_fk),
    PRIMARY KEY (pk)
);


COMMIT;

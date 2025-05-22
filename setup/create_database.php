<?php
try {
    // Conexión inicial sin especificar la base de datos
    $pdo = new PDO('mysql:host=localhost', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear la base de datos
    $pdo->exec("CREATE DATABASE IF NOT EXISTS dbAurora CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
    echo "Base de datos 'dbAurora' creada correctamente.<br>";

    // Usar la base de datos
    $pdo->exec("USE dbAurora");

    // Crear tabla Rol_Usuario
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS Rol_Usuario (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL UNIQUE
        );
    ");

    // Crear tabla Tipo_Documento
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS Tipo_Documento (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL UNIQUE
        );
    ");

    // Crear tabla Usuarios
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS Usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(100) NOT NULL,
            apellido VARCHAR(100) NOT NULL,
            tipo_documento_id INT NOT NULL,
            numero_documento VARCHAR(50) NOT NULL UNIQUE,
            telefono VARCHAR(20),
            email VARCHAR(100) UNIQUE NOT NULL,
            nombre_usuario VARCHAR(50) NOT NULL UNIQUE,
            contraseña VARCHAR(255) NOT NULL,
            rol_id INT NOT NULL,
            FOREIGN KEY (rol_id) REFERENCES Rol_Usuario(id),
            FOREIGN KEY (tipo_documento_id) REFERENCES Tipo_Documento(id)
        );
    ");

    // Crear tabla Nivel_Actividades
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS Nivel_Actividades (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL UNIQUE
        );
    ");

    // Crear tabla Actividades
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS Actividades (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(100) NOT NULL,
            nivel_id INT,
            descripcion TEXT,
            tiempo_estimado INT NOT NULL,
            FOREIGN KEY (nivel_id) REFERENCES Nivel_Actividades(id)
        );
    ");

    // Crear tabla Mensaje_Contactos
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS Mensaje_Contactos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_usuario INT NOT NULL,
            fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
        );
    ");

    // Insertar datos en Rol_Usuario
    $pdo->exec("
        INSERT INTO Rol_Usuario (nombre) VALUES 
        ('Administrador'), 
        ('Usuario');
    ");

    // Insertar datos en Tipo_Documento
    $pdo->exec("
        INSERT INTO Tipo_Documento (nombre) VALUES 
        ('Cedula de Ciudadania'), 
        ('Tarjeta de Identidad'), 
        ('Carnet de Extranjería');
    ");

    // Insertar datos en Nivel_Actividades
    $pdo->exec("
        INSERT INTO Nivel_Actividades (nombre) VALUES 
        ('Principiante'), 
        ('Intermedio'), 
        ('Avanzado');
    ");

    // Insertar datos en Actividades
    $pdo->exec("
        INSERT INTO Actividades (nombre, nivel_id, descripcion, tiempo_estimado) VALUES
        ('Meditación Guiada', 1, 'Inicia con una breve meditación para establecer un ambiente de calma y centrado.', 15),
        ('Caja de Sensaciones', 1, 'Introduce la experiencia con una caja misteriosa que desafíe los sentidos y fomente la exploración.', 30),
        ('Reflexión Escrita', 1, 'Proporciona tiempo para que los participantes reflexionen sobre sus objetivos personales y expectativas.', 20),
        ('Retos Inspiradores', 1, 'Diseña retos que inspiren a los participantes a salir de su zona de confort y pensar de manera creativa.', 45),
        ('Mindfulness en Naturaleza', 1, 'Lleva a los participantes al aire libre para practicar la atención plena y conectar con la naturaleza.', 30),
        ('Desafío de Confianza', 2, 'Actividad en parejas o grupos pequeños donde se exploran aspectos de la confianza y la comunicación.', 60),
        ('Caminata de Resiliencia', 2, 'Una caminata desafiante que simboliza la capacidad de superar obstáculos y fortalecer la resiliencia.', 90),
        ('Reto Sensorial Extremo', 2, 'Actividad que involucra la utilización de todos los sentidos en situaciones extremas, fomentando la adaptabilidad.', 60),
        ('Diálogo Grupal', 2, 'Facilita un espacio para compartir experiencias y aprendizajes, promoviendo la empatía y la comprensión.', 45),
        ('Círculo de Empatía', 2, 'Una actividad grupal que se centra en la empatía y la comprensión mutua.', 60),
        ('Prueba de Resistencia', 3, 'Diseña una actividad física que desafíe la resistencia mental y física de los participantes.', 120),
        ('Experiencia Acuática Extrema', 3, 'Introduce retos acuáticos para superar miedos y aumentar la confianza en un entorno desafiante.', 120),
        ('Viaje de Autoexploración', 3, 'Una experiencia más prolongada que involucra diversas actividades para fomentar la autoexploración profunda.', 180),
        ('Simulación de Cambio Radical', 3, 'Proporciona una experiencia simulada que desafíe la resistencia al cambio y fomente la adaptabilidad.', 150),
        ('Cierre y Celebración', 3, 'Concluye con una ceremonia que celebre los logros individuales y grupales, fomentando un sentido de logro y pertenencia.', 90);
    ");

    echo "Todas las tablas y registros fueron creados e insertados correctamente.";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

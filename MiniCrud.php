<?php

// Conexión a base de datos
$host = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Crear tabla
$sql = "CREATE TABLE usuarios (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Tabla creada exitosamente <br>";
} else {
    echo "Error al crear la tabla: " . mysqli_error($conn);
}

// Insertar valor
$name = "RaulPB";
$email = "raulpb@gmail.com";
$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

if (mysqli_query($conn, $sql)) {
    echo "Valor insertado exitosamente <br>";
} else {
    echo "Error al insertar el valor: " . mysqli_error($conn);
}

// Actualizar valor
$new_name = "Carlos";
$id = 1;
$sql = "UPDATE users SET name='$new_name' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Valor actualizado exitosamente <br>";
} else {
    echo "Error al actualizar el valor: " . mysqli_error($conn);
}

// Mostrar valor
$sql = "SELECT name, email FROM users WHERE id=$id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["name"] . " - Email: " . $row["email"];
    }
} else {
    echo "No se encontraron valores <br>";
}

// Eliminar valor
$sql = "DELETE FROM users WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Valor eliminado exitosamente <br>";
} else {
    echo "Error al eliminar el valor: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

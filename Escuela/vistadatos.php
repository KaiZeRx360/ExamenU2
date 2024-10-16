<?php
session_start(); // Iniciar la sesión
require_once './app/config/conexion.php'; // Asegúrate de que esto esté correcto

// Verificar si el ID del alumno está presente en la sesión
if (!isset($_SESSION['alumno_id'])) {
    header("Location: login_alumnos.php"); // Redirigir si no hay sesión activa
    exit();
}

// Obtener el ID del alumno desde la sesión
$id_alumno = $_SESSION['alumno_id'];

try {
    // Consulta a la base de datos usando PDO
    $query = "SELECT * FROM t_alumnos WHERE id_alumnos = :id_alumno";
    $stmt = $conexion->prepare($query);

    // Enlazar el parámetro usando PDO
    $stmt->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
    
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $alumno = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $error = "No se encontraron datos del alumno.";
    }
} catch (PDOException $e) {
    $error = "Error en la consulta: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Datos del Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #f5f7fa, #c3cfe2);
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .login-btn {
            background-color: #ff4b5c;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .login-btn:hover {
            background-color: #ff1f3d;
        }
        h3 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card p-4">
            <h3 class="text-center mb-4">Datos del Alumno</h3>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php else: ?>
                <table class="table table-striped">
                    <tr>
                        <th>ID Alumno</th>
                        <td><?= htmlspecialchars($alumno['id_alumnos']) ?></td>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <td><?= htmlspecialchars($alumno['nombre']) ?></td>
                    </tr>
                    <tr>
                        <th>Apellido</th>
                        <td><?= htmlspecialchars($alumno['apellido']) ?></td>
                    </tr>
                    <tr>
                        <th>Año de Ingreso</th>
                        <td><?= htmlspecialchars($alumno['año_ingreso']) ?></td>
                    </tr>
                    <tr>
                        <th>Carrera</th>
                        <td><?= htmlspecialchars($alumno['carrera']) ?></td>
                    </tr>
                    <tr>
                        <th>Fecha de Nacimiento</th>
                        <td><?= htmlspecialchars($alumno['fecha_nacimiento']) ?></td>
                    </tr>
                </table>
            <?php endif; ?>
            <div class="text-center">
                <button type="button" class="btn login-btn w-100" onclick="window.location.href='plataforma.php';">
                    <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                </button>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

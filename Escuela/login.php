<?php
require_once './app/config/conexion.php'; // Asegúrate de que esto esté correcto
$query = "SELECT * FROM t_alumnos";
$result = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- FontAwesome -->
    <link rel="stylesheet" href="./public/css/login.css">
</head>
<body>
    <div class="login-container text-center">
        <i class="fas fa-user-graduate"></i> <!-- Ícono centrado sobre el título -->
        <h3>Iniciar Sesión Docente</h3>
        <form id="loginForm" action="#" method="POST">
            
            <!-- Input con ícono para Usuario -->
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-0">
                        <i class="fas fa-user" style="color: #ffcc00;"></i> <!-- Ícono de usuario -->
                    </span>
                    <input type="text" class="form-control rounded-pill border-light" id="usuario" name="usuario" required style="border-left: none; color: #333; background-color: #f2f2f2;">
                </div>
            </div>

            <!-- Input con ícono para Contraseña -->
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-0">
                        <i class="fas fa-lock" style="color: #ffcc00;"></i> <!-- Ícono de candado -->
                    </span>
                    <input type="password" class="form-control rounded-pill border-light" id="password" name="password" required style="border-left: none; color: #333; background-color: #f2f2f2;">
                </div>
            </div>
            
            <!-- Botón de Registrar -->
            <button type="button" class="btn login-btn w-100" onclick="window.location.href='plataforma.php';">
                <i class="fas fa-user-plus"></i> Plataforma alumnos
            </button>

            <br>
            <br>
            <div class="d-grid">
                <button type="submit" id="btn_iniciar" class="btn login-btn">
                    <span>Iniciar Sesión</span>
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert -->
    <script src="./public/js/main2.js"></script>
</body>
</html>

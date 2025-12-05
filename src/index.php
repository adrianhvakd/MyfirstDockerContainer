<?php
$servername = "db";
$username = "usuario";
$password = "contrasena";
$database = "upds2025";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Conexión fallida xd: " . mysqli_connect_error());
}

$sql = "SELECT id_usuario, nombre, usuario, contraseña FROM usuarios";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="container mx-auto py-10 px-4">
    <h3 class="text-3xl font-bold text-center mb-8 text-blue-500">Lista de Usuarios</h3>
    <?php if (mysqli_num_rows($result) > 0): ?>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="py-3 px-6 text-center">ID</th>
                        <th class="py-3 px-6 text-center">Nombre</th>
                        <th class="py-3 px-6 text-center">Usuario</th>
                        <th class="py-3 px-6 text-center">Contraseña</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-center"><?php echo htmlspecialchars($row['id_usuario']); ?></td>
                        <td class="py-3 px-6 text-center"><?php echo htmlspecialchars($row['nombre']); ?></td>
                        <td class="py-3 px-6 text-center"><?php echo htmlspecialchars($row['usuario']); ?></td>
                        <td class="py-3 px-6 text-center"><?php echo htmlspecialchars($row['contraseña']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-center text-gray-600">No hay usuarios registrados.</p>
    <?php endif; ?>
</div>
</body>
</html>



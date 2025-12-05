<?php
$servername = "db";
$username = "usuario";
$password = "contrasena";
$database = "upds2025";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$sql = "SELECT id_usuario, nombre, usuario, contraseña FROM usuarios";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>


    </head>

    <body class="bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-100">

        <div class="container mx-auto py-10 px-4">

            <div class="flex justify-center items-center mb-8">
                <h3 class="text-3xl font-bold">Lista de Usuarios</h3>
            </div>

            <?php if (mysqli_num_rows($result) > 0): ?>
                <div class="overflow-x-auto">
                    <table class="min-w-full rounded-lg shadow-md
                                bg-white text-gray-900
                                dark:bg-gray-800 dark:text-gray-200 border border-gray-300 dark:border-gray-700">

                        <thead class="bg-gray-200 dark:bg-gray-700 dark:text-white">
                            <tr>
                                <th class="py-3 px-6 text-center">ID</th>
                                <th class="py-3 px-6 text-center">Nombre</th>
                                <th class="py-3 px-6 text-center">Usuario</th>
                                <th class="py-3 px-6 text-center">Contraseña</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr class="border-b border-gray-300 dark:border-gray-700 
                                    hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="py-3 px-6 text-center"><?= htmlspecialchars($row['id_usuario']); ?></td>
                                <td class="py-3 px-6 text-center"><?= htmlspecialchars($row['nombre']); ?></td>
                                <td class="py-3 px-6 text-center"><?= htmlspecialchars($row['usuario']); ?></td>
                                <td class="py-3 px-6 text-center"><?= htmlspecialchars($row['contraseña']); ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>

                    </table>
                </div>
            <?php else: ?>
                <p class="text-center text-gray-500 dark:text-gray-400">No hay usuarios registrados.</p>
            <?php endif; ?>

        </div>
    </body>
</html>

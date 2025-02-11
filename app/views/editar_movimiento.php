<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Movimiento</title>
    <!-- Bootstrap CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- CSS personalizado -->
    <style>
        /* Estilos para el modo oscuro */
        body.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }

        .dark-mode .container {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
        }

        .dark-mode .form-control {
            background-color: #333333;
            color: #ffffff;
            border-color: #444444;
        }

        .dark-mode .form-control:focus {
            background-color: #444444;
            color: #ffffff;
            border-color: #555555;
        }

        .dark-mode .form-label {
            color: #ffffff;
        }

        /* Estilos para el botón de modo oscuro/claro */
        #theme-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        #theme-toggle:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- Botón para cambiar el modo -->
    <button id="theme-toggle" title="Cambiar modo">
        🌓
    </button>

    <div class="container mt-5">
        <h1 class="mb-4">Editar Movimiento</h1>
        <form action="index.php?action=edit" method="POST" onsubmit="return showUpdateMessage(event)">
            <input type="hidden" name="id" value="<?= $movimiento['id'] ?>">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="<?= $movimiento['fecha'] ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="factura">Factura</label>
                    <input type="text" class="form-control" id="factura" name="factura" value="<?= $movimiento['factura'] ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $movimiento['descripcion'] ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="debe">Debe</label>
                    <input type="number" step="0.01" class="form-control" id="debe" name="debe" value="<?= $movimiento['debe'] ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="haber">Haber</label>
                    <input type="number" step="0.01" class="form-control" id="haber" name="haber" value="<?= $movimiento['haber'] ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Script personalizado -->
    <script>
        // Función para mostrar alerta de éxito al actualizar
        function showUpdateMessage(event) {
            event.preventDefault(); // Evita que el formulario se envíe inmediatamente

            Swal.fire({
                title: '¡Actualizado!',
                text: 'El movimiento ha sido actualizado correctamente.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit(); // Envía el formulario después de que el usuario haga clic en "Aceptar"
                }
            });

            return false; // Evita que el formulario se envíe antes de que se muestre la alerta
        }

        // Función para cambiar entre modo oscuro y claro
        document.getElementById('theme-toggle').addEventListener('click', function () {
            const body = document.body;
            body.classList.toggle('dark-mode');
            const isDarkMode = body.classList.contains('dark-mode');
            localStorage.setItem('dark-mode', isDarkMode);
            this.innerHTML = isDarkMode ? '🌞' : '🌓'; // Cambia el ícono del botón
        });

        // Verificar el modo al cargar la página
        document.addEventListener('DOMContentLoaded', function () {
            const isDarkMode = localStorage.getItem('dark-mode') === 'true';
            if (isDarkMode) {
                document.body.classList.add('dark-mode');
                document.getElementById('theme-toggle').innerHTML = '🌞';
            }
        });
    </script>
</body>

</html>
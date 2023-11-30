<?php
// Conectarse a la base de datos
$host = 'localhost';
$dbname = 'libreria';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
    die();
}

// Obtener listado de autores
$query = $pdo->query('SELECT * FROM autores');
$autores = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DCT Librería - Autores</title>

    <!-- Enlaces a Bootstrap y CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>

    <!-- Barra de navegación -->
    <nav class=" navbar navbar-expand-lg bg-body-tertiary">
        <a class="navbar-brand" href="#"> Librería</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="libro.php">Libros</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="autores.php">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.php">Contacto</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Sección de Autores -->
    <section id="autores" class="my-5">
        <div class="container text-center">
            <h2 class="display-4">Descubre a los buenos en lo que hacen </h2>
            <p class="lead">Conoce a los  autores.</p>

            <!-- Mostrar los autores-->
            <div class="card-deck">
                <?php
                foreach ($autores as $autor) {
                    echo '<div class="card mb-4">';
                    // Verificar el autor y cargar la imagen correspondiente
                    switch ($autor['nombre']) {
                        case 'Edgar Allan Poe.':
                            echo '<img src="img/edgar.jpg" class="card-img-top" alt="' . $autor['nombre'] . '">';
                            break;
                        case 'Jane Austen.':
                            echo '<img src="img/jane.jpg" class="card-img-top" alt="' . $autor['nombre'] . '">';
                            break;
                        case 'Miguel de Cervantes.':
                            echo '<img src="img/miguel.jpg" class="card-img-top" alt="' . $autor['nombre'] . '">';
                            break;
                        case 'Agatha Chistie.':
                            echo '<img src="img/agatha.jpg" class="card-img-top" alt="' . $autor['nombre'] . '">';
                            break;
                        default:
                            echo '<img src="' . $autor['imagen'] . '" class="card-img-top" alt="' . $autor['nombre'] . '">';
                            break;
                    }
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $autor['nombre'] . '</h5>';
                    echo '</div></div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Enlaces a Bootstrap y JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Pie de página -->
    <footer id="footer" class="bg-dark text-white py-3">
        <div class="container">
            <p>&copy; Todos los derechos reservados - Creado por Branly Peña 2022-0894</p>
        </div>
    </footer>

</body>

</html>

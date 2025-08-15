<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../controllers/CTurno.php';

$controlador = new CTurno();
$listaTerapeutas = $controlador->ObtenerTerapeutas();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../css/style.css">
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    <header>
        <h1>CalmaTurnos</h1>
        <nav class="nav-links">
            <?php if (!isset($_SESSION['id_usu'])): ?>
         <a href="/Pagina-web-dw/controllers/Clogin.php" class="log-btn">Iniciar sesión</a>
            <a href="../controllers/CVsignup.php" class="log-btn">Registrarse</a>
            <?php else: ?>
            <a href="/Pagina-web-dw/controllers/CVturno.php" class="log-btn" id="Turno-btn">Pedir Turno</a>
            <a href="/Pagina-web-dw/controllers/CverTurnos.php" class="log-btn" id="Turno-btn"->Ver mis turnos</a>

        </nav>


      <div class="login-menu">
            <p style="margin: 0.5em 1em; font-weight: bold;">
              Mi cuenta: <?php echo htmlspecialchars($_SESSION['n_usuario'] ?? 'n_usuario'); ?>
            </p>
            <a href="/Pagina-web-dw/controllers/Clogout.php" class="button" style="margin: 0.5em 1em; font-weight: bold;">Cerrar sesión</a>
          <?php endif; ?>
      </div>

</header>

    <main>
        
    
        <section id="sobre-nosotros">
            <h2>Sobre Nosotros</h2>
            <p>
                En <strong>CalmaTurnos</strong> promovemos el equilibrio entre cuerpo y mente. Nuestra plataforma fue
                creada para que reservar tu sesión de masaje sea simple, rápida y placentera.
            </p>
            <p>
                Trabajamos con profesionales certificados en técnicas como masajes relajantes, descontracturantes,
                reflexología y más.
            </p>
        </section>


<section id="terapeutas">
    <h2>Terapeutas Asociados</h2>
    <p>Contamos con una red de profesionales en diferentes especialidades del masaje terapéutico.</p>
    <ul>
        <?php if(!empty($listaTerapeutas) && is_array($listaTerapeutas)): ?>
            <?php foreach ($listaTerapeutas as $terapeuta): ?>
                <li>
                    <?= htmlspecialchars($terapeuta['nombre'] ?? 'Terapeuta') ?> – 
                    <?= htmlspecialchars($terapeuta['descripcion'] ?? '') ?>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No hay terapeutas disponibles.</li>
        <?php endif; ?>
    </ul>
</section>


        <section id="como-funciona">
            <h2>¿Cómo Reservar?</h2>
            <ol>
                <li>Elegí tu tipo de masaje o terapeuta.</li>
                <li>Seleccioná día y hora disponibles.</li>
                <li>Ingresá tus datos para confirmar.</li>
                <li>¡Listo! Te esperamos para tu momento de calma.</li>
            </ol>
        </section>

        <section id="contacto">
            <h2>Contacto</h2>
            <p>¿Tenés preguntas o querés unirte como terapeuta?</p>
            <ul>
                <li>Email: <a href="mailto:info@calmaturnos.com">info@calmaturnos.com</a></li>
                <li>WhatsApp: +54 11 9999-8888</li>
                <li>Instagram: <a href="https://instagram.com/calmaturnos">@calmaturnos</a></li>
            </ul>
        </section>

    </main>


    <footer>
        <p>Página hecha por Rodrigo Novelino y Juan Burger 7mo 2da</p>
    </footer>
</body>

</html>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Peletería Cueros y Color</title>
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <!-- Header with navigation -->
  <header class="bg-dark text-white py-5">
    <nav class="container d-flex justify-content-between align-items-center">
      <a href="#" class="text-white logo">NGBJ_INVETARIOS</a>
      <div>
        <a href="#Nosotros" class="text-white mx-3">Información</a>
        <a href="#Contacto" class="text-white mx-3">Contáctanos</a>
        <a href="{{ route('login') }}" class="btn btn-light">Iniciar sesión</a>
      </div>
    </nav>
    <section class="text-center my-5">
      <h1 class="display-4">Creadores de los mejores sistemas de inventario</h1>
      <p class="lead">Proyeccion y modernidad colombiana</p>
    </section>
  </header>

  <!-- Main content -->
  <main>
  <!-- About us section -->
  <section id="Nosotros" class="container py-5">
    <h2 class="text-center mb-4">Bienvenidos a Peletería Cueros y Color</h2>
    <p class="lead text-center">Somos lujo colombiano, fusionando tradición e innovación.</p>
    <!-- ... (Tu contenido de la sección "Nosotros") ... -->
  </section>

  <!-- Request Information Form Section -->
  <section id="SolicitarInformacion" class="container py-5">
    <h2 class="text-center mb-4">Solicita Más Información</h2>
    <p class="lead text-center mb-5">Déjanos tus datos y nos pondremos en contacto contigo.</p>
    
    <form action="{{ route('send.inf') }}" method="POST">
      @csrf <!-- Si estás usando Laravel, esta línea es necesaria para la protección CSRF -->
      
      <div class="row">
        <!-- Nombre -->
        <div class="col-md-6 mb-4">
          <label for="nombre" class="form-label">Nombre Completo</label>
          <input type="text" id="nombre" name="nombre" class="form-control" required placeholder="Ingresa tu nombre completo">
        </div>

        <!-- Correo Electrónico -->
        <div class="col-md-6 mb-4">
          <label for="email" class="form-label">Correo Electrónico</label>
          <input type="email" id="email" name="email" class="form-control" required placeholder="Ingresa tu correo electrónico">
        </div>
      </div>

      <div class="row">
        <!-- Teléfono -->
        <div class="col-md-6 mb-4">
          <label for="telefono" class="form-label">Teléfono</label>
          <input type="text" id="telefono" name="telefono" class="form-control" required placeholder="Ingresa tu número de teléfono">
        </div>

        <!-- Mensaje -->
        <div class="col-md-6 mb-4">
          <label for="mensaje" class="form-label">Mensaje</label>
          <textarea id="mensaje" name="mensaje" class="form-control" rows="4" required placeholder="Escribe tu mensaje aquí"></textarea>
        </div>
      </div>

      <!-- Submit Button -->
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
      </div>
    </form>
  </section>
</main>

  <!-- Contact section -->
  <footer id="Contacto" class="bg-dark text-white py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4>Email:</h4>
          <p>Inventarios@ngbj.com</p>
        </div>
        <div class="col-md-4">
          <h4>Cel:</h4>
          <p>3134528956</p>
        </div>
        <div class="col-md-4">
          <h4>Dirección:</h4>
          <p>Calle 12 # 23-34 Restrepo, Bogotá D.C</p>
        </div>
      </div>
      <div class="text-center mt-4">
        <p>&copy; 2024 NGBJ_inventarios. Todos los derechos reservados.</p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<div class="bg-white min-w-1350 w-screen h-screen min-h-620 flex">
  <!-- Barra latera -->
  <div class="bg-grisOscuro h-full w-60 ">
    <!-- Logo y nombre de la u -->
    <div class="flex items-center p-3 border-b border-solid border-white">
      <img src="/public/assets/logo3.jpg" class="w-11 rounded-full mr-3">
      <span class="text-xl text-white">Univerdad</span>
    </div>
    <!-- Rol y nombre -->
    <div class="text-white p-3 border-b border-solid border-white"">
      <a href="/index.php?modulo=dashboard">Admin</a>
      <p><?php echo $_SESSION['USER']['nombre']; ?></p>
    </div>
    <!-- Resto del menu disponible -->
    <div class=" text-white p-4 pt-5 flex flex-col">
      <h1 class="w-full text-center mb-3">MENU ADMINISTRACION</h1>
      <a href="/index.php?modulo=adminPermisos&pagina=1" class="mb-3"><i class="fa-solid fa-user-gear mr-1"></i>Permisos</a>
      <a href="/index.php?modulo=adminMaestros&pagina=1" class="mb-3"><i class="fa-solid fa-chalkboard-user mr-1"></i>Maestros</a>
      <a href="/index.php?modulo=adminAlumnos&pagina=1" class="mb-3"><i class="fa-solid fa-graduation-cap mr-1"></i>Alumnos</a>
      <a href="/index.php?modulo=adminClases&pagina=1" class="mb-3"><i class="fa-solid fa-chalkboard mr-1"></i>Clases</a>
    </div>
  </div>
  <!-- div de contenido -->
  <div class=" w-full h-full flex flex-col">
    <header class="w-full bg-white py-2 px-6 flex justify-between text-gray-400 font-bold">
      <p>Home</p>
      <div>
        <span>Admistrador -</span>
        <a href="index.php?close=true;">Cerrar Sección</a>
      </div>
    </header>
    <!-- Contenedor principal interno -->
    <div class="w-full h-full bg-gray-200 p-2">
      <?php 
      switch ($_SESSION['MODULO']) {
        case 'dashboard':
          ?>
          <h1 class="font-bold text-xl">Dashboard</h1>
          <div>
            <h3>Bienvenido</h3>
            <p>Selecciona la acción que quieras realizar en las pestañas del meno de la izquierda</p>
          </div>
          <?php
          break;
        case 'adminPermisos':
          include_once($_SERVER["DOCUMENT_ROOT"]."/src/view/admi/permisos/admiPermisosIndex.php");
          break;
        
        case 'adminMaestros':
            include_once($_SERVER["DOCUMENT_ROOT"]."/src/view/admi/maestros/admiMaestroIndex.php");
            break;
          
        case 'adminAlumnos':
            include_once($_SERVER["DOCUMENT_ROOT"]."/src/view/admi/alumnos/admiAlumnoIndex.php");
            break;

        case 'adminClases':
          include_once($_SERVER["DOCUMENT_ROOT"]."/src/view/admi/clases/admiClaseIndex.php");
          break;
        default:
          # 
          break;
      }
      
      
      ?>
    </div>
    <div class="w-full bg-white py-2 px-6 text-gray-400">
      <p><strong>Copyright 2014-2022 Sebastian Aldana.</strong> All rights reserved </p>
    </div>
  </div>
</div>
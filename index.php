<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/public/assets/logo2.jpg" >
    <title>U n i v e r s i t y</title>
    <script src="https://kit.fontawesome.com/f406e3edda.js" crossorigin="anonymous"></script>
    <link href="/dist/output.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
<body class="bg-fondo-yelow">
    <div class="min-h-620 h-auto max-h-screen w-screen min-w-1350">
        <?php 
            include_once($_SERVER["DOCUMENT_ROOT"]."/src/controller/LoginControlador.php");
            include_once($_SERVER["DOCUMENT_ROOT"]."/src/controller/ClaseControlador.php");
            include_once($_SERVER["DOCUMENT_ROOT"]."/src/controller/UsuarioControlador.php");
            $loginContrl = new LoginControlador();
            $claseContrl = new ClaseControlador();
            $userContrl = new UsuarioControlador();
            /* Aqui verificamos si entra por metodo get o post */
            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                /* Aqui verificamos si esta vacio la variable global user */
                if (empty($_SESSION['USER'])) {
                    /* Si lo esta nos va dirigir al login */
                    $loginContrl->vistaLogin();
                }else if(isset($_GET['close'])){ /* Aqui hacemos una verificacion adicional para saber si el usuario a intentado cerrar seccion */
                    $loginContrl->CerrarSeccion();
                }else{ /* Aqui, si se ha iniciado seccion dependiendo del rol del usuario podra entra a la vista que le corresponde */
                    if ($_SESSION['USER']['id_rol'] == 1) { /* rol 1 => Admin */
                        if (isset($_SESSION['MODULO'])) { /* aqui verificamos si el admin a dado clic algunos de los modulos, si asi lo es guarda el nombre del modulo donde se usa en la vista del admin */
                            if (isset($_GET['delectClase']) ) {
                                if ($_GET['delectClase'] == 'false') {
                                    $claseContrl->CheckEliminarClase($_GET['idDelete']); 
                                }else if ($_GET['delectClase'] == 'true'){
                                    $claseContrl->eliminarClase($_GET['idDelete']);
                                }
                                
                            }
                            if (isset($_GET['delete'])) {
                                if ($_GET['delete'] == 'false') {
                                    $userContrl->checkElimanar($_GET['idDelete'],$_SESSION['MODULO'],$_GET['pagina']); 
                                }else if ($_GET['delete'] == 'true'){
                                    $userContrl->EliminarUser($_GET['idDelete']);
                                }
                            }
                            
                            $_SESSION['MODULO'] = isset($_GET['modulo']) ? $_GET['modulo'] : $_SESSION['MODULO'] ;
                            $_SESSION['AllUSERS'] = $userContrl->ListAllUser(); /* Aqui vamos a guadadar la informacion de la lista todos los usuarios para el modulo de permisos del admin */
                            $_SESSION['LISTA_CLASES'] = $claseContrl->listarClases();
                            $_SESSION['MAESTROS_DISPONIBLE'] = $userContrl->maestrosSinAsignacion();
                            if (isset($_GET['idUseSelect'] )) {
                                $_SESSION['USER_FOR_EDIT'] = $userContrl->FindForId($_GET['idUseSelect']);
                                $_SESSION['CLASS_FOR_EDIT'] = $claseContrl->findClassForId($_GET['idUseSelect']);
                            }
                        
                            
                            
                        }else{ /* si no hay modulo selecionamos la vista principal */
                            $_SESSION['MODULO'] = 'dashboard';
                        }
                        
                        $loginContrl->admiDashboard();
                    } else if($_SESSION['USER']['id_rol'] == 2){ /* rol 1 => maestros */
                        include_once($_SERVER["DOCUMENT_ROOT"]."/src/view/maestro/MaestroDashboord.php");
                    } else if($_SESSION['USER']['id_rol'] == 3){ /* rol 1 => alumnos */
                        include_once($_SERVER["DOCUMENT_ROOT"]."/src/view/alumno/AlumnoDashboord.php");
                    }
                }
            }else{ //metodo POST
                if (isset($_POST['btninicioSeccion'])) {
                    $loginContrl->validarUserAndPasswordAll($_POST);
                }
                if(isset($_POST['btnSaveEditAdminPermiso'])){
                    $userContrl->cambiarRol($_POST);
                }

                if(isset($_POST['btnCrearMestro'])){
                    $userContrl->crearUser($_POST);
                }

                if (isset($_POST['btnEditMaestro'])) {
                    $userContrl->editUser($_POST);
                }

                if (isset($_POST['btnCrearAlumno'])) {
                    $userContrl->crearUser($_POST);
                }

                if (isset($_POST['btnEditAlumno'])) {
                    $userContrl->editUser($_POST);
                }

                if (isset($_POST['btnCrearClase'])) {
                    $claseContrl->crearClase($_POST);
                }

                if (isset($_POST['btnEditClase'])) {
                    $claseContrl->actualizarClase($_POST);
                }
            }

        
        ?>    
    </div>
</body>
</html>


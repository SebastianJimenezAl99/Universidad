<!-- Modal con fondo oscuro -->
<div id="modal-container"
        class=" fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-70">
        <div class="bg-white px-1 rounded-lg shadow-lg w-96">
            <div class="flex justify-between border-b border-solid border-gray-400 items-center w-full h-20">
                <p class="text-4xl font-semibold ml-2">Editar Permiso</p>
                <button class="text-gray-600 hover:text-gray-800 h-full w-5  flex flex-row-reverse mr-2" id="close-modal">×</button>
            </div>
            <div class="p-4">
                <form action="/index.php" method="post" class="w-full">
                    <input type="text"   name="id" class="hidden" value="<?php echo $_GET['idUseSelect'] ?>" readonly>
                    <div class="w-full mb-2">
                        <label for="email" class="font-bold">Email del usuario</label><br>
                        <input class="border border-solid border-gray-400 rounded w-full px-2 py-1 text-gray-500 font-semibold" type="text" name="email" readonly value="<?php echo $_SESSION['USER_FOR_EDIT']['email'] ?>">
                    </div>
                    <div class="w-full mb-2">
                        <label for="rol" class="font-bold" >Rol del usuario</label><br>
                        <select class="border border-solid border-gray-400 rounded w-full px-2 py-1 text-gray-500 font-semibold" name="id_rol">
                            <option value=1 <?php echo $_SESSION['USER_FOR_EDIT']['id_rol'] == 1 ? "selected":"" ;?>>Administrador</option>
                            <option value=2 <?php echo $_SESSION['USER_FOR_EDIT']['id_rol'] == 2 ? "selected":"" ;?> >Maestro</option>
                            <option value=3 <?php echo $_SESSION['USER_FOR_EDIT']['id_rol'] == 3 ? "selected":"" ;?> >Alumno</option>
                        </select>
                    </div>
                    <div class="w-full mb-4 ">
                        <input class="" type="checkbox" <?php echo $_SESSION['USER_FOR_EDIT']['estado'] == "Activo" ? "checked":"" ;?> name="estado">
                        <label for="estado">Usuario Activo</label>
                    </div>
                    <div  class="w-full flex justify-end">
                        <button class="bg-gray-500 border rounded px-2 py-1 text-white font-semibold" type="button" id="cerrarModal">Cerrar</button>
                        <button class="bg-blue-500 border rounded px-2 py-1 text-white font-semibold" type="submit"  name="btnSaveEditAdminPermiso" >Guardar Cambios</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    
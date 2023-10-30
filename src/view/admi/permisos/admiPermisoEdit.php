<!-- Modal con fondo oscuro -->
<div id="modal-container"
        class=" fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-70">
        <div class="bg-white px-1 py-5 rounded-lg shadow-lg w-96">
            <div class="flex justify-between border-b-2 border-solid border-gray-400 ">
                <p class="text-lg font-semibold">Editar Permiso</p>
                <button class="text-gray-600 hover:text-gray-800" id="close-modal">×</button>
            </div>
            <div class="p-4">
                <form action="/index.php" method="post">
                    <input type="text"   name="id" value="<?php echo $_GET['idUseSelect'] ?>" readonly>
                    <div>
                        <label for="email">Email del usuario</label><br>
                        <input type="text" name="email" readonly value="<?php echo $_SESSION['USER_FOR_EDIT']['email'] ?>">
                    </div>
                    <div>
                        <label for="rol">Rol del usuario</label><br>
                        <select name="id_rol">
                            <option value=1 <?php echo $_SESSION['USER_FOR_EDIT']['id_rol'] == 1 ? "selected":"" ;?>>Administrador</option>
                            <option value=2 <?php echo $_SESSION['USER_FOR_EDIT']['id_rol'] == 2 ? "selected":"" ;?> >Maestro</option>
                            <option value=3 <?php echo $_SESSION['USER_FOR_EDIT']['id_rol'] == 3 ? "selected":"" ;?> >Alumno</option>
                        </select>
                    </div>
                    <div>
                        <input type="checkbox" <?php echo $_SESSION['USER_FOR_EDIT']['estado'] == "Activo" ? "checked":"" ;?> name="estado">
                        <label for="estado">Usuario Activo</label>
                    </div>
                    <div>
                        <button type="button" id="cerrarModal">Cerrar</button>
                        <button type="submit"  name="btnSaveEditAdminPermiso" >Guardar Cambios</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    
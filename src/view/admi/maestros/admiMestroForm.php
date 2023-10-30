<?php 
if(isset($_GET['idUseSelect']) || isset($_GET['create'])) {
    $clases = $_SESSION['LISTA_CLASES'];
    
}

if (isset($_GET['idUseSelect'])) {
    $data = $_SESSION['USER_FOR_EDIT'];
}

if (isset($_GET['create'])) {
    unset($_SESSION['USER_FOR_EDIT']);
}

?>

<div id="modal-container"
        class=" fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-70">
        <div class="bg-white px-1 py-5 rounded-lg shadow-lg w-96">
            <div class="flex justify-between border-b-2 border-solid border-gray-400 ">
                <p class="text-lg font-semibold"><?php echo isset($_GET['idUseSelect']) ? "Editar Maestro" : "Agregar Maestro" ; ?></p>
                <button class="text-gray-600 hover:text-gray-800" id="close-modal">×</button>
            </div>
            <div class="p-4">
                <form action="/index.php" method="post">
                    <input type="hidden" name="id" value="<?php echo isset($_GET['idUseSelect']) ? $_GET['idUseSelect'] : "" ; ?>">
                    <div>
                        <label for="email">Correo Electronico</label><br>
                        <input type="text" name="email" placeholder="Correo" required <?php echo isset($_GET['idUseSelect']) ?  'value="'.$data['email'].'" readonly': '' ; ?> >
                    </div>
                    <div>
                        <label for="nombre">Nombre</label><br>
                        <input type="text" name="nombre" placeholder="Nombre" <?php echo isset($_GET['idUseSelect']) ?  'value="'.$data['nombre'].'"': '' ; ?> >
                    </div>
                    <div>
                        <label for="apellido">Apellido</label><br>
                        <input type="text" name="apellido" placeholder="Apellido" <?php echo isset($_GET['idUseSelect']) ?  'value="'.$data['apellido'].'"': '' ; ?>>
                    </div>
                    <div>
                        <label for="direccion">Direccion</label><br>
                        <input type="text" name="direccion" placeholder="Direccion" <?php echo isset($_GET['idUseSelect']) ?  'value="'.$data['direccion'].'"': '' ; ?> >
                    </div>
                    <div>
                        <label for="fechaNacimiento">Fecha de Nacimiento</label><br>
                        <input type="date" max="2008-12-31" name="fechaNacimiento" <?php echo isset($_GET['idUseSelect']) ?  'value="'.$data['fechaNacimiento'].'"': '' ; ?>>
                    </div>
                    <input type="hidden" name="id_rol" value="2">
                    <input type="hidden" name="estado" value="Activo" >
                    <div>
                        <label for="id_clase">Clase Asignada</label><br>
                        <select name="id_clase">
                            <option value=null >Selecciona Clase</option>
                            <?php
                            foreach ($clases as $clase) {
                                $selected = "";
                                if ($clase['id_clase'] == $data['id_clase']) {
                                   $selected = "selected"; 
                                }
                                if (!$clase['id_maestro'] || $clase['id_clase'] == $data['id_clase']) {
                            ?>
                                    <option  value='<?php echo $clase['id_clase'];?>' <?php echo $selected;?> ><?php echo $clase['nombre'];?></option>
                            <?php  
                                }   
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <button type="button" id="cerrarModal">Cerrar</button>
                        <button type="submit"  name="<?php echo isset($_GET['idUseSelect']) ?  'btnEditMaestro': 'btnCrearMestro' ; ?>" ><?php echo isset($_GET['idUseSelect']) ?  'Editar': 'Crear' ; ?></button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    
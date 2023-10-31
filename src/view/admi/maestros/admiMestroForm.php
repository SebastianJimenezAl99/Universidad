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

<div id="modal-container" class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-70">
    <div class="bg-white px-1  rounded-lg shadow-lg w-96">
        <div class="flex justify-between border-b border-solid border-gray-400 items-center w-full h-20">
            <p class="text-4xl font-semibold ml-2"><?php echo isset($_GET['idUseSelect']) ? "Editar Maestro" : "Agregar Maestro"; ?></p>
            <button class="text-gray-600 hover:text-gray-800 h-full w-5  flex flex-row-reverse mr-2" id="close-modal">×</button>
        </div>
        <div class="p-4">
            <form action="/index.php" method="post">
                <input type="hidden" name="id" value="<?php echo isset($_GET['idUseSelect']) ? $_GET['idUseSelect'] : "" ; ?>">
                <div class="w-full mb-2">
                    <label class="font-bold" for="email">Correo Electronico</label><br>
                    <input class="border border-solid border-gray-400 rounded w-full px-2 py-1 text-gray-500 font-semibold" type="text" name="email" placeholder="Correo" required <?php echo isset($_GET['idUseSelect']) ?  'value="'.$data['email'].'" readonly': '' ; ?> >
                </div>
                <div class="w-full mb-2">
                    <label class="font-bold" for="nombre">Nombre</label><br>
                    <input class="border border-solid border-gray-400 rounded w-full px-2 py-1 text-gray-500 font-semibold" type="text" name="nombre" placeholder="Nombre" <?php echo isset($_GET['idUseSelect']) ?  'value="'.$data['nombre'].'"': '' ; ?> >
                </div>
                <div class="w-full mb-2">
                    <label class="font-bold" for="apellido">Apellido</label><br>
                    <input class="border border-solid border-gray-400 rounded w-full px-2 py-1 text-gray-500 font-semibold" type="text" name="apellido" placeholder="Apellido" <?php echo isset($_GET['idUseSelect']) ?  'value="'.$data['apellido'].'"': '' ; ?>>
                </div>
                <div class="w-full mb-2">
                    <label class="font-bold" for="direccion">Direccion</label><br>
                    <input class="border border-solid border-gray-400 rounded w-full px-2 py-1 text-gray-500 font-semibold" type="text" name="direccion" placeholder="Direccion" <?php echo isset($_GET['idUseSelect']) ?  'value="'.$data['direccion'].'"': '' ; ?> >
                </div>
                <div class="w-full mb-2">
                    <label class="font-bold" for="fechaNacimiento">Fecha de Nacimiento</label><br>
                    <input class="border border-solid border-gray-400 rounded w-full px-2 py-1 text-gray-500 font-semibold" type="date" max="2008-12-31" name="fechaNacimiento" <?php echo isset($_GET['idUseSelect']) ?  'value="'.$data['fechaNacimiento'].'"': '' ; ?>>
                </div>
                <input type="hidden" name="id_rol" value="2">
                <input type="hidden" name="estado" value="Activo" >
                <div class="w-full mb-2">
                    <label class="font-bold" for="id_clase">Clase Asignada</label><br>
                    <select class="border border-solid border-gray-400 rounded w-full px-2 py-1 text-gray-500 font-semibold" name="id_clase">
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
                <div class="w-full flex justify-end">
                    <button class="bg-gray-500 border rounded px-2 py-1 text-white font-semibold" type="button" id="cerrarModal">Cerrar</button>
                    <button class="bg-blue-500 border rounded px-2 py-1 text-white font-semibold" type="submit"  name="<?php echo isset($_GET['idUseSelect']) ?  'btnEditMaestro': 'btnCrearMestro' ; ?>" ><?php echo isset($_GET['idUseSelect']) ?  'Editar': 'Crear' ; ?></button>
                </div>
            </form>    
        </div>
    </div>
</div>

    
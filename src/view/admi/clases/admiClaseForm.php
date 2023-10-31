<?php 
$maestros = $_SESSION['MAESTROS_DISPONIBLE'];
if (isset($_GET['idUseSelect'])) {
    $data = $_SESSION['CLASS_FOR_EDIT'];
}


if (isset($_GET['create'])) {
    unset($_SESSION['CLASS_FOR_EDIT']);
} 

?>

<div id="modal-container"
        class=" fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-70">
        <div class="bg-white px-1 rounded-lg shadow-lg w-96">
            <div class="flex justify-between border-b border-solid border-gray-400 items-center w-full h-20">
                <p class="text-4xl font-semibold ml-2"><?php echo isset($_GET['idUseSelect']) ? "Editar Clase" : "Agregar Clase" ; ?></p>
                <button class="text-gray-600 hover:text-gray-800 h-full w-5  flex flex-row-reverse mr-2" id="close-modal">×</button>
            </div>
            <div class="p-4">
                <form action="/index.php" method="post">
                    <input type="hidden" name="id" value="<?php echo isset($_GET['idUseSelect']) ? $_GET['idUseSelect'] : "" ; ?>">
                    <div class="w-full mb-2">
                        <label for="nombre" class="font-bold">Nombre de la Materia</label><br>
                        <input class="border border-solid border-gray-400 rounded w-full px-2 py-1 text-gray-500 font-semibold" type="text" name="nombre" placeholder="Nombre de la materia" required <?php echo isset($_GET['idUseSelect']) ?  'value="'.$data['nombre'].'" readonly': '' ; ?> >
                    </div>
                    <div class="w-full mb-2">
                        <label for="id_maestro" class="font-bold" >Maestro Disponible Para La Clase</label><br>
                        <select class="border border-solid border-gray-400 rounded w-full px-2 py-1 text-gray-500 font-semibold" name="id_maestro" >
                            <option >Sin Asignar</option>
                            <?php 
                                if (isset($data['maestro'])) {
                                    echo '<option value="'.$data['id_maestro'].'" selected>'.$data['maestro'].' (Actual)</option>';
                                }
                                
                                foreach ($maestros as $maestro) {
                            ?>
                            <option value="<?php echo  $maestro['id_maestro']; ?>" ><?php echo $maestro['maestro'] ; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    
                    <div class="w-full flex justify-end">
                        <button class="bg-gray-500 border rounded px-2 py-1 text-white font-semibold" type="button" id="cerrarModal">Cerrar</button>
                        <button class="bg-blue-500 border rounded px-2 py-1 text-white font-semibold" type="submit"  name="<?php echo isset($_GET['idUseSelect']) ?  'btnEditClase': 'btnCrearClase' ; ?>" ><?php echo isset($_GET['idUseSelect']) ?  'Editar': 'Crear' ; ?></button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

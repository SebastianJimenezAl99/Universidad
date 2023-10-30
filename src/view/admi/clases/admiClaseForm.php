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
        <div class="bg-white px-1 py-5 rounded-lg shadow-lg w-96">
            <div class="flex justify-between border-b-2 border-solid border-gray-400 ">
                <p class="text-lg font-semibold"><?php echo isset($_GET['idUseSelect']) ? "Editar Clase" : "Agregar Clase" ; ?></p>
                <button class="text-gray-600 hover:text-gray-800" id="close-modal">×</button>
            </div>
            <div class="p-4">
                <form action="/index.php" method="post">
                    <input type="hidden" name="id" value="<?php echo isset($_GET['idUseSelect']) ? $_GET['idUseSelect'] : "" ; ?>">
                    <div>
                        <label for="nombre">Nombre de la Materia</label><br>
                        <input type="text" name="nombre" placeholder="Nombre de la materia" required <?php echo isset($_GET['idUseSelect']) ?  'value="'.$data['nombre'].'" readonly': '' ; ?> >
                    </div>
                    <div>
                        <label for="id_maestro">Maestro Disponible Para La Clase</label><br>
                        <select name="id_maestro" >
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
                    
                    <div>
                        <button type="button" id="cerrarModal">Cerrar</button>
                        <button type="submit"  name="<?php echo isset($_GET['idUseSelect']) ?  'btnEditClase': 'btnCrearClase' ; ?>" ><?php echo isset($_GET['idUseSelect']) ?  'Editar': 'Crear' ; ?></button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

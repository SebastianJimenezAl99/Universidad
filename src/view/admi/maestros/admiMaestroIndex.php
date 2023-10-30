<?php 
    $filasAll = $_SESSION['AllUSERS'];
    $filas = [];
    foreach ($filasAll as $fila) {
        if($fila['rol'] == 'Maestro' && $fila['estado'] == 'Activo'){
            $filas[] = $fila;
        }
    }

    //unset($_SESSION['AllUSERS']);
    if(isset($_GET['idUseSelect']) || isset($_GET['create'])){
        include_once($_SERVER["DOCUMENT_ROOT"]."/src/view/admi/maestros/admiMestroForm.php");
    }
    
?>
<div>
    <h1>Lista de Maestros</h1>
    <div>
        <div>
            <h2>Informacion de maestros</h2>
            <a href="/index.php?modulo=adminMaestros&create">Agregar Maestro</a>
        </div>
        
        <div>
            <table>
                <thead >
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Clases Asinadas</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                
                    foreach ($filas as $i => $fila) {
                ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $fila['nombre']." ".$fila['apellido'] ; ?></td>
                        <td><?php echo $fila['direccion']; ?></td>
                        <td><?php echo $fila['fechaNacimiento'] ; ?></td>
                        <td><?php echo $fila['clase'] ? $fila['clase']: '<span class="bg-yellow-500 rounded-md p-0.5 font-bold text-xs">Sin asignación</span>' ; ?></td>
                        <td class="text-center"><a href="index.php?modulo=adminMaestros&idUseSelect=<?php echo $fila['usuarioID'];?>"><i class="fa-solid fa-pen-to-square" style="color: #4391A2;"></i></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <div>
            <span>Mostrando de 1 a 10 de 36 registros</span>
            </div>
        </div>
    </div>
</div>


<script>
        
        if (document.getElementById('modal-container')) {
            const modalContainer = document.getElementById('modal-container');
            const closeModalButton = document.getElementById('close-modal');
            const botonClose =  document.getElementById('cerrarModal');
            

            botonClose.addEventListener('click', () => {
                modalContainer.classList.add('hidden');
                window.location.href = 'index.php'; 
            });

            closeModalButton.addEventListener('click', () => {
                modalContainer.classList.add('hidden');
                window.location.href = 'index.php'; 
            });

            modalContainer.addEventListener('click', (event) => {
                if (event.target === modalContainer) {
                    modalContainer.classList.add('hidden');
                    window.location.href = 'index.php'; 
                }
            });

        }
        
    </script>
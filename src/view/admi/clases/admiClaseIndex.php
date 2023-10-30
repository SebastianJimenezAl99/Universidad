<?php 
    $filas =  $_SESSION['LISTA_CLASES'];
    if(isset($_GET['idUseSelect']) || isset($_GET['create'])){
        include_once($_SERVER["DOCUMENT_ROOT"]."/src/view/admi/clases/admiClaseForm.php");
    }
    
?>
<div>
    <h1>Lista de Clases</h1>
    <div>
        <div>
            <h2>Información de Clases</h2>
            <a href="/index.php?modulo=adminClases&create">Agregar Clase</a>
        </div>
        
        <div>
            <table>
                <thead >
                    <tr>
                        <th>#</th>
                        <th>Clase</th>
                        <th>Maestro</th>
                        <th>Alumnos Inscritos</th> 
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                
                    foreach ($filas as $i => $fila) {
                ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo isset($fila['maestro']) ? $fila['maestro'] :'<span class="bg-yellow-500 rounded-md p-0.5 font-bold text-xs">Sin asignación</span>'; ?></td>
                        <td><?php echo $fila['alumnosInscritos']== 0 ? '<span class="bg-yellow-500 rounded-md p-0.5 font-bold text-xs">Sin alumnos</span>': $fila['alumnosInscritos'] ; ?></td>
                        <td class="text-center">
                            <a href="index.php?modulo=adminClases&idUseSelect=<?php echo $fila['id_clase'];?>"><i class="fa-solid fa-pen-to-square" style="color: #4391A2;"></i></a>
                            <a href="index.php?modulo=adminClases&delectClase&idUseSelect=<?php echo $fila['id_clase'];?>"><i class="fa-solid fa-trash" style="color: #ef0101;"></i></a>
                        </td>
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
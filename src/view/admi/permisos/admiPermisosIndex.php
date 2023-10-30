<?php 
    $filas = $_SESSION['AllUSERS'];
    //unset($_SESSION['AllUSERS']);
    if(isset($_GET['idUseSelect'])){
        include_once($_SERVER["DOCUMENT_ROOT"]."/src/view/admi/permisos/admiPermisoEdit.php");
    }
    
?>
<div>
    <h1>Lista de Permisos</h1>
    <div>
        <h2>Informacion de Permisos</h2>
        <div>
            <table>
                <thead >
                    <tr>
                        <th>#</th>
                        <th>Email/Usuario</th>
                        <th>Permiso</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($filas as $fila) {
                ?>
                    <tr>
                        <td><?php echo $fila['usuarioID']; ?></td>
                        <td><?php echo $fila['email']; ?></td>
                        <td class="text-center"><?php echo $fila['rol']; ?></td>
                        <td><?php echo $fila['estado']; ?></td>
                        <td class="text-center"><a href="index.php?modulo=adminPermisos&idUseSelect=<?php echo $fila['usuarioID'];?>"><i class="fa-solid fa-pen-to-square" style="color: #4391A2;"></i></a></td>
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
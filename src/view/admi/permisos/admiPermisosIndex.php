<?php 
    $data =  $_SESSION['AllUSERS'];
    $menorLimit = 1;
    $mayorLimit = 10;
    $cantidad = count($data);
    $grupo = ceil($cantidad/10);
    $contador = 0;
    for ($i=0; $i < $grupo ; $i++) { 
        for ($j=0; $j < 10; $j++) { 
            $filas[$i][$contador] =  $data[$contador];
            $contador++;
            if ($contador == $cantidad) {
                break;
            }
        }    
    }
    if(isset($_GET['idUseSelect'])){
        include_once($_SERVER["DOCUMENT_ROOT"]."/src/view/admi/permisos/admiPermisoEdit.php");
    }
    
?>
<div>
    <h1 class="mb-3 text-xl">Lista de Permisos</h1>
    <div class="bg-white border-solid border border-gray-400 rounded">
        <div class="p-3 flex justify-between border-b border-gray-400 border-solid items-center">
            <h2 class="text-lg font-semibold">Información de Permisos</h2>
        </div>

        <div class="p-3 overflow-x-auto max-h-400 overflow-y-auto">
            <table class="w-full text-xs">
                <thead>
                    <tr>
                        <th class="p-2 border-y-2">#</th>
                        <th class="p-2 border-y-2">ID Usuario</th>
                        <th class="p-2 border-y-2">Email/Usuario</th>
                        <th class="p-2 border-y-2">Permiso</th>
                        <th class="p-2 border-y-2">Estado</th>
                        <th class="p-2 border-y-2">Acciones</th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php 
                    $alternarColor = true;
                    foreach ($filas[$_GET['pagina']-1] as $i => $fila) {
                        $alternarColor = !$alternarColor;
                        $filaClase = $alternarColor ? 'bg-white' : 'bg-gray-300';
                        if ($fila['rol'] == 'Administrador') {
                            $rolClass = "bg-yellow-500 font-bold rounded px-1";
                        }else if($fila['rol'] == 'Maestro'){
                            $rolClass = "bg-sky-600 text-white font-bold rounded px-1";
                        }else{
                            $rolClass = "bg-gray-500 text-white font-bold rounded px-1";
                        }

                        if ($fila['estado']=='Activo') {
                            $estadoClase = "bg-green-600 text-white font-bold rounded px-1";
                        }else{
                            $estadoClase = 'bg-red-600 text-white font-bold rounded px-1' ;
                        }

                    ?>
                    
                    <tr class="<?php echo $filaClase; ?>">
                        <td class="p-2 border"><?php echo $i+1 ?></td>
                        <td class="p-2 border"><?php echo $fila['usuarioID']; ?></td>
                        <td class="p-2 border"><?php echo $fila['email']; ?></td>
                        <td class="p-2 border text-center"><span class="<?php echo $rolClass; ?>"><?php echo $fila['rol']; ?></span></td>
                        <td class="p-2 border"><span class="<?php echo $estadoClase; ?>"><?php echo $fila['estado']; ?></span></td>
                        <td class="p-2 border text-center">
                            <a <?php echo $fila['usuarioID'] == 2 ? 'href="index.php?modulo=adminPermisos&pagina='.$_GET['pagina'].'" clase="pointer-events-none text-gray-400"' : 'href="index.php?modulo=adminPermisos&pagina='.$_GET['pagina'].'&idUseSelect='.$fila['usuarioID'].'"'?> 
                            href="index.php?modulo=adminPermisos&pagina=<?php echo $_GET['pagina'] ?>&idUseSelect=<?php echo $fila['usuarioID'];?>">
                                <i class="fa-solid fa-pen-to-square"  <?php echo $fila['usuarioID'] == 2 ? "" : 'style="color: #4391A2;"'?> ></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="flex justify-between mt-4">
                <span>Mostrando de 1 a 10 de <?php echo $cantidad;?> registros</span>
                <div class="border border-gray-400 rounded text-sm p-1 w-28 flex justify-between">
                    <a class="border-r border-gray-400 pr-2 <?php echo $_GET['pagina'] > 1 ? 'text-blue-600' : 'pointer-events-none text-gray-400"' ?>" <?php echo $_GET['pagina'] > 1 ? 'href="index.php?modulo=adminPermisos&pagina='.($_GET['pagina']-1).'"' : 'href="#" class="pointer-events-none text-gray-400"' ?> >Atrás</a>
                    <a  <?php echo $_GET['pagina'] < $grupo ? 'href="index.php?modulo=adminPermisos&pagina='.($_GET['pagina']+1).'"class="text-blue-600"' : 'href="#" class="pointer-events-none text-gray-400"' ?> >Siguiente</a>
                </div>
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
                window.location.href = 'index.php?pagina=<?php echo $_GET['pagina'] ?>'; 
            });

            closeModalButton.addEventListener('click', () => {
                modalContainer.classList.add('hidden');
            window.location.href = 'index.php?pagina=<?php echo $_GET['pagina'] ?>'; 
            });

            modalContainer.addEventListener('click', (event) => {
                if (event.target === modalContainer) {
                    modalContainer.classList.add('hidden');
                window.location.href = 'index.php?pagina=<?php echo $_GET['pagina'] ?>'; 
                }
            });

        }
        
    </script>
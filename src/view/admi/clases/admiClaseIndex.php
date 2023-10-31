<?php 
    $data =  $_SESSION['LISTA_CLASES'];
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
    
    if(isset($_GET['idUseSelect']) || isset($_GET['create'])){
        include_once($_SERVER["DOCUMENT_ROOT"]."/src/view/admi/clases/admiClaseForm.php");
    }
    
?>
<div>
    <h1 class="mb-2 text-xl">Lista de Clases</h1>
    <div class="bg-white border-solid border border-gray-400 rounded">
        <div class="p-3 flex justify-between border-b border-gray-400 border-solid items-center">
            <h2 class="text-lg font-semibold">Información de Clases</h2>
            <a class="bg-blue-600 p-2 text-xs text-white font-bold rounded" href="/index.php?modulo=adminClases&pagina=1&create">Agregar Clase</a>
        </div>
        
        <div class="p-3 overflow-x-auto max-h-400 overflow-y-auto">
        <table class="w-full text-xs">
            <thead>
                <tr>
                    <th class="p-2 border-y-2 ">#</th>
                    <th class="p-2 border-y-2 ">Clase</th>
                    <th class="p-2 border-y-2 ">Maestro</th>
                    <th class="p-2 border-y-2 ">Alumnos Inscritos</th>
                    <th class="p-2 border-y-2 ">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $alternarColor = true;
                    foreach ($filas[$_GET['pagina']-1 ] as $i => $fila) {
                        $alternarColor = !$alternarColor;
                        $filaClase = $alternarColor ? 'bg-white' : 'bg-gray-300';
                ?>
                <tr class="<?php echo $filaClase; ?>">
                    <td class="p-2 border"><?php echo $i+1; ?></td>
                    <td class="p-2 border"><?php echo $fila['nombre']; ?></td>
                    <td class="p-2 border"><?php echo isset($fila['maestro']) ? $fila['maestro'] : '<span class="bg-yellow-500 rounded-md p-0.5 font-bold text-xs">Sin asignación</span>'; ?></td>
                    <td class="border"><?php echo $fila['alumnosInscritos'] == 0 ? '<span class="bg-yellow-500 rounded-md p-0.5 font-bold text-xs">Sin alumnos</span>' : $fila['alumnosInscritos']; ?></td>
                    <td class="p-2 border text-center">
                        <a href='index.php?modulo=adminClases&pagina=<?php echo $_GET['pagina']; ?>&idUseSelect=<?php echo $fila['id_clase']; ?>'><i class="fa-solid fa-pen-to-square" style="color: #4391A2;"></i></a>
                        <a href="index.php?modulo=adminClases&pagina=<?php echo $_GET['pagina']; ?>&idDelete=<?php echo $fila['id_clase']; ?>&delectClase=false"><i class="fa-solid fa-trash" style="color: #ef0101;"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

            <div class="flex justify-between">
                <?php
                    $registrosPagina = 10;
                    $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
                    $totalRegistros = $cantidad;
                    $inicio = (($paginaActual-1) * $registrosPagina)+1;
                    $fin = min(($inicio-1) + $registrosPagina, $totalRegistros);
                ?>
                <span>Mostrando de <?= $inicio ?> a <?= $fin ?> de <?php echo $cantidad;?> registros</span>
                <div class="border border-gray-400 rounded text-sm p-1 w-28 flex justify-between">
                    <a class="border-r border-gray-400 pr-2 <?php echo $_GET['pagina'] > 1 ? 'text-blue-600' : 'pointer-events-none text-gray-400"' ?>" <?php echo $_GET['pagina'] > 1 ? 'href="index.php?modulo='.$_SESSION['MODULO'].'&pagina='.($_GET['pagina']-1).'"' : 'href="#" class="pointer-events-none text-gray-400"' ?> >Atrás</a>
                    <a  <?php echo $_GET['pagina'] < $grupo ? 'href="index.php?modulo='.$_SESSION['MODULO'].'&pagina='.($_GET['pagina']+1).'"class="text-blue-600"' : 'href="#" class="pointer-events-none text-gray-400"' ?> >Siguiente</a>
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
                window.location.href = 'index.php?pagina=<?php echo $_GET['pagina']; ?>'; 
            });

            closeModalButton.addEventListener('click', () => {
                modalContainer.classList.add('hidden');
                window.location.href = 'index.php?pagina=<?php echo $_GET['pagina']; ?>'; 
            });

            modalContainer.addEventListener('click', (event) => {
                if (event.target === modalContainer) {
                    modalContainer.classList.add('hidden');
                    window.location.href = 'index.php?pagina=<?php echo $_GET['pagina']; ?>'; 
                }
            });

        }
        
    </script>
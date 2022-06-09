<div class="container-sm roundedshadow-lg p-3 mt-5 mb-5" style="padding-bottom: 50px;">
	<div class="col text-center">
		<?php if($pagina == 1 && $pagina != $numero_paginas) {
			echo '<a class="btn boton-pag" href = "creaciones.php?pagina='. $pagina .'">Pág.' . $pagina . '</a>';
			echo '<a class="btn boton-pag" href = "creaciones.php?pagina='. $pagina+1 .'">&#8594</a>';
		}else if ($pagina == 1 && $pagina == $numero_paginas){
			echo '<a class="btn boton-pag" href = "creaciones.php?pagina=' . $pagina . '">Pág.' . $pagina . '</a>';
		}else if ($pagina != 1 && $pagina != $numero_paginas){
			echo '<a class="btn boton-pag" href = "creaciones.php?pagina=' . $pagina-1 . '">&#8592</a>';
			echo '<a class="btn boton-pag" href = "creaciones.php?pagina=' . $pagina . '">Pág.' . $pagina . '</a>';
			echo '<a class="btn boton-pag" href = "creaciones.php?pagina='. $pagina+1 .'">&#8594</a>';
		} else if ($pagina != 1 && $pagina == $numero_paginas){
			echo '<a class="btn boton-pag" href = "creaciones.php?pagina=' . $pagina-1 . '">&#8592</a>';
			echo '<a class="btn boton-pag" href = "creaciones.php?pagina=' . $pagina . '">Pág.' . $pagina . '</a>';
		}?>
	</div>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Obtener los valores del formulario
	$nombre 	= $_POST['nombre'] ?? '';
	if (!empty($nombre)) {
		// Ruta y nombre del archivo
		$ruta_archivo = "./passw.txt";

		// Verificar si el archivo existe
		$archivo_existe = file_exists($ruta_archivo);

		// Obtener el número de registros actuales o inicializar en 0 si el archivo no existe
		$num_registros = 0;
		if ($archivo_existe) {
			$lineas = file($ruta_archivo, FILE_SKIP_EMPTY_LINES);
			foreach ($lineas as $linea) {
				if (preg_match('/^\d+\./', $linea)) {
					$num_registros++;
				}
			}
		}

		// Incrementar el número de registros para el nuevo registro
		$num_registros++;

		// Abrir el archivo en modo de escritura
		$file = fopen($ruta_archivo, "a");
		if ($file) {
			// Escribir la cabecera si el archivo no existe
			if (!$archivo_existe) {
			}

			// Escribir el nuevo registro en el archivo con el formato requerido
			fwrite($file, "$nombre" . PHP_EOL);

			// Cerrar el archivo
			fclose($file);

			// Redirigir a una página específica
			header('Location: confirm.php');
			exit();
		} else {
			echo "Erro ao abrir ficheiro.";
		}
	} else {
		echo "Por favor preencha todos os campos do formulário.";
	}
} else {
	echo "Acesso inválido.";
    
}

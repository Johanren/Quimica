<?php 



class ResultadosActividadControlador {
	
	public function registrarResultadoActividadControlador() {
		if (isset($_POST['regResultadoActividad'])) {

			$resultadoActividadModelo = new ResultadosActividadModelo();
			$resultado = $resultadoActividadModelo->registrarResultadoActividadModelo($_POST['idPregunta']);

			if ($resultado) {
				header('location:index.php?action=ok1');
			}
			else{
				header('location:index.php?action=fa1');	
			}
		
		}
	}

	public function listarResultado(){
		$id = $_SESSION['idPersonas'];
		$notas = new ResultadosActividadModelo();
		$respuesta = $notas->listarResultadoModelo($id);
		return $respuesta;
	}

	function listarEstudiantesResultadoControlador(){
		$id = $_GET['id'];
		$listarEsRes = new ResultadosActividadModelo();
		$respuesta = $listarEsRes->listarEstudiantesResultadoModelo($id);
		return $respuesta;
	}

	public function BuscarFechaActividad(){
		if(isset($_POST['buscar'])){
			switch($_POST['camBuscar']){
				case 'fechaPresentacion':
				$campo = "fechaPresentacion";
				break;
				default:
				$campo = "";
				break;
			}
			if(isset($_POST['campbuscar'])){
				$dato = $_POST['campbuscar'];
			}else{
				$dato = "";
			}
			$estudiante = new ResultadosActividadModelo();
			$persona = $estudiante-> BuscarFechaActividadModelo($campo, $dato);
			return $persona;
		}
	}
}

?>
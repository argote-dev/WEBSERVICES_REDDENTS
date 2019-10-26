<?php 
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;
	
	$app = new \Slim\App;
	
	
	/* Metodo para listar todos los odontologos */
	$app->get('/odontologos', function (Request $request, Response $response) {
		
		try {
			$objCrud = new Crud();
			$objCrud->setTablas("odontologo");
			$objCrud->setExpresion("*");
			$resultado = $objCrud->read();

			if ($resultado > 0) {
				echo json_encode($objCrud->getFilas());
			}else {
				echo json_encode(false);
			}

		} catch (PDOException $e) {
			echo '{"Error": {"text":'.$e->getMessage().'}';
		}
	});

	/* Metodo para listar/buscar un solo odontologo */
	$app->get('/odontologos/{id}', function (Request $request, Response $response) {

			$id = $request->getAttribute('id');
		
		try {
			$objCrud = new Crud();
			$objCrud ->setTablas("odontologo");
			$objCrud ->setExpresion("*");
			$objCrud ->setCondicion("ODO_ID = $id");
			$resultado = $objCrud->read();

			if ($resultado > 0) {
				echo json_encode($objCrud->getFilas());
			}else {
				echo json_encode(false);
			}

		} catch (PDOException $e) {
			echo '{"Error": {"text":'.$e->getMessage().'}';
		}
	});

	/* Metodo para insertar un odontologo */
	$app->post('/odontologos/nuevo', function (Request $request, Response $response) {

		$documento = $request->getParam('documento');
		$tipoDocumento = $request->getParam('tipoDocumento');
		$primer_nombre = $request->getParam('primer_nombre');
		$segundo_nombre = $request->getParam('segundo_nombre');
		$primer_apellido = $request->getParam('primer_apellido');
		$segundo_apellido = $request->getParam('segundo_apellido');
		$direccion = $request->getParam('direccion');
		$telefono = $request->getParam('telefono');
		$especialidad = $request->getParam('especialidad');
		$fecnacimiento = $request->getParam('fecnacimiento');
		$fecregistro = $request->getParam('fecregistro');
		$genero = $request->getParam('genero');
		$foto = $request->getParam('foto');

		// JSON Para pruebas.

		// [{"documento":"1","tipoDocumento":"CC","primer_nombre":"Juan","segundo_nombre":"Martin","primer_apellido":"Perez","segundo_apellido":"Quiñones","direccion":"El centro","telefono":"34255252","especialidad":"Ortodoncia","fecnacimiento":"2019-10-01","fecregistro":"2019-10-14","genero":"M","foto":"jaja.jpg"}]

		try {
			$objCrud = new Crud();
			$objCrud ->setTablas("odontologo");
			$objCrud ->setCampos("ODO_ID, ODO_TIPO_ID, ODO_PRIMER_NOMBRE, ODO_SEGUNDO_NOMBRE, ODO_PRIMER_APELLIDO, ODO_SEGUNDO_APELLIDO, ODO_DIRECCION, ODO_TELEFONO, ODO_ESPECIALIDAD, ODO_FECNACIMIENTO, ODO_FECREGISTRO, ODO_GENERO, ODO_FOTO");
			$objCrud ->setValores("'$documento','$tipoDocumento','$primer_nombre','$segundo_nombre','$primer_apellido','$segundo_apellido','$direccion','$telefono','$especialidad','$fecnacimiento','$fecregistro','$genero','$foto'");
			$resultado = $objCrud ->create();

			echo json_encode($resultado);

		} catch (PDOException $e) {
			echo '{"Error": {"text":'.$e->getMessage().'}';
		}
	});

	/* Metodo para actualizar un odontologo */
	$app->put('/odontologos/actualizar/{id}', function (Request $request, Response $response) {

		$documento = $request->getAttribute('id');
		$tipoDocumento = $request->getParam('tipoDocumento');
		$primer_nombre = $request->getParam('primer_nombre');
		$segundo_nombre = $request->getParam('segundo_nombre');
		$primer_apellido = $request->getParam('primer_apellido');
		$segundo_apellido = $request->getParam('segundo_apellido');
		$direccion = $request->getParam('direccion');
		$telefono = $request->getParam('telefono');
		$especialidad = $request->getParam('especialidad');
		$fecnacimiento = $request->getParam('fecnacimiento');
		$fecregistro = $request->getParam('fecregistro');
		$genero = $request->getParam('genero');
		$foto = $request->getParam('foto');

		try {
			$objCrud = new Crud();
			$objCrud ->setTablas("odontologo");
			$objCrud ->setCampos(" ODO_TIPO_ID = '$tipoDocumento', ODO_PRIMER_NOMBRE = '$primer_nombre', ODO_SEGUNDO_NOMBRE = '$segundo_nombre', ODO_PRIMER_APELLIDO = '$primer_apellido', ODO_SEGUNDO_APELLIDO = '$segundo_apellido', ODO_DIRECCION = '$direccion', ODO_TELEFONO = '$telefono', ODO_ESPECIALIDAD = '$especialidad', ODO_FECNACIMIENTO = '$fecnacimiento', ODO_FECREGISTRO = '$fecregistro', ODO_GENERO = '$genero', ODO_FOTO = '$foto'");
			$objCrud ->setCondicion("ODO_ID = '$documento'");
			$resultado = $objCrud ->update();

			echo json_encode($resultado);
			

		} catch (PDOException $e) {
			echo '{"Error": {"text":'.$e->getMessage().'}';
		}
	});

	/* Metodo para eliminar un odontologo */
	$app->delete('/odontologos/eliminar/{id}', function (Request $request, Response $response) {

		$documento = $request->getAttribute('id');

		try {
			$objCrud = new Crud();
			$objCrud ->setTablas("odontologo");
			$objCrud ->setCondicion("ODO_ID = '$documento'");
			$resultado = $objCrud ->delete();

			echo json_encode($resultado);

		} catch (PDOException $e) {
			echo '{"Error": {"text":'.$e->getMessage().'}';
		}
	});
 ?>
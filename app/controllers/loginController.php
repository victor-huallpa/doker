<?php

	namespace app\controllers;
	use app\models\mainModel;

	class loginController extends mainModel{

		/*----------  Controlador iniciar sesion  ----------*/
		public function iniciarSesionControlador(){

			$usuario=$this->limpiarCadena($_POST['login_usuario']);
		    $clave=$this->limpiarCadena($_POST['login_clave']);

		    # Verificando campos obligatorios #
		    if($usuario=="" || $clave==""){
		        echo "<script>
			        Swal.fire({
					  icon: 'error',
					  title: 'Ocurrió un error inesperado',
					  text: 'No has llenado todos los campos que son obligatorios'
					});
				</script>";
		    }else{

			    # Verificando integridad de los datos #
			    if($this->verificarDatos("[a-zA-Z0-9]{4,20}",$usuario)){
			        echo "<script>
				        Swal.fire({
						  icon: 'error',
						  title: 'Ocurrió un error inesperado',
						  text: 'El USUARIO no coincide con el formato solicitado'
						});
					</script>";
			    }else{

			    	# Verificando integridad de los datos #
				    if($this->verificarDatos("[a-zA-Z0-9$@\.]{6,100}",$clave)){
				        echo "<script>
					        Swal.fire({
							  icon: 'error',
							  title: 'Ocurrió un error inesperado',
							  text: 'La CLAVE no coincide con el formato solicitado'
							});
						</script>";
				    }else{

					    # Verificando usuario #
					    $check_usuario=$this->ejecutarConsulta("SELECT * FROM usuarios WHERE usuario_nombre='$usuario'");

					    if($check_usuario->rowCount()==1){	

					    	$check_usuario=$check_usuario->fetch();
							// var_dump($check_usuario['usuario_pass']);
							// exit();

					    	if($check_usuario['usuario_nombre']==$usuario && password_verify($clave,$check_usuario['usuario_pass'])){

					    		$_SESSION['id']=$check_usuario['usuario_id'];
					            $_SESSION['usuario']=$check_usuario['usuario_nombre'];
					            // $_SESSION['apellido']=$check_usuario['usuario_apellido'];
					            // $_SESSION['usuario']=$check_usuario['usuario_usuario'];
					            // $_SESSION['foto']=$check_usuario['usuario_foto'];


					            if(headers_sent()){
					                echo "<script> window.location.href='".APP_URL."dashboard/'; </script>";
					            }else{
					                header("Location: ".APP_URL."dashboard/");
					            }

					    	}else{
					    		echo "<script>
							        Swal.fire({
									  icon: 'error',
									  title: 'Ocurrió un error inesperado',
									  text: 'Usuario o clave incorrectos 2'
									});
								</script>";
					    	}

					    }else{
					        echo "<script>
						        Swal.fire({
								  icon: 'error',
								  title: 'Ocurrió un error inesperado',
								  text: 'Usuario o clave incorrectos'
								});
							</script>";
					    }
				    }
			    }
		    }
		}

		/*----------  Controlador registrar usuario  ----------*/
		public function registrarUsuarioControlador(){

			# Almacenando datos#
			$nombre=$this->limpiarCadena($_POST['persona_nombre']);
			$apellido=$this->limpiarCadena($_POST['persona_apellido']);

			$email=$this->limpiarCadena($_POST['persona_correo']);
			$telefono=$this->limpiarCadena($_POST['persona_telefono']);
			$usuario=$this->limpiarCadena($_POST['usuario_nombre']);
			$clave1=$this->limpiarCadena($_POST['usuario_pass']);
			$clave2=$this->limpiarCadena($_POST['confirm_pass']);


			# Verificando campos obligatorios #
			if($nombre=="" || $apellido=="" || $usuario=="" || $clave1=="" || $clave2=="" || $email=="" || $telefono==""){
				echo "<script>
						Swal.fire({
						icon: 'error',
						title: 'Ocurrió un error inesperado',
						text: 'No has llenado todos los campos que son obligatorios'
						});
					</script>";

				exit();
			}

			# Verificando integridad de los datos #
			if($this->verificarDatos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$nombre)){
				echo "<script>
						Swal.fire({
						icon: 'error',
						title: 'Ocurrió un error inesperado',
						text: 'El NOMBRE no coincide con el formato solicitado'
						});
					</script>";
				exit();
			}

			if($this->verificarDatos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$apellido)){
				echo "<script>
						Swal.fire({
						icon: 'error',
						title: 'Ocurrió un error inesperado',
						text: 'El APELLIDO no coincide con el formato solicitado'
						});
					</script>";
				exit();
			}

			if($this->verificarDatos("[a-zA-Z0-9]{4,20}",$usuario)){
				echo "<script>
						Swal.fire({
						icon: 'error',
						title: 'Ocurrió un error inesperado',
						text: 'El USUARIO no coincide con el formato solicitado'
						});
					</script>";
				exit();
			}

			if($this->verificarDatos("[0-9]{4,20}",$telefono)){
				echo "<script>
						Swal.fire({
						icon: 'error',
						title: 'Ocurrió un error inesperado',
						text: 'El elefono no coincide con el formato solicitado'
						});
					</script>";
				exit();
			}
			if($this->verificarDatos("[a-zA-Z0-9$@.-]{7,100}",$clave1) || $this->verificarDatos("[a-zA-Z0-9$@.-]{7,100}",$clave2)){
				echo "<script>
						Swal.fire({
						icon: 'error',
						title: 'Ocurrió un error inesperado',
						text: 'Las CLAVES no coinciden con el formato solicitado'
						});
					</script>";
				exit();
			}

			# Verificando email #
			if($email!=""){
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					$check_email=$this->ejecutarConsulta("SELECT persona_correo FROM personas WHERE persona_correo='$email'");
					if($check_email->rowCount()>0){
						echo "<script>
								Swal.fire({
								icon: 'error',
								title: 'Ocurrió un error inesperado',
								text: 'El EMAIL que acaba de ingresar ya se encuentra registrado en el sistema, por favor verifique e intente nuevamente'
								});
							</script>";
						exit();
					}
				}else{
					echo "<script>
							Swal.fire({
							icon: 'error',
							title: 'Ocurrió un error inesperado',
							text: 'Ha ingresado un correo electrónico no valido'
							});
						</script>";
					exit();
				}
			}

			# Verificando claves #
			if($clave1!=$clave2){
				echo "<script>
							Swal.fire({
							icon: 'error',
							title: 'Ocurrió un error inesperado',
							text: 'Las contraseñas que acaba de ingresar no coinciden, por favor verifique e intente nuevamente'
							});
						</script>";
				exit();
			}else{
				$clave=password_hash($clave1,PASSWORD_BCRYPT,["cost"=>10]);
			}

			# Verificando usuario #
			$check_usuario=$this->ejecutarConsulta("SELECT usuario_nombre FROM usuarios WHERE usuario_nombre='$usuario'");
			if($check_usuario->rowCount()>0){
				echo "<script>
							Swal.fire({
							icon: 'error',
							title: 'Ocurrió un error inesperado',
							text: 'El USUARIO ingresado ya se encuentra registrado, por favor elija otro'
							});
						</script>";
				exit();
			}

			$usuario_datos_reg=[
				[
					"campo_nombre" => "usuario_nombre",
					"campo_marcador" => ":Usuario",
					"campo_valor" => $usuario
				],
				[
					"campo_nombre" => "usuario_pass",
					"campo_marcador" => ":Clave",
					"campo_valor" =>$clave
				]
			];
			$registrar_usuario=$this->guardarDatos("usuarios", $usuario_datos_reg, true);

			if($registrar_usuario){
				$persona_datos = [
					[
						"campo_nombre" => "persona_nombre",
						"campo_marcador" => ":Nombre",
						"campo_valor" => $nombre
					],
					[
						"campo_nombre" => "persona_apellido",
						"campo_marcador" => ":Apellido",
						"campo_valor" => $apellido
					],
					[
						"campo_nombre" => "persona_correo",
						"campo_marcador" => ":Email",
						"campo_valor" => $email
					],
					[
						"campo_nombre" => "persona_telefono",
						"campo_marcador" => ":Telefono",
						"campo_valor" => $telefono
					],
					[
						"campo_nombre" => "persona_usuario",
						"campo_marcador" => ":UsuarioID",
						"campo_valor" => $registrar_usuario
					]
				];

				$this->guardarDatos("personas", $persona_datos);

				$log_datos = [
					[
						"campo_nombre" => "log_id_usuario",
						"campo_marcador" => ":UsuarioID",
						"campo_valor" => $registrar_usuario
					],
					[
						"campo_nombre" => "log_operacion",
						"campo_marcador" => ":Operacion",
						"campo_valor" => "creacion"
					]
				];

				if($this->guardarDatos("log_usuarios", $log_datos)){
					echo "<script>
							Swal.fire({
							icon: 'error',
							title: 'Ocurrió un error inesperado',
							text: 'El usuario ".$nombre." ".$apellido." se registro con exito'
							});
						</script>";
				}
				
			}else{
				echo "<script>
						Swal.fire({
						icon: 'error',
						title: 'Ocurrió un error inesperado',
						text: 'No se pudo registrar el usuario, por favor intente nuevamente'
						});
					</script>";
			}


		}

		/*----------  Controlador cerrar sesion  ----------*/
		public function cerrarSesionControlador(){

			session_destroy();

		    if(headers_sent()){
                echo "<script> window.location.href='".APP_URL."login/'; </script>";
            }else{
                header("Location: ".APP_URL."login/");
            }
		}

	}
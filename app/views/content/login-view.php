<div class="flex items-center justify-center min-h-screen">
  <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-center mb-6">Iniciar Sesión</h2>
    
    <form action="" method="POST" class="space-y-4" autocomplete="off">
      <div>
        <label for="login_usuario" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
        <input type="text" id="login_usuario" name="login_usuario" 
          class="mt-1 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label for="login_clave" class="block text-sm font-medium text-gray-700">Contraseña</label>
        <input type="password" id="login_clave" name="login_clave"  class="mt-1 block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
        Ingresar
      </button>
      
      <p class="text-center text-sm text-gray-600">
        ¿No tienes cuenta? <a href="<?php echo APP_URL; ?>register/" class="text-blue-500 hover:underline">Regístrate</a>
      </p>
    </form>
  </div>
</div>
<br>

<?php
// $clave = "123victor";
// $hash = password_hash($clave, PASSWORD_BCRYPT, ["cost" => 10]);
// echo $hash;
	if(isset($_POST['login_usuario']) && isset($_POST['login_clave'])){
		$insLogin->iniciarSesionControlador();
	}

<div class="max-w-lg mx-auto bg-white p-6 rounded-lg border border-gray-300 shadow-md">
  <!-- Botón de regresar -->
  <div class="mb-4">
    <button id="btn_regresar" class="text-blue-500 hover:underline flex items-center">
      ⬅ Regresar
    </button>
  </div>

  <h2 class="text-xl font-semibold text-center mb-4">Registro de Usuario</h2>
  
  <form action="" method="POST" autocomplete="off">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <!-- Nombre -->
      <div>
        <label class="block text-gray-700 text-sm">Nombre</label>
        <input type="text" name="persona_nombre" required 
          class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
      </div>

      <!-- Apellido -->
      <div>
        <label class="block text-gray-700 text-sm">Apellido</label>
        <input type="text" name="persona_apellido" required 
          class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
      </div>

      <!-- Correo -->
      <div class="md:col-span-2">
        <label class="block text-gray-700 text-sm">Correo Electrónico</label>
        <input type="email" name="persona_correo" required 
          class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
      </div>

      <!-- Teléfono -->
      <div class="md:col-span-2">
        <label class="block text-gray-700 text-sm">Teléfono</label>
        <input type="tel" name="persona_telefono" 
          class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
      </div>

      <!-- Usuario -->
      <div>
        <label class="block text-gray-700 text-sm">Nombre de Usuario</label>
        <input type="text" name="usuario_nombre" required 
          class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
      </div>

      <!-- Contraseña -->
      <div>
        <label class="block text-gray-700 text-sm">Contraseña</label>
        <input type="password" name="usuario_pass" required 
          class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
      </div>

      <!-- Confirmar Contraseña -->
      <div class="md:col-span-2">
        <label class="block text-gray-700 text-sm">Confirmar Contraseña</label>
        <input type="password" name="confirm_pass" required 
          class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
      </div>
    </div>

    <!-- Botón de registro -->
    <div class="mt-4 text-center">
      <button type="submit" 
        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
        Registrarse
      </button>
    </div>
  </form>
</div>

<?php
// $clave = "123victor";
// $hash = password_hash($clave, PASSWORD_BCRYPT, ["cost" => 10]);
// echo $hash;
	if(isset($_POST['persona_nombre']) && isset($_POST['persona_apellido']) && isset($_POST['persona_correo']) && isset($_POST['persona_telefono']) && isset($_POST['usuario_nombre']) && isset($_POST['usuario_pass']) && isset($_POST['confirm_pass'])){
		$insLogin->registrarUsuarioControlador();
	}

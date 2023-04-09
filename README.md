<div class="background-image">
  <div>
    <img src="https://i.pinimg.com/originals/23/45/f9/2345f9d305ed0635931f01407e7d668e.gif" alt="Punto de guardado" style="width: 250px;">
  </div>
  
  <h1>Evidencia 2 Diseño de aplicaciones web</h1>
  <h2>Angel Santiago Delgado Mendoza - 2959951</h2>
  <h3>Intrucciones:</h3>

  <p>Darás continuidad a la evidencia 1 y realizarás la codificación de siguiente proyecto. Considera que estas creando las interfaces de un perfil de administrador, el cual te va a permitir realizar lo siguiente:</p>

  <ol>
    <li>Crea un interfaz que te permita (ingresar, editar y eliminar) los productos de la empresa consideran los siguientes campos: id del producto, nombre, descripción, foto del producto, precio, cantidad en almacén (stock).</li>
    <li>De igual manera en el mismo proyecto crea una interfaz que te permita gestionar (Crear, editar, eliminar) los pedidos de productos que te hacen vía telefónica. Considera los siguientes campos: id del pedido, id del producto (este campo lo vas a consultar de la tabla de productos que ya tienes), cantidad, precio unitario (se consulta de la tabla producto), precio total, estatus del pedido (en proceso, en ruta o entregado).</li>
    <li>Cada vez que un pedido este en estado de entregado, debes descontar las unidades del stock.</li>
    <li>Agregar un login de usuario.</li>
  </ol>

  <p>En este proyecto deberás utilizar migraciones, seeders y/o factories.</p>
</div>

<style>
.background-image {
  background-image: url(https://i.pinimg.com/originals/23/45/f9/2345f9d305ed0635931f01407e7d668e.gif);
  background-size: cover;
  opacity: 0.9;
  padding: 50px;
}

.background-image div {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.background-image h1,
.background-image h2,
.background-image h3,
.background-image p,
.background-image ol {
  color: white;
}
</style>


<h3>Detalle Usuario</h3>
<br>
<div class="card" style="width: 20em;">
  <img src="https://www.pavilionweb.com/wp-content/uploads/2017/03/man-300x300.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Información Usuario</h5>
    <p><strong>Usuario</strong><br><?php echo @$usuario['nombre']; ?></p>
    <p><strong>Apellido Paterno</strong><br><?php echo @$usuario['apellido_paterno']; ?></p>
    <p><strong>Apellido Materno</strong><br><?php echo @$usuario['apellido_materno']; ?></p>
    <p><strong>Email</strong><br><?php echo @$usuario['email']; ?></p>
    <p><strong>Perfil</strong><br><?php echo @$usuario->UsuariosPerfiles->perfil; ?></p>
  </div>
</div>
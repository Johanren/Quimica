<h1 class="h3 mb-3 font-weight-normal">Perfil Usuario</h1><br><br>
<?php
$ctrl = new PerfilControlador();
$ctrl->actualizarPerfilControlador();
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'chang') {
        print '<p class="alert alert-success" role="alert">Usuario Actualizado Correctamente <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></p>';
    }
}
?>
<form method="post">
    <?php
    $perfil = new PerfilControlador();
    $perfil->perfilUsuario();

    ?>
</form>
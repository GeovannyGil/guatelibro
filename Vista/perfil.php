<?php

require 'headerClient.php';
?>

<div class="container">
    <h1 class="text-center">Editar Perfil</h1>
    <div class="row justify-content-center">
        <div class="col-md-12 centrar">
            <!-- Form para dispositivos grandes-->
            <form class="mt-4 d-md-block d-none" id="form-perfil" enctype="multipart/form-data">
                <div class="form-row">

                    <div class="col-lg-12">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-image"></i>&nbsp;Foto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            </div>

                            <?php

                            if ($_SESSION['photo'] == null) :
                            ?>
                                <img class="img-fluid" src="../assets/img/login-admin/1.png" width="100" height="100">
                            <?php
                            else :
                            ?>
                                <div class="col-lg-12 mt-4 informacion2 content-input-img">
                                    <div class="div-img-file-input">
                                        <input id="file-upload2" name="img-2" onchange='cambiar2();' onclick="cambio2()" type="file" style='display: none;' />
                                        <img class="img-fluid img-prev2 img2" id="photoMembers" src="../assets/img/members/<?php echo $_SESSION['photo']; ?>" width="100" height="100">

                                    </div>
                                    <div class="div-button-info-img">
                                        <div id="info2"></div>
                                        <label for="file-upload2" class="subir mt-2 btn btn-secondary-gt">
                                            <i class="fas fa-images"></i> Selecciona una imagen
                                        </label>
                                    </div>
                                </div>
                            <?php
                            endif
                            ?>
                        </div>
                    </div>



                    <div class="col-lg-12">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-signature"></i>&nbsp;Nombre&nbsp;&nbsp;&nbsp;</div>
                            </div>
                            <input type="text" class="form-control" name="name_member" value="<?php echo $_SESSION['name_member']; ?>">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-signature"></i>&nbsp;Apellido&nbsp;&nbsp;&nbsp;</div>
                            </div>
                            <input type="text" class="form-control" name="surname_member" value="<?php echo $_SESSION['surname_member']; ?>">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="far fa-envelope"></i>&nbsp;Correo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            </div>
                            <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['email']; ?>">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-phone"></i>&nbsp;Telefono &nbsp;&nbsp;&nbsp;</div>
                            </div>
                            <input type="text" class="form-control" name="phone" value="<?php echo $_SESSION['phone']; ?>">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-map-marker-alt"></i>&nbsp;Dirección&nbsp;&nbsp;&nbsp</div>
                            </div>
                            <input type="text" class="form-control" name="direction" value="<?php echo $_SESSION['direction']; ?>">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-id-card"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DPI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            </div>
                            <input type="text" class="form-control" name="institution" value="<?php echo $_SESSION['institution']; ?>">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-signature"></i>&nbsp;Usuario&nbsp;&nbsp;&nbsp;</div>
                            </div>
                            <input type="text" class="form-control" name="user_member" value="<?php echo $_SESSION['user_member']; ?>">
                        </div>
                    </div>


                    <div class="col-md-12 mt-5">

                    </div>

                </div>
                <div class="col-md-4 offset-md-2 mt-5">
                    <button type="button" class="btn btn-primary btn-block mover" onclick="enviar_usuario(<?php echo $_SESSION['id_member']; ?>);">Actualizar Datos</button>
                </div>
            </form>
            <!-- Form para dispositivos grandes-->

            <!--Form para dispositivos pequeños-->
        </div>
    </div>
</div>


<?php
require 'footerClient.php';
?>
<script src="http://localhost/guatelibro/assets/js/cargar_img.js"></script>
<script src="http://localhost/guatelibro/assets/js/Perfil.js"></script>
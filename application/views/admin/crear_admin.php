<div id="page-wrapper" >
            <div id="page-inner">
                <!--<div class="row">
                    <div class="col-md-12">
                     <h2>Blank Page</h2>   
                        <h5>Welcome Jhon Deo , Love to see you back. </h5>
                       
                    </div>
                </div>-->
                 <!-- /. ROW  -->
                 <!--<hr />-->

                <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Nuevo Usuario
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                            <?
                                                if(isset($registro)) {
                                                    $nempleado = $registro['nempleado'];
                                                    $nombre = $registro['nombre'];
                                                    $apellidos  = $registro['apellidos'];
                                                    $email = $registro['email'];
                                                    $pwd = $registro['pwd'];
                                                    /*$estatus = $registro['estatus'];
                                                    $tipo = $registro['tipo'];
                                                    $foto = $registro['foto'];
                                                    $electo = $registro['electo'];*/
                                                }else{
                                                    $nempleado = "";
                                                    $nombre = "";
                                                    $apellidos  = "";
                                                    $email = "";
                                                    $pwd = "";
                                                    /*$estatus = "";
                                                    $tipo = "";
                                                    $foto = "";
                                                    $electo = "";*/
                                                }

                                            ?>

                                                <?

                                                    $errores_encontrados = validation_errors();
                                                    $contador_errores=0;
                                                    if(!empty($errores_encontrados)){
                                                        if($contador_errores==0) { 
                                                        ?>
                                                            <div class="alert alert-danger">
                                                                <?=$errores_encontrados;?>
                                                             </div>

                                                        <?
                                                        $contador_errores=1;
                                                        }else {
                                                            echo $errores_encontrados;
                                                        }
                                                    }

                                                ?> 
                                
                                <?echo form_open_multipart($url_destino,$atributos);?>

                                 <?if(isset($mensaje)) { ?>
                                    <div class="alert alert-danger">
                                        <center><? echo $mensaje;?></center>
                                    </div>
                                <?}?>

                                <div class="col-md-6">
                    

                                    <div class="form-group">
                                            <label>N° Empleado</label>
                                            <input type="text" style="text-transform:uppercase;" value="<?=$nempleado?>" name="nempleado" id="nempleado" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                            <label>Nombres</label>
                                            <input type="text" value="<?=$nombre?>" name="nombre" id="nombre" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" value="<?=$email?>" name="email" id="email" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                            <label>Elegido por</label>
                                            <select name="electo" class="form-control" style="width:50%;">
                                              <option value="" selected>--- Seleccione ---</option>
                                              <option value="1" >UDB</option>
                                              <option value="0" >Delegado Trabajadores</option>                                                                                      
                                            </select>
                                    </div>

                                    <div class="form-group">
                                            <label>Estado</label>
                                            <select name="estatus" class="form-control" style="width:25%;">
                                              <option value="1" selected>Activo</option>
                                              <option value="0" >Inactivo</option>                                                                                 
                                            </select>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <label>Tipo Usuario</label>
                                            <select name="tipo" class="form-control" style="width:50%;">
                                              <option value="" selected>--- Seleccione ---</option>
                                              <option value="1">Administrador</option>
                                              <option value="0" >Miembro Comité</option>
                                                                                                                                                  
                                            </select>
                                    </div>

                                    <div class="form-group">
                                            <label>Apellidos</label>
                                            <input type="text" value="<?=$apellidos?>" name="apellidos" id="apellidos" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                            <label>Contraseña</label>
                                            <input type="password" value="<?=$pwd?>" name="pwd" id="pwd" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                                            <label>Imagen de Perfil</label>
                                                            <input type="file" id="optionpic" name="optionpic"/>
                                                                <input type="hidden" name="optionpict" id="optpic"/>
                                                            </div>

                                    <br><br><br><br><br>                         
                                </div>   
                                <div class="form-actions text-right pal">
                                    <a href="#" id="salirlistado" name="salirlistado" class="btn btn-danger"><li class="fa fa-list"></li>&nbsp;Salir</a>
                                    <button type="submit" class="btn btn-primary" style="margin-right:10px;">Guardar</button>
                                </div>
                                <?=form_close()?>            
                            </div>
                        </div>
                    </div>  
                </div>
                </div>  
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->

<script>
   /* function nombre(fic) {
      fic = fic.split('\\');
      $("#optpic").val(fic[fic.length-1]);
    } */

    $("#optionpic").change(function(){
        $('#optpic').val($(this).val());
    });

    $('#salirlistado').click(function(){

          var urlred = "<?=base_url()?>admin/";
          $(location).attr('href',urlred);

        });
</script>
</body>
</html>
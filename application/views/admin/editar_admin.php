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
                            Editar Usuario
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <?

                                                if(isset($registro)) {
                                                    $id = $registro['numempleado'];
                                                    $nombre = $registro['nombres'];
                                                    $apellidos  = $registro['apellidos'];
                                                    $email = $registro['email'];
                                                    $pwd = $registro['pwd'];
                                                    $estatus = $registro['status'];
                                                    $tipo = $registro['tipo'];
                                                    $optionpict = $registro['foto'];
                                                    $electo = $registro['electo'];
                                                }else{
                                                    $id = "";
                                                    $nombre  = "";
                                                    $apellidos = "";
                                                    $email = "";
                                                    $pwd = "";
                                                    $estatus = "";
                                                    $tipo = "";
                                                    $optionpict = "";
                                                    $electo = "";
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

                                

                                <div class="col-md-6">
                                    <!--<h3>Basic Form Examples</h3>-->
                                    <!--<input type="hidden" name="id" id="id" value="<?=$id?>">-->

                                   

                                    <div class="form-group">
                                            <label>N° Empleado</label>
                                            <input type="text" value="<?=$id?>" readonly name="id" id="id" class="form-control" />
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
                                                                     <?
                                                                     
                                                                        
                                                                          if($electo==1){
                                                                        ?>
                                                                          <option value="1" selected>UDB</option>
                                                                          <option value="0" >Delegado Trabajadores</option>
                                                                        <?}elseif ($electo==0) {?>
                                                                            <option value="1" >UDB</option>
                                                                            <option value="0" selected>Delegado Trabajadores</option>
                                                                          <?}else {
                                                                            ?>
                                                                            <option value="" selected>--- Seleccione ---</option>
                                                                            <option value="1" >UDB</option>
                                                                            <option value="0" >Delegado Trabajadores</option>
                                                                            <?
                                                                          }
                                                                        
                                                                      
                                                                      ?>                                                                                       
                                            </select>
                                    </div>

                                    <div class="form-group">
                                            <label>Estado</label>
                                            <select name="estatus" class="form-control" style="width:25%;">
                                                                     <?
                                                                     
                                                                        
                                                                          if($estatus==1){
                                                                        ?>
                                                                          <option value="1" selected>Activo</option>
                                                                          <option value="0" >Inactivo</option>
                                                                        <?}elseif ($estatus==0) {?>
                                                                            <option value="1" >Activo</option>
                                                                            <option value="0" selected>Inactivo</option>
                                                                          <?}else {
                                                                            ?>
                                                                            <option value="1" selected>Activo</option>
                                                                            <option value="0" >Inactivo</option>
                                                                            <?
                                                                          }
                                                                        
                                                                      
                                                                      ?>                                                                                       
                                            </select>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <label>Tipo Usuario</label>
                                            <select name="tipo" class="form-control" style="width:50%;">
                                                                     <?
                                                                     
                                                                        
                                                                          if($tipo==1){
                                                                        ?>
                                                                          <option value="1" selected>Administrador</option>
                                                                          <option value="0" >Miembro Comité</option>
                                                                        <?}elseif ($tipo==0) {?>
                                                                            <option value="1" >Administrador</option>
                                                                            <option value="0" selected>Miembro Comité</option>
                                                                          <?}else {
                                                                            ?>
                                                                            <option value="" selected>--- Seleccione ---</option>
                                                                            <option value="1" >Administrador</option>
                                                                            <option value="0" >Miembro Comité</option>
                                                                            <?
                                                                          }
                                                                        
                                                                      
                                                                      ?>                                                                                       
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

                                                        <?
                                                        if($optionpict!="") {
                                                          ?>
                                                           <center><img class="btnAbrir" src="<?=base_url()?>uploads/usuarios/<?=$optionpict?>" width="85" height="100"/></center><br/>
                                                          <?
                                                        }?>

                                    </div>   



                                                        <div class="form-group">
                                                                <label>Imagen de Perfil</label>
                                                                <!--<input type="file" id="optionpic" name="optionpic" onchange="nombre(this.value)"/>-->
                                                                <input type="file" id="optionpic" name="optionpic"/>
                                                                <input type="hidden" name="optionpict" value="<?=$optionpict?>" id="optpic"/>
                                                        </div>

                                                        <?
                                                        if($optionpict=="") {
                                                        ?>
                                                        <br><br><br><br><br>
                                                        <?}?>

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

<div id="dialog" title="Eliminar Registro">
                    <input type="hidden" id="registro"/>
                    ¿Desea Realmente Eliminar este registro?</div>

<script>
/*
function nombre(fic) {
      fic = fic.split('\\');
      $("#optpic").val(fic[fic.length-1]);
    }     */
$("#optionpic").change(function(){
    $('#optpic').val($(this).val());
});

    $('#salirlistado').click(function(){

          var urlred = "<?=base_url()?>admin/";
          $(location).attr('href',urlred);

        });
$(document).ready(function(){
    $("#dialog").dialog({
                            autoOpen: false,
                            width: "auto",
                            height: "auto",
                            buttons: {
                                Aceptar:function(){
                                    registro = $("#registro").val();
                                    $.ajax({
                                        type:"POST",
                                        url:"<?=base_url()?>profesor/eliminar_profesor/"+registro,
                                        success: function(data){
                                            $(location).attr("href","<?=base_url()?>profesor");
                                        }
                                    }); 
                                },
                                Cancelar: function(){
                                    $(this).dialog("close");
                                }
                            }
                        });

                        $("#btnEliminar").click(function(){
                            registro = $(this).attr("registro");
                            $("#registro").val(registro);                            
                            $("#dialog").dialog("open");
                        });
    });
    
</script>
</body>
</html>
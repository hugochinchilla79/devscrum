
<script src="JavaScript/Ajax.js"></script>
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
                            Subir Imagen
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            		<a href="#" onclick="guardar('kevin')">Guardar en localStorage</a>
									<span><?php echo validation_errors();?></span>
                                <?
		//print_r($dir);
									obtener_directorios($dir,$param);
								?>

								<?=form_open_multipart("upload/do_upload")?>


                                <div class="col-md-6">
                                    <!--<h3>Basic Form Examples</h3>-->

                                    <div class="form-group">
                                            <label>Titulo: </label><input type="text" name="titulo" required/>
                                    </div>

                                    <div class="form-group">
                                            	<label>Imagen: </label><input type="file" name="userfile" required/><br /><br />
												<input type="hidden" name="ruta" value='<?= $ruta?>'>
                                    </div>

                                    <br><br><br>                        
                                </div>   
                                <div class="form-actions text-right pal">
                                    <a href="#" id="salirlistado" name="salirlistado" class="btn btn-danger"><li class="fa fa-list"></li>&nbsp;Salir</a>
                                    <!--<a href="#" id="btnEliminar" class="btn btn-danger" registro="<?=$idprograma?>">&nbsp;Eliminar</a>-->
                                    <button type="submit" class="btn btn-primary" style="margin-right:10px;">Subir imagen</button>
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
    function nombre(fic) {
      fic = fic.split('\\');
      $("#optpic").val(fic[fic.length-1]);
    } 

    $('#salirlistado').click(function(){

          var urlred = "<?=base_url()?>admin/";
          $(location).attr('href',urlred);

        });
</script>
</body>
</html>
<div id="page-wrapper" >
            <div id="page-inner">
               <div class="row">
                    <div class="col-md-12">
                      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
                      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
                      <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
                    <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?


                                ?>

                            Nueva Actividad
                           
                            </div>
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
                    }?>     <? echo form_open_multipart($url_destino,$atributos);?>

                    <? 

                    if(isset($error)and $error!="") {
                                    ?>
                        <div class="alert alert-warning">
                                <?=$error;?>
                             </div>
                             <?
                    }

                    if(isset($msg)) {
                      ?>

                        <div class="<?=$tipo_error?>">
                                <?=$msg;?>
                             </div>

                      <?
                    }


                    ?>
                     
                            <div class="panel-body">
                                <div class="row">



                                    <div class="col-md-6">
                                       <?echo form_open($url_destino,$atributos);?>
                                       <label>Nombre Carpeta</label><br/>
                                       <input type="text" name="nombre" class="form-control" value="<?php echo set_value('nombre'); ?>"/>
                                       <label>Descripci&oacute;n</label>
                                       <input type="text" name="descripcion" class="form-control" value="<?php echo set_value('descripcion')?>"/>
                                       <br/>
                                       <input type="submit" value="Enviar" class="btn btn-primary"/>
                                       <a href="<?=base_url().$url_listado?>" class="btn btn-danger">Salir</a>
                                       <?echo form_close();?>
                                    </div>


                                    <div class="col-md-6">
                                        
                                        <div class="form-group">
                                           
                                           
                                            

                                    </div>
                                   
                                    </div>
                                </div>
                                <? echo form_close();
                                                        ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


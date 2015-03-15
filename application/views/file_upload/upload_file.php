<div id="page-wrapper" >
            <div id="page-inner">
               <div class="row">
                    <div class="col-md-12">
                      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
                      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
                      <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
                    <!-- Form Elements -->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                            Subida de Archivos
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
                                    <div class="col-md-4">
                                       <?echo form_open_multipart($url_destino,$atributos);?>
                                       <input type="hidden" value="<?=$id_carpeta?>" name="id_carpeta"/>
                                       <label>Archivo a Subir</label>
                                       <input type="file" name="file"/><br/>
					                             <label>Ambito del archivo</label>
                                       <select name="ambito" class="form-control" style="width:50%;">
                                        <?
                                        if(is_array($ambito) and $ambito!=false){
                                          foreach ($ambito as $key=>$value){
                                        ?>
                                        <option value="<?= $value['id_ambito']?>"><?= $value['ambito']?></option>
                                        <?
                                         } }
                                        ?>
                                       </select>
                                       <br>
                                       <input type="submit" value="Enviar" class="btn btn-primary"/>
                                       <a href="<?=base_url().$url_listado?>" class="btn btn-danger">Salir</a>
                                       <?echo form_close();?>
                                    </div>
                                    <br/>
                                    

                                    
                                </div>
                                <? echo form_close();
                                                        ?>
                            </div>
                        </div>
                        
                        
                        
                         <div class="panel panel-default">
                            <div class="panel-heading">
                            Gestión de Archivos
                            </div>   
                            <div class="panel-body">
                                <div class="row">		
                                    <div class="col-md-12">
                                      <?if(is_array($files) and $files!=false){
                                      foreach($files as $key=> $value) {
                                    	?>
                                    		
                                    		<div class="col-md-3">
                                    			<div class="alert alert-info">
                                    				<center>
                                        		<?
                                        			$icono = "";
													$clase = "";
                                        			$array_name = explode(".",$value["nombre"]);
													$extension = end($array_name);
													
													switch($extension) {
														case "pdf":
															$icono = base_url()."images/"."pdf.png";
															$clase = "pdf";
															break;
														case "doc":
															$icono = base_url()."images/"."doc.png";
															$clase = "doc";
															break;
														case "png": case "gif": case "jpg":
															$icono = base_url()."images/"."img.png";
															$clase = "img";
															break;
													}
																								
                                        		?>
                                     			<a href="<?=$url."/".$value['nombre']?>" target="_blank" class="<?=$clase?>"><img style="width:128px;height:128px;" src="<?=$icono?>"/></a>
                                    		</center>
                                    		</div>
                                    		
                                    		</div>
                                    		
                                    	<?
                                    }}?>
                                    </div>   
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                    </div>
                </div>
            </div>






									
                                    
									


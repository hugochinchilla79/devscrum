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
                                <?


                                ?>

                            Gestión de Carpetas
                           
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
                    }?>     

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
                            	<a href="<?=base_url()?>files/create_folder" style="float:right;" class="btn btn-primary">Nueva Carpeta</a>
                                <div class="row">



                                    <div class="col-md-12">
                                    	
                                      	<?if(is_array($folders) and $folders!=false) {
                                      	foreach($folders as $key => $value){
                                      		?>	
                                      			
                                      				<div class="col-md-3">
                                      					<div class="alert alert-info">
                                      						<a href="<?=base_url()?>files/upload_file/<?=$value['id']?>"><center><img style="width:100px;height:95px;" src="<?=base_url()?>images/carpeta.png"/>
                                      							<br/>
                                      							<?=$value["nombre"]?></center>
                                      							
                                      						</a>
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


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
                                     			<a href="<?=$url."/".$value['carpeta_nombre']."/".$value['nombre']?>" target="_blank" class="<?=$clase?>"><img style="width:128px;height:128px;" src="<?=$icono?>"/></a>
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
<!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
        <li class="text-center">
            <img src="<?=base_url()?>uploads/usuarios/<?=$this->session->userdata('optionpict')?>" class="user-image img-responsive"/>
            <!--<?if($this->session->userdata('userType')==1){?>
                    <img src="<?=base_url()?>uploads/admin_pictures/<?=$this->session->userdata('optionpict')?>" class="user-image img-responsive"/>
            <?}elseif($this->session->userdata('userType')==2){?>
                    <img src="<?=base_url()?>uploads/docente_pictures/<?=$this->session->userdata('optionpict')?>" class="user-image img-responsive"/>
            <?}elseif($this->session->userdata('userType')==3){?>
                    <img src="<?=base_url()?>uploads/alumno_pictures/<?=$this->session->userdata('optionpict')?>" class="user-image img-responsive"/>
            <?}?>-->
          </li>
        
          
                   	<li>
                        <a  href="<?=base_url()?>admin"><i class="fa fa-dashboard fa-3x"></i> Usuarios</a><!--Dashboard-->
                    </li>                  
                    <!--<li>
                        <a  href="<?=base_url()?>upload"><i class="fa fa-desktop fa-3x"></i> Subir Im&aacute;genes </a>
                    </li>-->
                    <li>
                        <a  href="<?=base_url()?>files/folder_management"><i class="fa fa-qrcode fa-3x"></i> Subir Documentos </a>
                    </li>
               <li>
                        <a  href="<?=base_url()?>actividades/gestion_actividades"><i class="fa fa-bar-chart-o fa-3x"></i> Actividades </a>
                    </li> 
                     <!-- <li  >
                        <a  href="#"><i class="fa fa-table fa-3x"></i> ----- </a>
                    </li>
                    <li  >
                        <a  href="#"><i class="fa fa-edit fa-3x"></i> ----- </a>
                    </li>       
          
                             
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Ver Archivos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?=base_url()?>ver_img">Im&aacute;genes</a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>ver_docs">Documentos</a>
                            </li>
                        </ul>
                      </li>  
                  <li  >-->
                        <!--<a class="active-menu"  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>-->
                       <!-- <a href="<?=base_url()?>"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>-->
                    </li> 
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
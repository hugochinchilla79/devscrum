<div id="page-wrapper" >
    <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
                      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
                      <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
                     <div class="panel panel-primary">
                        <div class="panel-heading">
                             Usuarios
                        </div>   
                        <div class="panel-body">
                            <a href="<?=base_url()?>admin/crear_admin" id="nuevo" style="float:right; margin-bottom:5px;"><img style="width: 45px" title="Agregar Administrador" src="<?=base_url()?>images/adicionar.png"/></a><br>
                            <script src="<?=base_url()?>assets/js/dataTables/jquery.dataTables.js"></script>
                            <script src="<?=base_url()?>assets/js/dataTables/dataTables.bootstrap.js"></script>
                            
                                                
                            <div class="table-responsive">
                                
                                <table class="table table-hover table-bordered" style="font-color: black;" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>C&oacute;digo</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?if(isset($usuarios) and $usuarios!=false) { 
                                            
                                            foreach($usuarios as $array => $valor) {
                                                
                                            ?>
                                            <tr  >
                                            <td class="editar" registro="<?=$valor['numempleado']?>"><?=$valor['numempleado']?></td>
                                            <td class="editar" registro="<?=$valor['numempleado']?>"><?=$valor['nombres'] . ' ' . $valor['apellidos']?></td>
                                            <td class="editar" registro="<?=$valor['numempleado']?>"><?=$valor['email']?></td>
                                            <td><a href="#" class="btnEliminar" registro="<?=$valor['numempleado']?>"><img src="<?=base_url()?>images/eliminar1.png" width="28" height="28" alt="eliminar registro" title="eliminar"/></a></td>
                                            
                                            </tr>
                                            
                                             <?

                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                           </div> 
                        </div>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 
               
    </div>
             <!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->  

<div id="dialog" title="Eliminar Usuario" nregistro="">
    ¿Realmente desea eliminar este Usuario?
</div>

    <script type="text/javascript">
                        $('.editar').on("click",function(){
                            var registro = $(this).attr('registro');         
                            url = "<?=base_url()?>admin/editar_admin/"+registro;
                            $(location).attr("href",url);
                        });
                        $(".editar").on("mouseover",function(){
                          $(this).css('cursor','pointer');           
                          $(this).css('color','blue');
                        });

                        $(".editar").on("mouseleave",function(){
                          $(this).css('cursor','auto');
                          $(this).css('background','white');
                          $(this).css('color','black');
                        });

                        


                        $(".btnEliminar").click(function(){
                                                
                                                  registro = $(this).attr("registro");
                                                  $("#dialog").attr('nregistro',$(this).attr('registro'));                            
                                                  $("#dialog").dialog("open");
                                              });

                                              $("#dialog").dialog({
                                                  autoOpen: false,
                                                  width: 400,
                                                  height: 150,
                                                  modal: true,
                                                  buttons: {

                                                      Aceptar: function() {
                                                          var registro = $(this).attr('nregistro');
                                                      
                                                          url = "<?=base_url()?>admin/eliminar_usuario/"+registro;
                                                          $(location).attr('href',url);
                                                           $(this).dialog("close"); 
                                                      },
                                                      Cancelar : function() {
                                                          $(this).dialog("close");
                                                      }
                                                      
                                                  } 
                                                 });
  

                              $('#dataTables-example').dataTable({
                                      "aaSorting": [],
                                      "aLengthMenu": [
                                   [-1,10, 20],
                                  [10, 20,"Todos"]
                               ],
                               "language": {
                                      "lengthMenu": "Mostrando _MENU_ Registros por p&aacute;gina",
                                      "zeroRecords": "Sin registros",
                                      "info": "Mostrando p&aacute;gina _PAGE_ de _PAGES_",
                                      "infoEmpty": "No hay registros disponibles",
                                      "infoFiltered": "(filtered from _MAX_ total records)",
                                      "sSearch": "Buscar: ",
                                      "oPaginate": {
                                      "sFirst":    "Primero",
                                      "sLast":     "Último",
                                      "sNext":     "Siguiente",
                                      "sPrevious": "Anterior"
                                  }
                                  }
                                      });                                  

    </script>
</body>
</html>

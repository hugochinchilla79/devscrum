<div id="page-wrapper" >
            <div id="page-inner">
               <div class="row">
                    <div class="col-md-12">
                      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
                      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
                      <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
                      <input type="hidden" class="url" value="<?=base_url()?>"/>
                      <script src='<?=base_url()?>assets/moment.min.js'></script>
                      <script src='<?=base_url()?>assets/fullcalendar.min.js'></script>
                      <script src="<?=base_url()?>assets/js/jquery.metisMenu.js"></script>
                      <script src="<?=base_url()?>assets/js/dataTables/jquery.dataTables.js"></script>
                      <script src="<?=base_url()?>assets/js/dataTables/dataTables.bootstrap.js"></script>
                      <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
                    <!-- Form Elements -->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                               
                            Gestion Actividades

                            </div>
                         
                     
                            <div class="panel-body">
                              <a href="<?=base_url()?>actividades/nueva_actividad" style="float:right;" class="btn btn-primary"> Agregar</a>
                              <style>

                           

                            #calendar {
                              max-width: 900px;
                              margin: 80px auto;

                            }

                            </style>
                               <div id='calendar'></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div id="eliminar" title="Eliminar Registro">
<input type="hidden" id="registro"/>
¿Est&aacute; seguro que desea eliminar el registro seleccionado?
</div>
<input type="hidden" value="" id="numero"/>
<div id="dialog" title="Actividad">

</div>

<script>

  var eventos_0  = [ <?if(is_array($ACTIVIDADES_T) or $ACTIVIDADES_T!=false) {
        foreach($ACTIVIDADES_T as $value => $key) {?>
          {

            "id": <?=$key['idrnum']?>,
            "title": '<?=$key['nombre_actividad']?>',
            start: '<?=date_format(date_create($key['fecha']),'Y-m-d')?>T<?=date_format(date_create($key['fecha']),'H-i')?>',
            allDay: true,
            description: '<?=$key['descripcion']?>'


          },

        <?}
        }?>
        ];





</script>

<script type="text/javascript" src="<?=base_url()?>JavaScript/actividades.js"></script>
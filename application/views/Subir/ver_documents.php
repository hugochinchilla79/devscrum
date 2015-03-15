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
                            Ver Documentos
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <ul>
                                <? foreach ($img->result() as $imgs){ ?>

                                <li><a href="<?= base_url()?><?= $imgs->direccion?>" target="_blank"><?=$imgs->titulo?></a></li>

                            <?
                                }
                            ?>
                            </ul>
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
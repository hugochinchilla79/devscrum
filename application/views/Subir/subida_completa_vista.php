
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
                            Tu imagen fue subida correctamente!
                        </div>
                        <div class="panel-body">
                            <div class="row">
								<h3><?= $titulo?></h3>
								<h2><?= $extension?></h2>
								<img src="<?= base_url()?>uploads/thumbs/<?= $imagen?>">
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
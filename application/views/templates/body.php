<style type="text/css">
img { width: 50%};
</style>
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <?if(isset($msg)) { ?>
                        <div class="<?=$tipo_error?>">
                            <?=$msg;?>
                        </div>
                    <?}?>
                    <div class="col-md-12">
                     <h2></h2>   
                        <h5></h5>
                       <center><img src="<?=base_url()?>images/en_construccion.gif"></center>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
</body>
</html>
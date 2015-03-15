		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
		<!--script src="js/jquery.lint.js" type="text/javascript" charset="utf-8"></script-->
		<link rel="stylesheet" href="assets/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<script src="assets/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
		
		<style type="text/css" media="screen">
			* { margin: 0; padding: 0; }
			
			h1 { font-family: Georgia; font-style: italic; margin-bottom: 10px; }
			
			h2 {
				font-family: Georgia;
				font-style: italic;
				margin: 25px 0 5px 0;
			}
			
			p { font-size: 1.2em; }
			
			ul li { display: inline; }
			
			.wide {
				border-bottom: 1px #000 solid;
				width: 4000px;
			}
			
			.fleft { float: left; margin: 0 20px 0 0; }
			
			.cboth { clear: both; }
			
			#main {
				background: #fff;
				margin: 0 auto;
				padding: 30px;
				width: 1000px;
			}
		</style>
<!-- Mostramos la informacion de la imagen -->
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
                           Ver Imágenes.
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <ul class="gallery clearfix">
		<? foreach ($img->result() as $imgs){ ?>
			<li><a href="<?= base_url()?><?= $imgs->ruta?>?lol=lol" rel="prettyPhoto[gallery1]"><img src="<?= base_url()?><?= $imgs->ruta?>" width="60" height="60" alt="<?$imgs->titulo?>" /></a></li>
		<?
			}
		?>
	</ul>
<p><?php echo anchor('upload','Sigue subiendo archivos!!');?></p>
<!--Mostramos la imagen subida-->

<script type="text/javascript" charset="utf-8">
			var $j = jQuery.noConflict();
			$j(document).ready(function(){
				$j("area[rel^='prettyPhoto']").prettyPhoto();
				
				$j(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
				$j(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				$j("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$j("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
			});
			</script>
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
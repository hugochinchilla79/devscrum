<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"></head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<title>:::Portal Academico:::</title>

<!-- BOOTSTRAP STYLES-->
<link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet" />
<!--Pulling Awesome Font -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Roboto:400);
body {
  /*background-color:black;
  -webkit-font-smoothing: antialiased;
  font: normal 14px Roboto,arial,sans-serif;*/

  background: url(<?echo base_url()?>images/fondo.png) no-repeat fixed center;
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
    font-weight:300;
    text-align: left;
    text-decoration: none;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.container {
    padding: 25px;
    position: absolute;
}

.form-login {
    background-color: #EDEDED;
    padding-top: 10px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 15px;
    border-color:#d2d2d2;
    border-width: 5px;
    box-shadow:0 1px 0 #cfcfcf;
}

h4 { 
 border:0 solid #fff; 
 border-bottom-width:1px;
 padding-bottom:10px;
 text-align: center;
}

.form-control {
    border-radius: 10px;
}

.wrapper {
    text-align: center;
}
</style>
</head>
<body>
<div class="container" >
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <?
                                                if(isset($registro)) {
                                                    $nombre = $registro['nombre'];
                                                    $apellidos  = $registro['apellidos'];
                                                    $email = $registro['email'];
                                                    $pwd = $registro['pwd'];
                                                    $cpwd = $registro['cpwd'];
                                                }else{
                                                    $nombre = "";
                                                    $apellidos  = "";
                                                    $email = "";
                                                    $pwd = "";
                                                    $cpwd = "";
                                                }

                                            ?>

                                                

            <!--<form name="login-form" action="<?=base_url()?>inicio/login" id="login-form" method="post">-->
            <?

            $attributes = array('class' => 'login-form', 'id' => 'login-form', 'name' => 'login-form');

            echo form_open('inicio/registro', $attributes);?>               
            <br><br><br><br><br>
                <div class="form-login">
                <h4>¡Regístrate Ahora!</h4>         

                <?

                                                    $errores_encontrados = validation_errors();
                                                    $contador_errores=0;
                                                    if(!empty($errores_encontrados)){
                                                        if($contador_errores==0) { 
                                                        ?>
                                                            <div class="alert alert-danger">
                                                                <center><?=$errores_encontrados;?></center>
                                                             </div>

                                                        <?
                                                        $contador_errores=1;
                                                        }else {
                                                            echo $errores_encontrados;
                                                        }
                                                    }

                                                ?>  

            <!--DESCRIPTION<span>-->

            <?if(isset($mensaje)) { ?>
                <div class="alert alert-danger">
                    <center><?=$mensaje;?></center>
                </div>
            <?}?>

            <?if(isset($msg)) { ?>
                <div class="<?=$tipo_error?>">
                    <center><?=$msg;?></center>
                </div>
            <?}?>


            <!--</span>END DESCRIPTION-->



                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                    <input type="text" class="form-control" value="<?=$nombre?>" placeholder="nombres" name="nombre" id="nombre">
                </div>

                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                    <input type="text" class="form-control" value="<?=$apellidos?>" placeholder="apellidos" name="apellidos" id="apellidos">
                </div>

                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                    <input type="text" class="form-control" placeholder="correo" value="<?=$email?>" name="email" id="email">
                </div>

                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                    <input type="password" id="pwd" name="pwd" class="form-control" value="<?=$pwd?>" placeholder="contraseña" />
                </div>

                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                    <input type="password" id="cpwd" name="cpwd" value="<?=$cpwd?>" class="form-control" placeholder="confirmar contraseña" />
                </div>

                <div class="wrapper">
                    
                <span class="group-btn">     
                    <button class="btn btn-primary">Registrarme <i class="fa fa-sign-in"></i></button>
                </span>
                <br><br><a href="<?=base_url()?>">Iniciar Sesi&oacute;n</a>
                </div>
                </div>
            <!--</form>-->
            <?echo form_close();?>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $("#login").click(function(){
        //alert("<?=base_url()?>inicio/login");
        $("#login-form").submit();
    });

    function enviar_formulario(){
        $("#login-form").submit();
    }

    $(document).ready(function(){
        $('input').bind("cut copy paste",function(e) {
          e.preventDefault();
        });
      });

</script>
</html>
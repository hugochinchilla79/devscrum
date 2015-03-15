<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"></head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<title>..:: Comité de Seguridad y Riesgos ::..</title>

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

  /*background: url(<?echo base_url()?>images/fondo.png) no-repeat fixed center;*/
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
    position: fixed;
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
<div class="container">
     <div class="col-md-offset-5 col-md-3">
            <!--<form name="login-form" action="<?=base_url()?>inicio/login" id="login-form" method="post">-->
            <?
            
            $attributes2 = array('class' => 'passwd-form', 'id' => 'passwd-form', 'name' => 'passwd-form');

            
            echo form_open('enviarcorreo/Envio', $attributes2);?>
            
            <br><br><br><br><br>
                <div class="form-login">
                <h4>UDB<br>Bienvenido</h4>
                <br><h4>Ingrese su correo institucional para poder reestablecer su contraseña</h4><br>

                <?if(isset($mensaje)) { ?>
                    <div class="alert alert-danger">
                        <center><?=$mensaje;?></center>
                    </div>
                <?}?>

                <!--<input type="text" id="userName" name="userName" class="form-control" placeholder="username" onkeypress="if (event.keyCode == 13) enviar_formulario()"/>
                </br>
                <input type="password" id="userPassword" name="userPassword" class="form-control" placeholder="password" onkeypress="if (event.keyCode == 13) enviar_formulario()"/>
                </br>-->

                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                    <input required onselectstart="return false;" ondragstart="return false;" type="text" id="userName" name="userName" class="form-control" placeholder="Correo institucional" onkeypress="if (event.keyCode == 13) enviar_formulario()"/>
                </div>

            

                <div class="wrapper">
                    <!--DESCRIPTION<span><?if(isset($mensaje)) { echo $mensaje; }?></span>--><!--END DESCRIPTION-->
                <span class="group-btn">     
                    <!--<button class="btn btn-primary">login <i class="fa fa-sign-in"></i></button>-->
                    <a href="#" id="passwd" class="btn btn-primary">Enviar <i class="fa fa-sign-in"></i></a>
                </span>                
                <!--<br><br><a href="#">Olvid&eacute; la contraseña</a> &nbsp; <a href="<?=base_url()?>inicio/registro">Registrarme</a>-->
                </div>
                </div>
            <!--</form>-->
            <?echo form_close();?>
        </div>   
    </div>
</div>
</body>
<script type="text/javascript">
/* agregue esto p/ boton olvide contraseña */

    $("#passwd").click(function(){
        //alert("<?=base_url()?>inicio/login");
        $("#passwd-form").submit();
    });

    function enviar_formulario(){
        $("#passwd-form").submit();
    }

    $(document).ready(function(){
        $('input').bind("cut copy paste",function(e) {
          e.preventDefault();
        });
      });

</script>
</html>
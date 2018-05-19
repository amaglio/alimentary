<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Alimentary | Mix y frutos secos</title>
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>



<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- Font awsome-->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<style type="text/css">
.footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: #efefef;
  text-align: center;
}

.navbar-default .navbar-nav>li>a {
    color: #000;
    font-size: 15px;
    padding-right: 20px;
    padding-left: 20px;
}

.navbar-default .navbar-nav>li>a:focus {
    color: green; 
}

.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
    color: #065b73;
    background-color: #e7e7e7;
}

.report-div.success{
      background-color: white !important;
}
</style>

</head>
<body style=" background-image: url('<?=base_url()?>assets/img/login.jpg');  background-repeat: no-repeat;">
 
<nav class="navbar navbar-default" style=" border-radius: 0px !important; border-bottom: 1px solid green ; ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Cambiar navegacion</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
      		<span style="    font-size: 25px;
    color: #0f585c;
    letter-spacing: 3px;"> Alimentary  |  </span>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li  >
        	<a href='<?php echo site_url('administrador/productos')?>'><i class="fa fa-lemon-o"></i> Producto <span class="sr-only">(current)</span></a>
        </li>
        <li>
        	<a href='<?php echo site_url('administrador/tipos_producto')?>'><i  class="fa fa-tags" ></i> Tipo de producto</a>
        </li>
        <li>
          <a href='<?php echo site_url('administrador/promociones')?>'><i class="fa fa-bullhorn"></i> Promociones</a>
        </li>
        <li>
          <a href='<?php echo site_url('administrador/opiniones_facebook')?>'><i  class="fa fa-facebook-f" ></i> Opiniones facebook</a>
        </li>
         <li>
          <a href='<?php echo site_url('administrador/contacto')?>'><i  class="fa fa-at" ></i> Contacto</a>
        </li>
        <li>
        	<a href='<?php echo site_url('login/logout')?>'><i  class="fa fa-power-off" ></i> Salir</a>
        </li>

        
      </ul>
  
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav> 

 
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
 

</body>

<script type="text/javascript">
  $(document).ready(function () {
        var url = window.location;
        $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
        $('ul.nav a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    })
</script>
</html>

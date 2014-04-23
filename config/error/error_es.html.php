<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $path = sfConfig::get('sf_relative_url_root', preg_replace('#/[^/]+\.php5?$#', '', isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : (isset($_SERVER['ORIG_SCRIPT_NAME']) ? $_SERVER['ORIG_SCRIPT_NAME'] : ''))) ?>


<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>

    <!-- more metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">

    <!-- include base css files from plugin -->
    <style>
  body {
    padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
  }
</style>
    <link rel="stylesheet" type="text/css" media="screen" href="/udc_apps/css/main.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/udc_apps/css/../mpProjectPlugin/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/udc_apps/css/../mpProjectPlugin/bootstrap/css/bootstrap-responsive.min.css" />
  </head>
  <body>
  <div id="contenedor">
    <div id="header">
      <div id="logo"></div>
      <div id="info">
        <img src="/udc_apps/images/title1.png" title="Curso de Alfabetización en Entornos de Aprendizaje Virtual" alt="Curso de Alfabetización en Entornos de Aprendizaje Virtual" align="right"/>
      </div>
    </div>
    <h1>Error del servidor</h1>
    <h5>El servidor devolvió un error: "<?php echo $code ?> <?php echo $text ?>".</h5>

  <dl>
    <dt>Ha ocurrido un error imprevisto y el servidor no pudo completar la operación.
        Por lo general, suele tratarse de una situación que requiere ser corregida.</dt>
    <dd>Si el error persiste, por favor notifique al administrador del sistema.</dd>

    <dt>Mientras tanto, Ud. puede:</dt>
    <dd>
      <ul>
        <li><a href="javascript:history.back();">Regresar</a> a la página anterior</li>
        <li>Ir a la <a href="<?php echo $path;?>">Página de inicio</a> y comenzar de nuevo.</li>
      </ul>
    </dd>
  </dl>
  </div>
    <!-- include base js files from plugin -->
    
<script src="/udc_apps/js/../mpProjectPlugin/script.js/js/script.min.js"></script>

<script>
  $script.path('/udc_apps');
  
      $script('/mpProjectPlugin/jquery/js/jquery-1.8.1.min', 'jquery');
    
      $script.ready('jquery', function() {
      $script('/mpProjectPlugin/bootstrap/js/bootstrap.min', 'twitter_bootstrap');
    });
  </script>
      </body>
</html>
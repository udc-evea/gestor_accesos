<!DOCTYPE html>
<?php $lang = $sf_user->getCulture();?>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo $lang;?>"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="<?php echo $lang;?>"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="<?php echo $lang;?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php echo $lang;?>"> <!--<![endif]-->
<head>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>

  <!-- more metas -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="stylesheet" href="<?php echo stylesheet_path("../bootstrap/css/bootstrap.min.css");?>">
  <?php include_stylesheets();?>
  <script src="<?php echo javascript_path("modernizr-2.7.1.min.js");?>"></script>
  <script src="<?php echo javascript_path("jquery-1.11.0.min.js");?>"></script>
</head>
<body>
  <!--[if lt IE 8]><p class=chromeframe>Su navegador está  <em>obsoleto</em>. <a href="http://browsehappy.com/">Actualícelo</a> o instale <a href="http://www.google.com/chromeframe/?redirect=true">Google Chrome Frame</a> para utilizar este sitio.</p><![endif]-->
  <!-- sample navbar -->
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container-fluid">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <div class="nav-collapse">
          <a class="brand" href="<?php echo url_for("@homepage");?>"><?php echo sfConfig::get('app_name', "Proyecto");?></a>
          <!-- menu -->
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <?php echo $sf_content ?>
    <hr>
    <footer></footer>
  </div> <!-- /container -->
  <script src="<?php echo javascript_path("../bootstrap/js/bootstrap.min.js");?>"></script>
  <script src="<?php echo javascript_path("bootbox.min.js");?>"></script>
  <script src="<?php echo javascript_path("rails.js");?>"></script>
  <?php include_javascripts();?>
</body>
</html>

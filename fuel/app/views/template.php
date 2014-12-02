<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf8">
    <?php echo Asset::css('commom-layout.css') ?>    

    <title><?php echo $title ?></title>
  </head>
  
  <body>
    <div id="start">
      <p><b>CRUD Fuelphp</b>
      <?php if($current_user): ?>
        <span><em><?php echo $current_user->email ?> <a href="<?php echo Uri::create('user/logout') ?>">(logout)</a></em></span>
      <?php endif ?>
      </p>
    </div>

    <?php if(Session::get_flash('success')): ?>
      <div style="float:left;width:100%;color:green;margin-bottom:5px"><?php echo implode('<p></p>', ((array) Session::get_flash('success'))); ?></div>
    <?php endif ?>

    <?php if(Session::get_flash('error')): ?>
      <div style="color:red;margin-bottom:10px"><?php echo Session::get_flash('error'); ?></div>
    <?php endif ?>

	  <div id="content">
	    <?php echo $content ?>
	  </div>
	
	<small style="float:left;margin-top:20px"><?php echo date('Y') ?> - FuelPHP por Yuri</small>
  </body>

   <!-- JS -->

  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="<?php echo Uri::base(false) ?>assets/js/jquery-form.js"></script>
  <script src="<?php echo Uri::base(false) ?>assets/js/common-scripts.js"></script>

</html>
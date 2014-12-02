<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf8">
    <title><?php echo $title ?></title>
  </head>
  <body>
    <?php if(Session::get_flash('error')): ?>
      <div style="color:red;margin-left:20px;margin-bottom:10px"><?php echo implode('<p></p>', ((array) Session::get_flash('error'))); ?></div>
    <?php endif ?>

    <?php if(Session::get_flash('success')): ?>
      <div style="color:green;margin-left:20px;margin-bottom:10px"><?php echo implode('<p></p>', ((array) Session::get_flash('success'))); ?></div>
    <?php endif ?>


    <?php echo form::open() ?>
      <fieldset>
      <legend><p>Login</p></legend>
        <label>Usuário:</label>
        <input type="text" name="username" value="<?php echo isset($username) ? $username : '' ?>">
        <label>Senha:</label>
        <input type="password" name="password">
        <input type="hidden" name="<?php echo Config::get('security.csrf_token_key');?>" value="<?php echo Security::fetch_token();?>">
        <button type="submit">Login</button>
      </fieldset>  
    </form>
   
    <hr>

      <?php echo Validation::instance()->error('username') ?>
      <?php echo Validation::instance()->error('pasword') ?>
      <?php echo Validation::instance()->error('email') ?>
      <?php echo form::open(Uri::create('user/create')) ?>
      <fieldset>
      <legend><p>Cadastre-se</p></legend>
        <label>Usuário:</label>
        <input type="text" name="username" value="<?php echo Validation::instance()->validated('username') ?>">
        <label>Senha:</label>
        <input type="password" name="password">
        <label>Email:</label>
        <input type="text" name="email" value="<?php echo Validation::instance()->validated('email') ?>">
        <input type="hidden" name="<?php echo Config::get('security.csrf_token_key');?>" value="<?php echo Security::fetch_token();?>">
        <button type="submit">Cadastrar</button>
      </fieldset>
    </form>  


  </body>
</html>
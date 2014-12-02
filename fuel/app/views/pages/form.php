<?php echo Form::open() ?>
  <fieldset>
    <label>Nome:</label>
    <input type="text" name="nome" value="<?php echo isset($perfil) ? $perfil->nome : ''?><?php echo Validation::instance()->validated('nome') ?>">
    <?php echo Validation::instance()->error('nome') ?>
    <label>Estado:</label>
    <input type="text" name="estado" value="<?php echo isset($perfil) ? $perfil->estado : ''?><?php echo Validation::instance()->validated('estado') ?>">
    <?php echo Validation::instance()->error('estado') ?>
    <input type="hidden" name="perfil_id" value="<?php echo $current_user->id ?>">
    <input type="hidden" name="<?php echo Config::get('security.csrf_token_key');?>" value="<?php echo Security::fetch_token();?>">
    <button type="submit">Enviar</button>
  </fieldset>
</form>
<?php echo Form::close() ?>

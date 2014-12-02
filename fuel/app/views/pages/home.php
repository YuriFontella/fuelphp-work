<?php if ($perfil): ?>

<div class="left">
  <a class="fileinput">
    <?php if($perfil->foto): ?>
      <img src="<?php echo Uri::base(false) ?>assets/img/<?php echo $perfil->foto ?>" alt="" width="60" height="60">
    <?php else: ?>
      <img src="<?php echo Uri::base(false) ?>assets/img/default.png" alt="" width="60" height="60">
    <?php endif ?>

    <form method="post" enctype="multipart/form-data">
      <input type="file" name="foto" id="foto">
      <input type="hidden" name="<?php echo Config::get('security.csrf_token_key');?>" value="<?php echo Security::fetch_token();?>">
    </form>
  </a>
</div>

<div class="right">
  <b><?php echo $perfil->nome ?></b> mora em <?php echo $perfil->estado ?>
  <span><a href="perfil/<?php echo $perfil->perfil_id ?><?php echo '/' . Inflector::friendly_title($perfil->nome, '-', true) ?>">Ver</a></span>
  <span><a href="home/editar/<?php echo $perfil->perfil_id ?>">Editar</a></span>
  <span><a href="home/delete/<?php echo $perfil->perfil_id ?>" onclick="return confirm('Tem certeza que deseja remover isso?')">delete</a></span>
  <p><?php echo 'Meu login_hash é: ' . Session::get('login_hash') ?></p>
</div>

<?php else: ?>

  <p>Nenhum perfil! <span><?php echo Html::anchor('home/criar', 'Criar um perfil') ?></span></p>

<?php endif ?>
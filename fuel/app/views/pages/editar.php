<?php if( ! $perfil ): ?>

<p>Não é permetido entrar nessa página assim desse jeito!</p>

<?php else: ?>

<p>Editar o usuário <b><?php echo $perfil->nome ?></b></p>
<?php echo render('pages/form'); ?>

<form method="post" accept-charset="utf-8" action="<?php echo Uri::create('home/info/') ?><?php echo $perfil->perfil_id ?>">
  <fieldset>
  <legend><p>Acrescentar ou Editar Informaçoes:</p></legend>
    <label>Música:</label>
    <input type="text" name="musica" value="<?php foreach($perfil->informacoes as $row) echo $row->musica ?>">
    <label>Filme:</label>
    <input type="text" name="filme" value="<?php foreach($perfil->informacoes as $row) echo $row->filme ?>">
    <label>Programa:</label>
    <input type="text" name="programa" value="<?php foreach($perfil->informacoes as $row) echo $row->programa ?>">
    <input type="hidden" name="info_id" value="<?php echo $perfil->perfil_id ?>">
    <input type="hidden" name="<?php echo Config::get('security.csrf_token_key');?>" value="<?php echo Security::fetch_token();?>">
    <button type="submit">Enviar</button>
  </fieldset>
</form>
</form>

<p><?php echo Html::anchor('home', 'Voltar') ?></p>

<?php endif ?>
<?php if( $user->perfil ): ?>

<p>Oh, você já tem um perfil!</p>
<p><?php echo Html::anchor('home', 'Voltar') ?></p>

<?php else: ?>

<p>Adicionar um perfil</p>
<?php echo render('pages/form'); ?>

<p><?php echo Html::anchor('home', 'Voltar') ?></p>

<?php endif ?>

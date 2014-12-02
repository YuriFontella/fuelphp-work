<h3>
  <?php echo $usuario->nome ?>
</h3> 

<?php if($usuario->informacoes): ?>  

<?php foreach($usuario->informacoes as $row): ?> 
  <p>Gosta de ouvir <?php echo $row->musica ?></p>
  <p>Filme favorito é o <?php echo $row->filme ?></p>
  <p>Assiste o programa <?php echo $row->programa ?> todos os dias</p>
<?php endforeach ?>

<?php else: ?>
<p>Nenhuma informação!</p>
<?php endif ?>

<p><?php echo Html::anchor('home', 'Voltar') ?></p>
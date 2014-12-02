<p>Sou o produto <?php echo $item ?></p>
<p>Usuário <?php echo $user ?></p>
<p>Link output false <?php echo $link ?></p>
  
<p>Parametros nome <?php echo $nome ?> e a idade <?php echo $idade ?></p>
<p><?php echo $slug ?></p>
  
<ul>
  <?php array_walk($produtos, function($produto) { ?>
  <li><?php echo $produto ?></li>
  <?php }) ?>
</ul>
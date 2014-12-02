<ol>

<?php array_walk($vendas, function ($item) use($upper) { ?>
  <li><?php echo $upper($item['nome']) ?> foram vendidos <?php echo $item['vendidos'] ?></li>
<?php }); ?>

</ol>
<!DOCTYPE html>
<htmL>
  <head>
    <meta charset="utf8">
    <title><?php if(isset($title)) echo $title ?></title>
  </head>
  <body>

  <h2>Isso faz parte do template</h2>

    <div id="container">
      <?php if(isset($container)) echo $container ?>
    </div>
  </body>

  <small style="float:left;margin-top: 20px">2014 - Yuri</small>
</html>
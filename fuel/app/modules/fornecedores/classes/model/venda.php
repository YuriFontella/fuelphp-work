<?php 

namespace Fornecedores;

class Model_Venda {

  public static function consultar($criterio = null) {

    for($i = 0; $i < 4; $i++) {
   
      $produtos[$i]['nome'] = "Produto - {$i}";
      $produtos[$i]['codigo'] = $i + rand(50, 120);
      $produtos[$i]['vendidos'] = $i + rand(1, 20);
 
    }

    return $produtos;

  }

}

?>
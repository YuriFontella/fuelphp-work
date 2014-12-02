<?php

namespace Fornecedores;

class View_Consultar extends \ViewModel {

  public function view() {

    $this->upper = function($string) { return strtoupper($string); };
    $this->vendas = Model_Venda::consultar();

  }
 
}


?>
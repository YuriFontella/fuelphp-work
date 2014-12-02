<?php

namespace Fornecedores;

class Controller_Vendas extends \Controller_Rest {

  public function get_index() {

    $this->get_consultar();

  }

  public function get_consultar() {

    return $this->response(Model_Venda::consultar());

  }

}

?>
<?php

namespace Admin;

class Controller_Vendas extends \Controller_Rest {

  //Chamando uma function de outro module
    
  public function get_fornecedores() {

    $data = \Request::forge('fornecedores/vendas/consultar')->execute();
    echo $data;
    

  }

}


?>
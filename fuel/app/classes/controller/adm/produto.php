<?php 

class Controller_Adm_Produto extends Controller_Adm_Base {

  public function action_index() {

    return Response::forge('Admin produtos');

  }

}

?>
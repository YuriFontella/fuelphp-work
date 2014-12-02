<?php

class Controller_Base extends Controller_Template {

  public function before() {

    parent::before();

    if(Auth::check()) {

      list($driver, $id) = Auth::get_user_id();
      $this->current_user = Model_Membros::find($id);

    } else {
 
      Session::set_flash('error', 'Por favor, faça o login!');

      $this->current_user = null;
      Response::redirect(Uri::base(), 'refresh');

    }

    View::set_global('current_user', $this->current_user);

  }


}


?>
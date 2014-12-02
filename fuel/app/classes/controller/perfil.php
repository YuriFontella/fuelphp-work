<?php

class Controller_Perfil extends Controller_Base {

  public function action_usuario($id = null) {

    is_null($id) and Response::redirect('home');

    if ( ! $data['usuario'] = Model_Perfil::find($id)) {

      Session::get_flash('error', 'Não foi possível encontrar o objeto #'.$id.'');
      Response::redirect('home');

    }

    $this->template->title = 'Ver';
    $this->template->content = View::forge('pages/ver', $data);

  }

}

?>
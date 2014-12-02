<?php 

class Controller_Home extends Controller_Base {


  public function action_index(){
  
    $data['perfil'] = Model_Perfil::find($this->current_user->id);
  
    $this->template->title = 'Meu Projeto CRUD';
    $this->template->content = View::forge('pages/home', $data);
  
  }

  public function action_criar() {

    if(Input::method() == 'POST') {

      if(Security::check_token()) {

        $val = Model_Perfil::validate();
  
        if($val->run()) {
         
          $data = Model_Perfil::forge($_POST);
          $data['id'] = Str::random('nozero', 11);
          if($data and $data->save()) {
  
            Session::set_flash('success', '#'.$data->nome.', seu perfil foi adicionado!');
            Response::redirect('home');
   
          } else {
  
            Session::set_flash('error', 'Houve agum problema, desculpe!');
  
          }
  
        }

      }

    }

    $user = Model_Membros::find('first', array('where' => array(array('id' => $this->current_user->id))));

    $this->template->set_global('user', $user, false);
    $this->template->title = 'Perfil';
    $this->template->content = View::forge('pages/criar');

  }

  public function action_editar($id = null) {

    is_null($id) and Response::redirect('home');

    if( ! $perfil = Model_Perfil::find($id)) {
  
      Session::set_flash('error', 'Tivemos algum problema em encontrar o registro #'.$id.'!');
      Response::redirect('home');      
  
    } 

    if(Security::check_token()) {
  
      $val = Model_Perfil::validate();
  
      if($val->run()) {
  
        $perfil->nome = Input::post('nome');
        $perfil->estado = Input::post('estado');
  
        if($perfil->save()) {
   
          Session::set_flash('success', 'Usuário #'.$id.' modificado com sucesso!');
          Response::redirect('home');
      
        } else {
  
          Session::set_flash('error', 'Não foi possível modificar o usuário #'.$id.'');
  
        }
  
      } else {
  
        if(Input::method() == 'POST') {
    
  				Session::set_flash('error', $val->error());
  
        }
  
      }

    }

    $this->template->set_global('perfil', $perfil, false);

    $this->template->title = 'Editando Projeto CRUD';
    $this->template->content = View::forge('pages/editar');

  }

  public function action_info($id = null) {

    is_null($id) and Response::redirect('home');

    $data = Model_Informacoes::find('first', array('where' => array(array('info_id' => $id))));

    if(Input::method() == 'POST') {

      if( ! $data) {

        $data = Model_Informacoes::forge($_POST);
        $data['id'] = Str::random('nozero', 11);
        $data->save();

       } else {

         $data->set($_POST);
         $data->save();

       }

       Session::set_flash('success', 'Informações editadas com sucesso para o usuário #'.$id.'');
       Response::redirect('home');

     }

  }

  public function action_Delete($id = null) {

    is_null($id) and Response::redirect('home');

    if($del = Model_Perfil::find($this->current_user->id)) {

      if($id != $this->current_user->id) {

        Session::set_flash('error', 'A Polícia Federal está se encaminhando para a sua residencia neste momento!');  

       } else {


         $del->delete();
         Session::set_flash('success', 'O objeto #'.$id.' foi excluído!');

       }

    } else {

      Session::set_flash('error', 'O objeto não foi encontrado!');  

    }

    Response::redirect('home');

  }

}

?>
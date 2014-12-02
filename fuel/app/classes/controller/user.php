<?php

class Controller_User extends Controller {

  public function action_login() {

    if (Input::method() == 'POST') {

      if ( Security::check_token() ) {

        if (Auth::login(Input::post('username'), (Input::post('password')))) {
                
          Session::set_flash('success', 'Bem vindo ao sistema!');
          Response::redirect('home');
  
        }
  
        else {        
  
          Session::set_flash('error', 'Usuário ou senha incorretos!');
          Response::redirect('user/login');
  
        }
      }

    }
   

    $data['title'] = 'Login';
    return View::forge('pages/login', $data);

  }

  public function action_create() {

    if(Input::method() == 'POST') {

      if ( Security::check_token() ) {

        $val = Model_Membros::validate();

          if($val->run()) {

            $dados = Model_Membros::find('first', array('where' => array(array('username' => Input::post('username'), 'or' => array(array('email' => Input::post('email')))))));
    
            if( isset($dados->username) and $dados->username == Input::post('username')) {
    
              Session::set_flash('error', 'Nome de usuário já existe');
              Response::redirect(Uri::base());
     
            } else if( isset($dados->email) and $dados->email == Input::post('email')) {
    
              Session::set_flash('error', 'E-mail já existe');
              Response::redirect(Uri::base());
    
      
            } else {
  
              $data = Model_Membros::forge($_POST);
              $data['id'] = Str::random('numeric', 11);
              $data['password'] = Auth::hash_password(Input::post('password'));
              $data->save();    
       
              Session::set_flash('success', 'Cadastro realizado com sucesso!');
    
              Response::redirect(Uri::base());

           }
  
          } else {
  
             Session::set_flash('error', $val->show_errors());
             Response::redirect(Uri::base());
  
          }

       }

    }


  }

  public function action_logout() {

    Auth::logout();
    Cookie::delete('fuelcid');
    Session::set_flash('success', 'Você saiu do sistema!');
    
    Response::redirect(Uri::base(), 'refresh');   

  }

}

?>
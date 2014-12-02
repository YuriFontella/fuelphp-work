<?php 

class Controller_Produtos extends Controller_Template {

  public function action_index() {
  
    //array variável carregada na view
    $data = array(
      'nome' => 'Yuri Fontella',
      'idade' => '26'
    );

    //Variáveis com valores
    $data['item'] = 'Camiseta';

    //valores de um Model    
    $data['produtos'] = Model_Produtos::lista();
    
    //carregando a view
    $data = View::forge('produto/index', $data);

    $data->slug = 'não-tem-biscoito';

    //Setando variáveis
    $data->set('user', 'Yuri Fontella');
    $data->set('link', '<a href="http://google.com">Google</a>', false);

    //Title e container
    $this->template->title = 'Simples funções Fuel';
    $this->template->container = Response::forge($data);

  }



}

?>
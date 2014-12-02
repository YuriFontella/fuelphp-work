<?php

class Controller_Basic extends Controller {

  public function action_index() {

    $data['title'] = 'Meu template';
    $data['user'] = 'Yuri Fontella';

    $data['container'] = View::forge('basic/pagina', $data);

    $data = View::forge('temp', $data);
    return Response::forge($data);

  }



}

?>
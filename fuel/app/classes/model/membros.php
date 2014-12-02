<?php

class Model_Membros extends Orm\Model {

  protected static $_properties = array('id', 'username', 'password', 'email');
  protected static $_table_name = 'membros';

  protected static $_has_many = array('perfil' => array('key_from' => 'id', 'model_to' => 'model_perfil', 'key_to' => 'perfil_id'));

  public static function validate() {

    $val = Validation::forge();
    $val->add_field('username', 'É necessário criar um username', 'required');
    $val->add_field('password', 'Defina uma senha', 'required');
    $val->add_field('email', 'Informe um e-mail', 'required|valid_email');

    $val->set_message('required', ':label');
    $val->set_message('valid_email', 'O e-mail informado não é válido');

    return $val;

  }

}

?>
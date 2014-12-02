<?php

class Model_Perfil extends Orm\Model {

  protected static $_properties = array('id', 'nome', 'estado', 'foto', 'perfil_id');
  protected static $_primary_key = array('perfil_id');
  protected static $_table_name = 'perfil';

  protected static $_has_many = array('informacoes' => array('key_from' => 'perfil_id', 'model_to' => 'model_informacoes', 'key_to' => 'info_id'));

  public static function validate() {
 
    $val = Validation::forge();
    $val->add_field('nome', 'Informe um nome', 'required');
    $val->add_field('estado', 'Informe o estado', 'required');

    $val->set_message('required', ':label');

    return $val;

  }
 
}

?>
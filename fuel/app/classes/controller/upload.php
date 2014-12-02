<?php

class Controller_Upload extends Controller {

  public function action_index() {
    
    Upload::process(array(
      'path' => DOCROOT.'assets/img',
      'max_size'    => 102400,
      'auto_rename' => true,
      'overwrite'   => false,
      'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
    ));

    if(Security::check_token()) {
    
      if (Upload::is_valid('foto')) {
  
        Upload::save();
  
        $upload_data = Upload::get_files();
  
        $data = Model_Perfil::find($this->current_user->id);
        $data->set(array('foto' => $upload_data[0]['saved_as']));
        $data->save();
  
      }

      Session::set_flash('success', 'Sua imagem foi alterada!');

    }

  }

}

?>
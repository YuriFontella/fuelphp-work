<?php

class Model_Informacoes extends Orm\Model {

  protected static $_properties = array('id', 'musica', 'filme', 'programa', 'info_id');
  protected static $_table_name = 'informacoes';

}

?>
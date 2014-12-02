<?php
return array(
	'_root_'  => 'user/login',  // The default route
	'_404_'   => '',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),

   'perfil/(:segment/:any)' => 'perfil/usuario/$1',  

);
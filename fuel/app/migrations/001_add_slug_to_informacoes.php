<?php

namespace Fuel\Migrations;

class Add_slug_to_informacoes
{
	public function up()
	{
		\DBUtil::add_fields('informacoes', array(
			'slug' => array('constraint' => 255, 'type' => 'varchar'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('informacoes', array(
			'slug'

		));
	}
}
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AuthMenu extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'auth_menu_id'          => [
				'type'           => 'INT',
				'constraint'     => 4,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'title'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'link' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'icon' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'parent' => [
				'type'           => 'INT',
				'constraint'     => 4,
			],
			'created_at' => [
				'type'           => 'DATETIME'
			],
			'created_by' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			]
		]);
		$this->forge->addKey('auth_menu_id', true);
		$this->forge->createTable('auth_menu');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('auth_menu');
	}
}

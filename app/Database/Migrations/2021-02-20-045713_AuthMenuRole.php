<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AuthMenuRole extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 4,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'auth_groups_id'       => [
				'type'           => 'INT',
				'constraint'     => '4',
			],
			'id_menu' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'created_at' => [
				'type'           => 'DATETIME'
			],
			'created_by' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('auth_menu_role');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('auth_menu_role');
	}
}

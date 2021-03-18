<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comment extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'comment_id'          => [
				'type'           => 'INT',
				'constraint'     => 4,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'parent_comment_id'       => [
				'type'           => 'INT',
				'constraint'     => 4,
			],
			'comment' => [
				'type'           => 'TEXT',
			],
			'comment_seeder_name' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'topik' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'created_at' => [
				'type'           => 'DATETIME'
			]
		]);
		$this->forge->addKey('comment_id', true);
		$this->forge->createTable('comment');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('comment');
	}
}

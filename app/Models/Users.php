<?php

namespace App\Models;

use CodeIgniter\Model;


class Users extends Model
{

	
	 protected $db = "";

	protected $DBGroup              = 'default';
	protected $table                = 'users';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	// protected $returnType = User::class;
	// protected $useSoftDeletes = true;
	protected $protectFields        = true;

	protected $allowedFields = [
		'email', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
		'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
	];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation

	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];

	//protected $afterInsert = ['addToGroup'];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
	protected $assignGroup;
	// function __construct()
	// {
	// 	$this->DB    = $this->db;
	// 	$this->TABLE = NULL;

	// 	$this->dbSchema = '';
	// 	$db      = \Config\Database::connect();
	// }


	public function get_user($arrwhere){
		$this->select('users.id,username,email,password_hash,active,created_at,updated_at,name,description,group_id,user_id');
		$this->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'INNER');
		$this->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id', 'INNER');
		$this->where($arrwhere);
		return $this->get();
	}

	// public function withGroup(string $groupName)
	// {
	// 	$group = $this->db->table('auth_groups')->where('name', $groupName)->get()->getFirstRow();

	// 	// dd($group);

	// 	$this->assignGroup = $group->id;

	// 	return $this;
	// }

	// protected function addToGroup($data)
	// {
	// 	if (is_numeric($this->assignGroup)) {
	// 		$groupModel = model(GroupModel::class);
	// 		$groupModel->addUserToGroup($data['id'], $this->assignGroup);
	// 	}

	// 	return $data;
	// }
}

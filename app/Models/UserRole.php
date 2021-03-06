<?php

namespace App\Models;

use CodeIgniter\Model;
use Myth\Auth\Entities\User;

class UserRole extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'auth_groups';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['name', 'description'];

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
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];


	public function get_user_group($userid)
	{
		$sql = " SELECT auth_groups.* FROM `auth_groups` 
		join auth_groups_users on auth_groups_users.group_id=auth_groups.id
        where auth_groups_users.user_id='$userid'
        ";
		$query = $this->db->query($sql);

		return $query;
	}
}

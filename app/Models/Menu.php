<?php

namespace App\Models;

use CodeIgniter\Model;

class Menu extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'auth_menu';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [];

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




	public function getmodule($userid)
	{
		$sql = " SELECT * FROM `auth_menu` 
        join auth_menu_role on auth_menu_role.id_menu=auth_menu.auth_menu_id 
        join auth_groups on auth_groups.id=auth_menu_role.auth_groups_id 
		join auth_groups_users on auth_groups_users.group_id=auth_groups.id
        where auth_groups_users.user_id='$userid'
        ";


		$query = $this->db->query($sql);

		return $query;
	}



}



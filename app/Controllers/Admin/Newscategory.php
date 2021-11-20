<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Libraries\Converter;
use App\Models\Admin\NewsCategory as AdminNewsCategory;
use App\Models\AuthGroupsPermissions;
use App\Models\AuthGroupsUsers;
use App\Models\UserRole;
use App\Models\Users;
use CodeIgniter\HTTP\Request;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Authorization\GroupModel;

class Newscategory extends BaseController
{

	public function __construct()
	{
		header("Access-Control-Allow-Origin: *");
		header('Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type, Accept');

		$this->themeadmin();
		$this->UserRole = new UserRole();
		$this->AuthGroupsPermissions = new AuthGroupsPermissions();
		$this->user = new Users();
		$this->auth_groups_users = new GroupModel();
	}
	public function index()
	{

		$Mnews = new AdminNewsCategory();
		$data['category'] = $Mnews->get()->getResultObject();
		return view('admin/vlistcategory',$data);
	}
}

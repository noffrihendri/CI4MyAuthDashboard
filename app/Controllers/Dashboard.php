<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Converter;
use App\Models\AuthGroupsPermissions;
use App\Models\AuthGroupsUsers;
use App\Models\UserRole;
use App\Models\Users;
use CodeIgniter\HTTP\Request;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Authorization\GroupModel;

class Dashboard extends BaseController
{

	public function __construct()
	{
		header("Access-Control-Allow-Origin: *");
		header('Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type, Accept');

		$this->themeadmin();
		$this->UserRole = new UserRole();
		$this->AuthGroupsPermissions = new AuthGroupsPermissions();
		$this->user = new Users();
	//		$this->auth_groups_users = new AuthGroupsUsers();
		$this->auth_groups_users = new GroupModel();
	}
	public function index()
	{
		//dd(User());
		return view('dashboard');

	}
	public function adduser()
	{

		$id = $this->request->getGet('id');

		//dd($id);
		$data['role'] = $this->UserRole->findall();
		$data['validation'] = \Config\Services::validation();

		if($id !== '' && $id !== null){	
			$arrwhere = ['users.id'=>$id];
			//$data['user'] = $this->user->get_user($arrwhere)->getResultObject();
			$data['user'] = $this->user->find($id);
			//array_push($data['user'],);
			// $group = [
			// 	'group' => User()->getRoles()
			// ];
			// array_push($data['user'], $group);
		}

		//dd($data);
		return view('admin/vadduser', $data);
	}

	public function vlistuser()
	{

		//dd(User()->getRoles());

		return view('admin/vlistuser');
	}


	public function datauser()
	{
		$arrWhere = array();
		$arrOrder = array();
		$where = "";
		$arrField = array("username", "email","name",'active',"created_at");
		$converter = new Converter();

		//Value From Datatables
		$intDraw = (int)$_GET['draw'];
		$strTableSearch = $_GET['search']["value"];
		$strStart = $_GET['start'];
		$arrTableOrder = $_GET['order'];

		//Condition
		if ($strTableSearch != "") {
			$arrWhere['username'] = $strTableSearch;
		}

		//Order
		if ($intDraw == 1) {
			$arrOrder["created_at"] = "Desc";
		} else {
			foreach ($arrTableOrder as $arrTemp) {
				$strField = $arrField[(int)$arrTemp['column']];
				$arrOrder[$strField] = $arrTemp['dir'];
			}
		}

		// echo var_dump($strField); die();
		//Limit & offset
		// $intLimit = 10;
		$intLimit = $_GET['length'];
		$intOffset = $strStart;
		//  echo "<pre>"; print_r($arrWhere); echo "</pre>";
		// echo "<pre>"; print_r($intOffset); echo "</pre>";

		$iTotal = $this->user->countAll();
		$intRows = $this->user->where($arrWhere)
		->limit($intLimit, $intOffset)
		->countAll();


		$arrData = $this->user->get_user($arrWhere)->getResult();
		//echo "<pre>";  print_r($arrData); echo"</pre>"; die();

		$arrValue = array();
		$arrAll = array();

		$iFilteredTotal = $intRows;
		foreach ($arrData as $objNews) {
			$arrValue = array();

	

			$arrObj = $converter->objectToArray($objNews);

			foreach ($arrField as $strValue) {
				switch ($strValue) {
					case "created_at":
						array_push($arrValue, date("d-M-Y h:i", strtotime($objNews->created_at)));
						break;
					case "active":
						($objNews->active == 1) ? $bol = 'Active' : $bol = 'Disable';
						array_push($arrValue, $bol);
						break;
					default:
						array_push($arrValue, $arrObj[$strValue]);
				}
			}

			//Button
			$strButton = "<a href=" . base_url('updateuser?id=' . $objNews->id) . " class='sbtn btn-flat btn-md btn-info'><button class='btn btn-primary'>Edit</button></a>";
			$strButton .= "<a href=" . base_url('deleteuser/' . $objNews->id) . " class='sbtn btn-flat btn-md btn-info'><button class='btn btn-danger'>Delete</button></a>";
			$strButton .= "";
			array_push($arrValue, $strButton);

			array_push($arrAll, $arrValue);
		}

		$output = array(
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iFilteredTotal,
			"aaData" => $arrAll
		);

		echo json_encode($output);
		die();
	}

	public function deleteuser($id)
	{
	//	dd($id);
		$this->user->delete($id);

		session()->setFlashdata('message_header', array(
			'tipe' => 'success',
			'title' => 'user',
			'message' => 'user berhasil didelete',
		));
		return redirect()->back();
	}


	public function saveuser(){
		$userModel = new UserModel();
		
		$id = $this->request->getPost('id');

		$rules = [
			// 'username'  	=> 'required|alpha_numeric_space|min_length[3]|is_unique[Users.username]',
			// 'email'			=> 'required|valid_email|is_unique[Users.email]',
			// 'password'	 	=> 'required|strong_password',
			// 'repassword' 	=> 'required|matches[password]',
			// 'group'			=> 'required'
		];

		// if (!$this->validate($rules)) {
		// 	session()->setFlashdata('error', $this->validator->listErrors());
		// 	return redirect()->back()->withInput();
		// }
		$entities = new User();

		$options = [
			'cost' => 10,
		];

		$arrdatauser = [
			'username' => $this->request->getPost('username'),
			'email' => $this->request->getPost('email'),
			'password_hash' => password_hash(base64_encode(
				hash('sha384', $this->request->getPost('password'), true)
			), PASSWORD_DEFAULT, $options),
			'active' => 1,
		];


		if ($id ==''){

			
			$user = $userModel
			->withGroup($this->request->getPost('group'))
			->insert($arrdatauser);

			set_header_message('success', 'created', 'created success');
			return redirect()->back()->withInput();
		}else{
		//xDebug($arrdatauser);
			$user = $userModel	
				->withGroup($this->request->getPost('group'))
				->update($id,$arrdatauser);
			set_header_message('success', 'update', 'update success');
			return redirect()->back()->withInput();
		}


	}
}

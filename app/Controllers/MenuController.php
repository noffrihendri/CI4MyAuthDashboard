<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Converter;
use App\Models\Menu;
use App\Models\RoleMenu;

use App\Libraries\Treeviewdata;
use App\Models\AuthGroups;
use Myth\Auth\Entities\User;

class MenuController extends BaseController
{

	public function __construct()
	{
		header("Access-Control-Allow-Origin: *");
		header('Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type, Accept');
		$this->menus = new Menu();

		$this->mroles = new RoleMenu();
		$this->converter = new Converter();
		$this->mgroupuser = new AuthGroups();

		$this->themeadmin();
	}

	public function index()
	{



		$resutListModul = $this->menus->getmodule(user()->id)->getResult();
		//$resutListModul = $menus->asObject()->findAll();

		//dd($resutListModul);

		$arrLstTemp = array();
		foreach ($resutListModul as $objModule) {

			if (!isset($arrLstTemp[$objModule->parent])) {
				$arrLstTemp[$objModule->parent] = array();
			}

			array_push($arrLstTemp[$objModule->parent], $objModule);
		}

		$treeviewdata = new Treeviewdata();
		$lastmodule = $treeviewdata->ArrangeModuleTreeData(0, $arrLstTemp);


		$arrData['lstModule'] = $lastmodule;
		$arrData['arrAkses'] = array();
		$arrWhere = array();
		$arrData['data'] = $this->mroles
			->where($arrWhere)
			->get()
			->getResult();
		//xDebug($arrData);
		return view('admin/vmodule', $arrData);
	}


	public function listGroup()
	{

		$arrWhere = array();
		$arrOrder = array();
		$where = "";
		$arrField = array("name");

		//Value From Datatables
		$intDraw = (int)$_GET['draw'];
		$strTableSearch = $_GET['search']["value"];
		$strStart = $_GET['start'];
		$arrTableOrder = $_GET['order'];

		//Condition
		$arrWhere = array();

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
		$mrole = new User();

		$iTotal =
		$this->mgroupuser->countAll();
		$intRows =
		$this->mgroupuser->where($arrWhere)
			->limit($intLimit, $intOffset)
			->countAll();


		$arrData =
		$this->mgroupuser
			->where($arrWhere)
			->limit($intLimit, $intOffset)
			->get()
			->getResultArray();
		//xDebug($arrData);
		//echo "<pre>"; print_r($arrData); echo "</pre>";
		$arrValue = array();
		$arrAll = array();

		$iFilteredTotal = $intRows;
		foreach ($arrData as $objNews) {
			$arrValue = array();

			$arrObj = $this->converter->objectToArray($objNews);
			foreach ($arrField as $strValue) {

				array_push($arrValue, $arrObj[$strValue]);
			}

			//Button
			$strButton = "<i class='fa fa-pencil' aria-hidden='true'><a href=" . base_url('listgroup/updategroup?id=' . $objNews['id']) . " >edit</a></i>";
			$strButton .=
				"<i class='fa fa-trash' aria-hidden='true'><a href=" . base_url('listgroup/deletegroup/' . $objNews['id']) . " onclick=\"return confirm('Anda ingin menghapus data tersebut?')\">del</a></i>";
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

	public function editgroup()
	{
		$id = $this->request->getGet('id');

		$GroupId = (int)$id;
		$arrData = array(
			"id" => "",
			"name" => ""
		);



		$objGroup = $this->mgroupuser->get()->getResult();

		$arrData['group'] = $objGroup;

		$arrOrder["id"] = "DESC";

		$arrData['data'] =
		$this->mgroupuser->where('id', $id)
			->get()->getResult();

		//dd($arrData);
		if (count($arrData['data']) > 0) {
			foreach ($arrData['data'] as $arrGroup) {
				// echo "<pre> coba";
				// print_r($arrGroup);
				// echo "</pre>"; die();
				if ($arrGroup->id == $GroupId) {
					foreach ($arrGroup as $strField => $strValue) {

						$arrData[$strField] = $strValue;
					}
				}
			}
		}

		$arrAkses = array();
		// dd($GroupId);
		$arrwhere = array('auth_groups_id' => $GroupId);
		$arrLstAksesModule = $this->mroles
			->where($arrwhere)
			->get()
			->getResult();
		//->getCompiledSelect();


		foreach ($arrLstAksesModule as $objAksesModule) {
			array_push($arrAkses, $objAksesModule->id_menu);
		}


		$resutListModul = $this->menus->getmodule(user()->id)->getResult();
		//xDebug($resutListModul);
		$arrLstTemp = array();

		foreach ($resutListModul as $objModule) {

			if (!isset($arrLstTemp[$objModule->parent])) {
				$arrLstTemp[$objModule->parent] = array();
			}

			array_push($arrLstTemp[$objModule->parent], $objModule);
		}
		//xDebug($arrLstTemp);
		$treeviewdata = new Treeviewdata();
		$lastmodule = $treeviewdata->ArrangeModuleTreeData(0, $arrLstTemp);


		$arrData['lstModule'] = $lastmodule;
		$arrData['arrAkses'] = $arrAkses;

		$arrData['GroupId'] = $GroupId;
		$arrData['Module'] = $this->menus->findall();

		//xDebug($arrData);
		return view('admin/vmodule', $arrData);
	}

	public function savegroup()
	{
		//dd($this->request->getPost());
		$strGroupName = $this->request->getPost('txtGroupName');
		$strGroupID = $this->request->getPost('txtGroupId');
		$arrModuleAkses = $this->request->getPost('chkModule');
		$chAccess = $this->request->getPost('chAccess');
		$arrWhere = array("GroupId" => $strGroupID);
		$arrGroup = array('GroupName' => $strGroupName);

	
		$strMessage = "";
		if ($strGroupID != "") {

			$arrWhere = array("id" => $strGroupID);
			$arrGroup = array('name' => $strGroupName, 'description' => $strGroupName);

			$this->mgroupuser->update($arrWhere, $arrGroup);

			if (count($arrModuleAkses) > 0) {
				$this->mroles->where('auth_groups_id', $strGroupID)
					->delete();

				foreach ($arrModuleAkses as $value) {
					$create = 0;
					$update = 0;
					$delete = 0;

					foreach ($chAccess as $key => $subvalue) {

						if (strpos($subvalue, '1-' . $value) !== false) {
							$create = 1;
						}
						if (strpos($subvalue, '2-' . $value) !== false) {
							$update = 1;
						}

						if (strpos($subvalue, '3-' . $value) !== false) {
							$delete = 1;
						}
					}


					$data = array(
						'auth_groups_id' => $strGroupID,
						'id_menu' => $value,
						'create' => $create,
						'update' => $update,
						'delete' => $delete,
						'created_by' => user()->username
					);
				// 		echo "<pre>";
				// print_r($data); echo "</pre>"; 
					$this->mroles->save($data);
				}
			//	die();
				set_header_message('success', 'success', 'update success');
				return redirect()->back()->withInput();
			}
		} else {
			$data = array(
				'name' => $strGroupName,
				'description' => $strGroupName
			);
			//xDebug($data);
			$id = $this->mgroupuser->insert($data);
			//dd($id);

			foreach ($arrModuleAkses as $value) {

				foreach ($chAccess as $key => $subvalue) {

				
					if (strpos($subvalue, '1-' . $value) !== false) {
						$create = 1;
					}
					if (strpos($subvalue, '2-' . $value) !== false) {
						$update = 1;
					}

					if (strpos($subvalue, '3-' . $value) !== false) {
						$delete = 1;
					}
				}

				$data = array(
					'auth_groups_id' => $id,
					'id_menu' => $value,
					'id_menu' => $value,
					'create' => $create,
					'update' => $update,
					'delete' => $delete,
					'created_by' => user()->username
				);
				// echo "<pre>";
				// print_r($data); echo "</pre>"; 
				$this->mroles->save($data);
			} //die();
			set_header_message('success', 'success', 'insertt success');
			return redirect()->back()->withInput();
		}

	}


	public function destroy($id){

		$this->mgroupuser->where('id', $id)
		->delete();
		$this->mroles->where('auth_groups_id', $id)
			->delete();

		set_header_message('success', 'deleted', 'deleted success');
		return redirect()->back()->withInput();
	}
}

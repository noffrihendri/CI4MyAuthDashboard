<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Converter;
use App\Models\Admin\NewsCategory;
use App\Models\Mnews;
use App\Models\Newstagmaster;

class News extends BaseController
{
	public function __construct()
	{
		header("Access-Control-Allow-Origin: *");
		header('Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type, Accept');
		$this->converter = new Converter();
		$this->mnews = new Mnews();
		$this->NewsCategory = new NewsCategory();
		$this->Newstagmaster =  new Newstagmaster();

		$this->themeadmin();
	}


	public function index()
	{
	
		return view('admin/vlistnews');
	}

	public function create(){
		$data['newscategory'] = $this->NewsCategory->get()->getResultObject();
		$data['tag'] = $this->Newstagmaster->get()->getResultObject();



		//dd($data);

		return view('admin/vnewsadd',$data);
	}

	public function listdata()
	{
		$arrWhere = array();
		$arrOrder = array();
		$where = "";
		$arrField = array("news_title", "news_img","news_status",'is_active',"created_at");
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

		$iTotal = $this->mnews->countAll();
		$intRows = $this->mnews->where($arrWhere)
		->limit($intLimit, $intOffset)
		->countAll();


		$arrData = $this->mnews->where($arrWhere)
		->get()
		->getResult();
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
					case "is_active":
						($objNews->is_active == 1) ? $bol = 'Active' : $bol = 'Disable';
						array_push($arrValue, $bol);
						break;
					default:
						array_push($arrValue, $arrObj[$strValue]);
				}
			}

			//Button
			$strButton = "<a href=" . base_url('updateuser?id=' . $objNews->news_id) . " class='sbtn btn-flat btn-md btn-info'><button class='btn btn-primary'>Edit</button></a>";
			$strButton .= "<a href=" . base_url('deleteuser/' . $objNews->news_id) . " class='sbtn btn-flat btn-md btn-info'><button class='btn btn-danger'>Delete</button></a>";
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

	public function tagit()
    {
        $arrTag = array();
        
        $arrOrder = array('tag' => 'Asc');
        $lstTag = $this->Newstagmaster->get()->getResultObject();
        foreach ($lstTag as $objTag) {
            array_push($arrTag, $objTag->Tag_name);
        }
        
        echo "availableTags = ".json_encode($arrTag);
        die();
    }
}
